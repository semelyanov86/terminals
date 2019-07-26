<?php

namespace App\Http\Controllers;

use App\BlockedPhone;
use App\Loan;
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
            return $item->sum;
        }));
        $data->put('phones_count', BlockedPhone::get('id')->count());
        $data->put('loans_count', Loan::get('amount')->sum(function ($item) {
            return $item->amount;
        }));
        return view('welcome')->with('data', $data);
    }
}
