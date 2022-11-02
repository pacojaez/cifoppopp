<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Events\AddedOfertaEvent;
use App\Events\RejectedOfferEvent;
use App\Events\DeletedAnuncioEvent;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OfertaStoreRequest;

class OfertaController extends Controller
{

    public function destroy( Request $request )
    {
        // METODO PARA COMPROBAR EN EL CONTROLADOR SI LA RUTA ESTÁ CORRCETAMENTE FIRMADA
        // si usamos el middleware 'signed' en la ruta ya no hace falta pasarle al controlador la request
        // if( !$request->hasValidSignature() )
        //     abort(403, 'No estas autorizado a borrar esa moto');

        $oferta = Oferta::where('id', $request->input('id'))->first();
        //Autorizacion con Policies:
        // if( Auth::user()->cant('delete', $oferta) )
        //     return view('errors.403');

        //USANDO UNA GATE PARA IMPEDIR EL BORRADO DE MOTOS POR USUARIOS QUE NO PUEDEN ACCEDER AL RECURSO
        // if(Gate::denies('borrarMoto', $bike))
        //     abort(401, 'No puedes borrar un recurso que no es tuyo');

        //MODO DE TENER RUTAS FIRMADAS CON CLAVES QUE NO SEAN LA APP.KEY
        // URL::setKeyResolver( fn() => config('app.route_key'));

        $oferta->delete();

        // return redirect()->route('anuncio.misanuncios')
        //         ->with('success' , "Oferta retirada correctamente");
        return redirect()->back()
                ->with('success' , "La oferta se ha retirado correctamente");
    }

    public function create( Anuncio $anuncio){

        return view('ofertas.create', [
            'anuncio' => $anuncio
        ]);
    }

    public function store( OfertaStoreRequest $request, Anuncio $anuncio)
    {

        if( !Auth::check() )
            return view('errors.403');

        if( Oferta::where('user_id', 'like', Auth::id())->where('anuncio_id', 'like', $anuncio->id))
            return redirect()->route('anuncio.show', $anuncio)
                ->with('success' , "Ya tienes una oferta realizada a este anuncio");

        $newOffer = new Oferta();

        $newOffer->texto = $request->input('texto');
        $newOffer->importe = $request->input('importe');
        $newOffer->vigencia = $request->input('vigencia');
        $newOffer->user_id = Auth::id();
        $newOffer->anuncio_id = $anuncio->id;
        $usermail = $anuncio->user->email;

        if($newOffer->save()){
            // dd($anuncio->user->email);
            AddedOfertaEvent::dispatch( $anuncio, $anuncio->user, $newOffer );

            return redirect()->route('anuncio.show', $anuncio)
                ->with('success' , "El anuncio $anuncio->titulo del usuario $usermail ha recibido la oferta correctamente");
        }else{
            return redirect()->route('anuncio.show', $anuncio)
            ->with('error' , "El anuncio $anuncio->titulo no ha podido recibir la oferta correctamente");
        }


    }

    public function accepted( Request $request, Oferta $oferta ){

        $anuncio = Anuncio::where('id', $oferta->anuncio_id)->first();
        $collect = $anuncio->ofertas->where('rejected', FALSE);
        // dd($collect);
        //Sacamos de la collection la oferta aceptada
        $rejected = $collect->filter(function ($value, $key) use ( $oferta ) {
            return data_get( $value, 'id') != $oferta->id;
        });

        $rejected = $rejected->all();
        foreach( $rejected as $oferta){
            //mandar un mail a cada usuario de la oferta rechazada
            //crear un ecçvento OfertaRechazadaEvent
            RejectedOfferEvent::dispatch( $oferta->user, $anuncio, $oferta );
            $oferta->rejected = TRUE;
            $oferta->save();
        }

        //poner el anuncio como VENDIDO
        $anuncio->vendido = TRUE;
        $anuncio->save();

        return redirect()->route('anuncio.show', [
            'anuncio' => $anuncio
            ])
        ->with('success' , "El anuncio $anuncio->titulo del usuario ha recibido la oferta correctamente");
    }

    public function rejected( Request $request, Oferta $oferta ){
        // dd($oferta);
        $anuncio = Anuncio::where('id', $oferta->anuncio_id)->first();

        // $collect = $anuncio->ofertas;
        //Sacamos de la collection la oferta aceptada
        // $rejected = $collect->filter(function ($value, $key) use ( $oferta ) {
        //     return data_get( $value, 'id') != $oferta->id;
        // });
        $oferta->rejected = TRUE;
        $oferta->save();

        // $rejected = $rejected->all();
        // foreach( $rejected as $oferta){
            //mandar un mail a cada usuario de la oferta rechazada
            //crear un ecçvento OfertaRechazadaEvent
            RejectedOfferEvent::dispatch( $anuncio, $oferta->user, $oferta );
            // $oferta->delete();
        // }

        //poner el anuncio como VENDIDO


        return redirect()->route('anuncio.show', [
            'anuncio' => $anuncio
            ])
        ->with('success' , "El anuncio $anuncio->titulo del usuario ha recibido la oferta correctamente");
    }

    public function list(){

        $ofertas = Oferta::where('user_id', Auth::id())->get();

        return view('ofertas.list', [
            'ofertas' => $ofertas
        ]);
    }
}
