<?php

namespace App\Http\Controllers;

use Akaunting\Money\Money;
use App\Filial;
use App\Incassation;
use App\Loan;
use App\Payer;
use App\Payment;
use App\Policies\ReportPolicy;
use App\Terminal;
use App\Traits\Orderable;
use App\Traits\Sortable;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    use Sortable;

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
        $terminals = $results->map(function ($item, $key) {
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

    public function filials()
    {
        $this->authorize('report', Filial::class);
        $results = Filial::all();
        $filials = $results->map(function ($item, $key) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'terminals' => Terminal::where('filial_id', '=', $item->id)->where('active', '=', '1')->count(),
                'ostatok' => convertToMoney(Payment::where('filial_id', '=', $item->id)->where('incassed', '=', '0')->sum('sum')),
                'payment_total' => convertToMoney(Payment::where('filial_id', '=', $item->id)->sum('sum')),
                'payment_month' => convertToMoney(Payment::where('payment_date', '>=', \Carbon\Carbon::now()->startOfMonth())->where('filial_id', '=', $item->id)->sum('sum')),
                'payment_last' => convertToMoney(Payment::whereMonth('payment_date', '=', \Carbon\Carbon::now()->subMonth()->month)->where('filial_id', '=', $item->id)->sum('sum')),
                'incasso_total' => convertToMoney(Incassation::whereHas('terminal', function ($q) use ($item) {
                    $q->where('filial_id', '=', $item->id);
                })->sum('amount')),
                'incasso_month' => convertToMoney(Incassation::whereHas('terminal', function ($q) use ($item) {
                    $q->where('filial_id', '=', $item->id);
                })->where('incassation_date', '>=', \Carbon\Carbon::now()->startOfMonth())->sum('amount')),
                'loans_total' => convertToMoney(Loan::whereHas('terminal', function ($q) use ($item) {
                    $q->where('filial_id', '=', $item->id);
                })->sum('amount')),
            ];
        });

        return view('reports.filials', compact('filials'));
    }

    public function payers()
    {
        $this->authorize('report', Payer::class);
        $payers = Payer::with('payments')->get();
        $payments = $payers->each(function ($item, $key) {
            $item->total = $item->payments->when(request('daterange'), function ($query) {
                return $query->whereBetween('payment_date', explode('/', request('daterange')));
            })->sum('sum');
            $item->count = $item->payments->when(request('daterange'), function ($query) {
                return $query->whereBetween('payment_date', explode('/', request('daterange')));
            })->count();
        })->filter(function ($value, $key) {
            return $value->total > 0;
        })->sortByDesc('total')->values()->all();
        $count = 100;
        if (count($payments) < $count) {
            $count = count($payments);
        }

        return view('reports.payers', compact('payments'))->with('count', $count);
    }
}
