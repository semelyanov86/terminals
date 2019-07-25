<?php

namespace App\Providers;

use App\Incassation;
use App\Loan;
use App\Payment;
use Illuminate\Support\ServiceProvider;
use App\Terminal;
use App\Filial;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $terminals = Terminal::count();
        $filials = Filial::count();
        $loans = Loan::where('approved', '0')->count();
        $incassations = Incassation::count();
        $payments = Payment::count();
        config([
            'app.terminals-count' => $terminals,
            'app.filials-count' => $filials,
            'app.loans-count' => $loans,
            'app.incassations-count' => $incassations,
            'app.payments-count' => $payments,
        ]);
    }
}
