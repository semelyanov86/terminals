<?php

namespace App\Http\Controllers;

use App\BlockedPhone;
use App\Loan;
use App\Payer;
use App\Terminal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Payment;
use App\Traits\Sortable;

class HomeController extends Controller
{
    use Sortable;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = trans('app.title');
        $data = collect(array());
        $data->put('payments_count', Payment::get('sum')->sum(function($item){
            return $item->sum;
        }));
//        $data->put('phones_count', BlockedPhone::get('id')->count());
        $data->put('loans_count', Loan::get('amount')->sum(function ($item) {
            return $item->amount;
        }));
        $data->put('payers_sum', Payer::get('mainsum')->sum(function ($item) {
            return $item->mainsum;
        }));
        $data->put('ostatok', Payment::where('incassed', '=', '0')->get('sum')->sum(function ($item) {
            return $item->sum;
        }));
        $data->put('terminals', Terminal::where('printer_state', '=', '0')->orWhere('cashmashine_state', '=', '0')->orWhere('update_state', '<', Carbon::now()->subHours(10))->get());
        $data->put('payments', Payment::latestFirst()->with('terminal')->limit(5)->get());
        return view('welcome')->with('data', $data)->with('title', $title);
    }

    public function search(Request $request)
    {
        $q = $request->search;
        $users = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
        $terminals = Terminal::where('name','LIKE','%'.$q.'%')->orWhere('display_name','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->get();
        $payers = Payer::where('name','LIKE','%'.$q.'%')->orWhere('onees','LIKE','%'.$q.'%')->get();
        return view('search', compact('users', 'terminals', 'payers'));

    }
}
