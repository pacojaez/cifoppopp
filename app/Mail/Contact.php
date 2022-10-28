<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $mensaje )
    {
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email =  $this->from($this->mensaje->email)
                    ->subject('Mensaje recibido: '.$this->mensaje->asunto)
                    ->with('concesionario', 'Concesionario Terrassa Plaza')
                    ->view('emails.contact');

        if( $this->mensaje->file)
            $email->attach($this->mensaje->file, [
                'as' => 'adjunto'.uniqid().'.pdf',
                'mime' => 'application/pdf'
            ]);

            return $email;
    }
}
