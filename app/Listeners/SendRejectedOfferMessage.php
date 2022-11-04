<?php

namespace App\Listeners;

use App\Events\RejectedOfferEvent;
use App\Mail\Warning;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRejectedOfferMessage
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
     * @param  \App\Events\RejectedOfferEvent  $event
     * @return void
     */
    public function handle(RejectedOfferEvent $event)
    {
        $mensaje = new \stdClass();

        $mensaje->asunto = "¡UNA OFERTA TUYA HA SIDO RECHAZADA";
        $mensaje->email = $event->oferta->user->email;
        $mensaje->nombre = $event->oferta->user->name;
        $mail_vendedor = $event->anuncio->user->email;
        $importe = $event->oferta->importe;
        $titulo = $event->anuncio->titulo;
        $mensaje->link = 'http://127.0.0.1:8000/naturalmente/anuncio/show/'.$event->anuncio->id;

        $mensaje->mensaje = "Tu oferta de importe $importe € sobre el anuncio $titulo ha sido rechazada por el vendedor $mail_vendedor.";

        Mail::to( $event->oferta->user->email )->send(new Warning($mensaje ));
    }
}
