<?php

namespace App\Listeners;

use App\Mail\Congratulation;
use App\Events\OneThousandVisits;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOneThousandVisitsCongratulation
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
     * @param  \App\Events\OneThousandVisits  $event
     * @return void
     */
    public function handle( OneThousandVisits $event )
    {

        $mensaje = new \stdClass();

        $mensaje->asunto = "¡¡¡¡MIL VISITAS!!!!! WUALAAA!!!!";
        $mensaje->email = $event->anuncio->user->email;
        $mensaje->nombre = $event->anuncio->user->name;

        $anuncio = $event->anuncio->titulo;

        $mensaje->mensaje = "Tu ANUNCIO $anuncio ha llegado a 1000 visitas!!!!!!! ";

        Mail::to( $event->anuncio->user->email)->send(new Congratulation($mensaje));
    }
}
