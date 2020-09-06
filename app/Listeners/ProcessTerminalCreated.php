<?php

namespace App\Listeners;

use App\Events\TerminalCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessTerminalCreated
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
     * @param  TerminalCreated  $event
     * @return void
     */
    public function handle(TerminalCreated $event)
    {
        $logValue = $event->terminal->log_path;
        if (! $logValue) {
            $event->terminal->log_path = 'terminal-'.$event->terminal->id;
            $event->terminal->save();
        }
    }
}
