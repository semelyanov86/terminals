<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incassation;
use Yajra\DataTables\DataTables;

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
}
