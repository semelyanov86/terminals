<?php

namespace App\Events;

use App\Incassation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class IncassationCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $incassation;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Incassation $incassation)
    {
        $this->incassation = $incassation;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}