<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Events\RejectedOfferEvent;
use App\Events\DeletedAnuncioEvent;
use Illuminate\Support\Facades\Auth;

class OfertaController extends Controller
{

    public function destroy( Oferta $oferta )
    {
        // METODO PARA COMPROBAR EN EL CONTROLADOR SI LA RUTA ESTÁ CORRCETAMENTE FIRMADA
        // si usamos el middleware 'signed' en la ruta ya no hace falta pasarle al controlador la request
        // if( !$request->hasValidSignature() )
        //     abort(403, 'No estas autorizado a borrar esa moto');

        //Autorizacion con Policies:
        // if( !Auth::user()->can('delete', $user) )
        //     return view('errors.403');

        //USANDO UNA GATE PARA IMPEDIR EL BORRADO DE MOTOS POR USUARIOS QUE NO PUEDEN ACCEDER AL RECURSO
        // if(Gate::denies('borrarMoto', $bike))
        //     abort(401, 'No puedes borrar un recurso que no es tuyo');

        //MODO DE TENER RUTAS FIRMADAS CON CLAVES QUE NO SEAN LA APP.KEY
        // URL::setKeyResolver( fn() => config('app.route_key'));

        $oferta->delete();

        // $bikes = $user->bikes;
        // foreach ($bikes as $bike){
        //     $bike->delete();
        // }

        return redirect()->route('anuncio.misanuncios')
                ->with('success' , "Oferta retirada correctamente");
    }

    public function create( Anuncio $anuncio){

        return view('ofertas.create', [
            'anuncio' => $anuncio
        ]);
    }

    public function store( Request $request, Anuncio $anuncio)
    {
        // if( !Auth::check() )
        //     return view('errors.403');

        // if( $request->hasFile('image') ){
        //     $savePhoto = BikePhotoUploadService::store($request);
        //     $datos = $request->except('image');
        //     $datos += ['image' => $savePhoto];

        //     if( $request->input('matricula')){
        //         $datos += ['matriculada' => TRUE];
        //     }
        //     $datos += ['user_id' => Auth::id() ];
        //     $oferta = Oferta::create( $datos );

        //     if( $request->user()->first_bike_created == 0  ){
        //         FirstBikeCreated::dispatch( $bike, $request->user());
        //         $request->user()->first_bike_created = 1;
        //         $request->user()->save();
        //     }

        // }else{
        //     $datos = $request->except('image');
        //     $datos += ['image' => 'noimage.png' ];
        //     if( $request->input('matricula')){
        //         $datos += ['matriculada' => TRUE];
        //     }

        //     $datos += ['user_id' => Auth::id() ];
        //     $bike = Bike::create( $datos );

        //     if( $request->user()->first_bike_created == 0  ){
        //         FirstBikeCreated::dispatch( $bike, $request->user());
        //         $request->user()->first_bike_created = 1;
        //         $request->user()->save();
        //     }
        // }
        // $userMaxBikes = User::with('bikes')->get()->max('bikes');

        // if( $userMaxBikes->value('user_id') == $bike->user->id ){
        //     MoreBikes::dispatch( $bike );
        // }

        // return redirect()->route('bike.show', $bike)
        //     ->with('success' , "Moto $bike->marca $bike->modelo guardada correctamente")
        //     ->cookie('lastInsertId', $bike->id, 0);
    }

    public function accepted( Request $request, Oferta $oferta ){
        // dd($oferta);
        $anuncio = Anuncio::where('id', $oferta->anuncio_id)->first();
        $collect = $anuncio->ofertas;
        //Sacamos de la collection la oferta aceptada
        $rejected = $collect->filter(function ($value, $key) use ( $oferta ) {
            return data_get( $value, 'id') != $oferta->id;
        });

        $rejected = $rejected->all();
        foreach( $rejected as $oferta){
            //mandar un mail a cada usuario de la oferta rechazada
            //crear un ecçvento OfertaRechazadaEvent
            RejectedOfferEvent::dispatch( $oferta->user, $oferta );
            $oferta->delete();
        }

        //poner el anuncio como VENDIDO
    }
}
