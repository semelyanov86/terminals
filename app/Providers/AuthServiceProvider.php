<?php

namespace App\Providers;

use App\BlockedPhone;
use App\Config;
use App\Filial;
use App\Incassation;
use App\Loan;
use App\Payer;
use App\Payment;
use App\Policies\BlockedPhonePolicy;
use App\Policies\ConfigPolicy;
use App\Policies\FilialPolicy;
use App\Policies\IncassationPolicy;
use App\Policies\LoanPolicy;
use App\Policies\PayerPolicy;
use App\Policies\PaymentPolicy;
use App\Policies\ReportPolicy;
use App\Policies\TerminalPolicy;
use App\Terminal;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Policies\UserPolicy;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        BlockedPhone::class => BlockedPhonePolicy::class,
        Payer::class => PayerPolicy::class,
        Config::class => ConfigPolicy::class,
        Filial::class => FilialPolicy::class,
        Incassation::class => IncassationPolicy::class,
        Loan::class => LoanPolicy::class,
        Payment::class => PaymentPolicy::class,
        Terminal::class => TerminalPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
    }
}
