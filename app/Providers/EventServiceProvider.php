<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\TerminalCreated::class => [
            \App\Listeners\ProcessTerminalCreated::class,
        ],
        \App\Events\TerminalActivated::class => [
            \App\Listeners\ProcessTerminalActivated::class,
        ],
        \App\Events\IncassationCreated::class => [
            \App\Listeners\ProcessIncassationCreated::class,
        ],
        \App\Events\PaymentCreated::class => [
            \App\Listeners\ProcessPaymentCreated::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
