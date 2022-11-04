<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Bike;
use App\Mail\Contact;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BlockedController
{
    public function sendMail( Request $request ){

        $request->validate([
            'email' => 'required|email:rfc',
            'name' => 'required',
            'message' => 'required',
            'file' => 'sometimes|file|mimes:pdf'
        ]);

        $mensaje = new \stdClass();

        $mensaje->asunto = $request->asunto;
        $mensaje->email = $request->email;
        $mensaje->nombre = $request->nombre;
        $mensaje->mensaje = $request->mensaje;

        $mensaje->file = $request->hasFile('file') ? $request->file('file')->getRealPath() : NULL;

        Mail::to('contacto@cifoppopp.com')->send(new Contact($mensaje));

        return redirect()->route('anuncio.index')
        ->with('success', 'Mensaje recibido, nos pondremos en contacto contigo inmediatamente');

    }


}
