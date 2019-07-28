<?php

namespace App\Listeners;

use App\Events\IncassationCreated;
use App\Payment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessIncassationCreated
{
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
     * @param  IncassationCreated  $event
     * @return void
     */
    public function handle(IncassationCreated $event)
    {
        $incassation = $event->incassation;
        $payments = Payment::where('payment_date', '<', $incassation->incassation_date)->where('incassed', '=', '0')->get();
        $payments->each(function($item, $key){
           if ($item->incassed < 1) {
               $item->incassed = '1';
               $item->save();
           }
        });
    }
}
