<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddedOfertaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $anuncio;
    public $oferta;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $anuncio, $user, $oferta )
    {
        $this->anuncio = $anuncio;
        $this->user = $user;
        $this->oferta = $oferta;
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
