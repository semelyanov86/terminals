<?php

namespace App\Http\Controllers;

use App\BlockedPhone;
use App\Loan;
use App\Payer;
use App\Terminal;
use Illuminate\Http\Request;
use App\User;
use App\Payment;

class HomeController extends Controller
{
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
        $data = collect(array());
        $data->put('payments_count', Payment::get('sum')->sum(function($item){
            return convertToMoney($item->sum);
        }));
//        $data->put('phones_count', BlockedPhone::get('id')->count());
        $data->put('loans_count', Loan::get('amount')->sum(function ($item) {
            return convertToMoney($item->amount);
        }));
        $data->put('payers_sum', Payer::get('mainsum')->sum(function ($item) {
            return convertToMoney($item->mainsum);
        }));
        $data->put('ostatok', Payment::where('incassed', '=', '0')->get('sum')->sum(function ($item) {
            return convertToMoney($item->sum);
        }));
        return view('welcome')->with('data', $data);
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
