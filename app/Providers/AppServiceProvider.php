<?php

namespace App\Providers;

use App\Filial;
use App\Incassation;
use App\Loan;
use App\Payer;
use App\Payment;
use App\Terminal;
use App\Traits\Sortable;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use Sortable;

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
        $payments = Payment::sortByLoans()->count();
        $users = User::count();
        $payers = Payer::count();
        config([
            'app.terminals-count' => $terminals,
            'app.filials-count' => $filials,
            'app.loans-count' => $loans,
            'app.incassations-count' => $incassations,
            'app.payments-count' => $payments,
            'app.users-count' => $users,
            'app.payers-count' => $payers,
        ]);
    }
}
