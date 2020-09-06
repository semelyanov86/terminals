<?php

namespace App\Listeners;

use App\Events\TerminalActivated;
use App\Terminal;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessTerminalActivated
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
     * @param  TerminalActivated  $event
     * @return void
     */
    public function handle(TerminalActivated $event)
    {
        $terminal = Terminal::whereId($event->terminal->id)->first();
        $terminal->auth_date = now();
        $terminal->save();
    }
}
