<?php

namespace App\Listeners;

use App\Mail\Congratulation;
use App\Events\AddedOfertaEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewOfferNotification
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
     * @param  \App\Events\AddedOfertaEvent  $event
     * @return void
     */
    public function handle(AddedOfertaEvent $event)
    {
        $mensaje = new \stdClass();

        $mensaje->asunto = "¡UN ANUNCIO TUYO HA RECIBIDO UNA OFERTA!!!";
        $mensaje->email = $event->anuncio->user->email;
        $mensaje->nombre = $event->anuncio->user->name;
        $mail_comprador = $event->oferta->user->email;
        $importe = $event->oferta->importe;
        $titulo = $event->anuncio->titulo;
        $mensaje->link = 'http://127.0.0.1:8000/naturalmente/anuncio/show/'.$event->anuncio->id;

        $mensaje->mensaje = "Tu anuncio $titulo ha recibido una oferta de $mail_comprador por un importe de $importe €.
                            Tienes más detalles como la vigencia y algún comentario en la página del anuncio.";

        Mail::to( $event->anuncio->user->email )->send(new Congratulation($mensaje ));
    }
}
