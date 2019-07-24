<?php

namespace App\Listeners;

use App\Events\TerminalCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        if (!$logValue) {
            $event->terminal->log_path = 'terminal-' . $event->terminal->id;
            $event->terminal->save();
        }
    }
}
