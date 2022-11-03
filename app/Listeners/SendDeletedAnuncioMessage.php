<?php

namespace App\Listeners;

use App\Events\DeletedAnuncioEvent;
use App\Mail\Warning;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDeletedAnuncioMessage
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
     * @param  \App\Events\DeletedAnuncioEvent  $event
     * @return void
     */
    public function handle(DeletedAnuncioEvent $event)
    {
        $mensaje = new \stdClass();

        $mensaje->asunto = "¡UN ANUNCIO POR EL QUE TENÍAS UNA OFERTA SE HA BORRADO!";
        $mensaje->email = $event->anuncio->oferta->user->email;
        $mensaje->nombre = $event->anuncio->oferta->user->name;
        $titulo = $event->anuncio->titulo;
        $importe = $event->oferta->importe;

        $mensaje->mensaje = "El anuncio $titulo por el que tenías una oferta de $importe € ha sido retirado. El propietario del anuncio lo ha dado de baja
                            bien porque ha aceptado otra oferta o bien porque ha retirado el anuncio";

        Mail::to( $event->user->email )->send(new Warning($mensaje));
    }

}
