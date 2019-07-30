<?php

namespace App\Http\Controllers;

use App\Tables\Builders\IncassationTable;
use Illuminate\Http\Request;
use LaravelEnso\Tables\app\Traits\Datatable;
use LaravelEnso\Tables\app\Traits\Excel;

class IncassationReportController extends Controller
{
    use Datatable, Excel;
    protected $tableClass = IncassationTable::class;
}
