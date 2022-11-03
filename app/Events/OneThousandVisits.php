<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OneThousandVisits
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $anuncio;

    public function __construct( $anuncio)
    {
        $this->anuncio = $anuncio;
    }

    // public function broadcastOn(): Channel|array
    // {
    //     return new PrivateChannel('channel-name');
    // }
}
