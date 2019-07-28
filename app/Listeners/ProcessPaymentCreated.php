<?php

namespace App\Listeners;

use App\Events\PaymentCreated;
use App\Incassation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Traits\Orderable;

class ProcessPaymentCreated
{
    use Orderable;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PaymentCreated  $event
     * @return void
     */
    public function handle(PaymentCreated $event)
    {
        $payment = $event->payment;
        $incassation = Incassation::where('terminal_id', '=', $payment->terminal_id)->latestFirst()->first();
        if ($incassation->incassation_date > $payment->payment_date) {
            $payment->incassed = '1';
            $payment->save();
        }
    }
}
