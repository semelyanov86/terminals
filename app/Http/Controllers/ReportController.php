<?php

namespace App\Http\Controllers;

use Akaunting\Money\Money;
use App\Loan;
use App\Payment;
use App\Terminal;
use Illuminate\Http\Request;
use App\Incassation;
use Yajra\DataTables\DataTables;
use App\Policies\ReportPolicy;

class ReportController extends Controller
{
    public function incassation()
    {
        return view('reports.incassation');
    }

    public function dataIncassation()
    {
//        $query = Incassation::select('id', 'incassation_date', 'amount', 'quantity', 'terminal_id', 'user_id');
//        return datatables($query)->make(true);
//dd(DataTables::of(Incassation::with('terminal'))->make(true));
        return DataTables::of(Incassation::with('terminal'))->make(true);
    }

    public function terminals()
    {
        $this->authorize('terminals', Terminal::class);
        $results = Terminal::where('active', '=', '1')->with('filial')->get();
        $terminals = $results->map(function($item, $key){

           return [
              'id' => $item->id,
              'name' => $item->display_name,
              'filial' => $item->filial->name,
               'ostatok' => convertToMoney(Payment::where('terminal_id', '=', $item->id)->where('incassed', '=', '0')->sum('sum')),
               'payment_total' => convertToMoney(Payment::where('terminal_id', '=', $item->id)->sum('sum')),
               'payment_month' => convertToMoney(Payment::where('payment_date', '>=', \Carbon\Carbon::now()->startOfMonth())->where('terminal_id', '=', $item->id)->sum('sum')),
               'payment_last' => convertToMoney(Payment::whereMonth('payment_date', '=', \Carbon\Carbon::now()->subMonth()->month)->where('terminal_id', '=', $item->id)->sum('sum')),
                'incasso_total' => convertToMoney(Incassation::where('terminal_id', '=', $item->id)->sum('amount')),
                'incasso_month' => convertToMoney(Incassation::where('terminal_id', '=', $item->id)->where('incassation_date', '>=', \Carbon\Carbon::now()->startOfMonth())->sum('amount')),
               'loans_total' => convertToMoney(Loan::where('terminal_id', '=', $item->id)->sum('amount')),

           ];
        });
//        dd($terminals);
        return view('reports.terminals', compact('terminals'));
    }
}
