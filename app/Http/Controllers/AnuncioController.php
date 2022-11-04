<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Oferta;
use App\Models\Anuncio;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Events\OneThousandVisits;
use Illuminate\Support\Facades\DB;
use App\Events\DeletedAnuncioEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnuncioCreateRequest;
use App\Http\Requests\AnuncioUpdateRequest;
use App\Services\AnuncioPhotoUploadService;

class AnuncioController extends Controller
{
    public function index()
    {
        $anuncios = Anuncio::with('user')->with('categoria')->withCount('ofertas')->orderBy('id', 'ASC')->paginate(12);
        // $anuncios = Anuncio::orderBy('id', 'ASC')->paginate(12);
        $total = Anuncio::count();

        return view('anuncios.list', ['anuncios' => $anuncios, 'total' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if( !Auth::check() )
        //     return view('errors.403');

        $categorias = Categoria::all()->pluck('nombre', 'id');

        return view('anuncios.create', [
            'categorias' => $categorias
        ]);

    }

    public function store( AnuncioCreateRequest $request)
    {

        if( !Auth::check() )
            return view('errors.403');

        if( $request->hasFile('image') ){
            $savePhoto = AnuncioPhotoUploadService::store($request);
            $datos = $request->except('image');
            $datos += ['image' => $savePhoto];
            $datos += ['categoria_id' => $request['categoria']];

            $userId = Auth::id();

            $datos += ['user_id' => Auth::id() ];
            $anuncio = Anuncio::create( $datos );

            // if( $request->user()->first_anuncio_created == 0  ){
            //     FirstanuncioCreated::dispatch( $anuncio, $request->user());
            //     $request->user()->first_anuncio_created = 1;
            //     $request->user()->save();
            // }

        }else{
            $datos = $request->except('image');
            $datos += ['image' => 'noimage.png' ];
            $datos += ['categoria_id' => $request['categoria']];

            $datos += ['user_id' => Auth::id() ];
            $anuncio = Anuncio::create( $datos );

            // if( $request->user()->first_anuncio_created == 0  ){
            //     FirstanuncioCreated::dispatch( $anuncio, $request->user());
            //     $request->user()->first_anuncio_created = 1;
            //     $request->user()->save();
            // }
        }
        // $userMaxanuncios = User::with('anuncios')->get()->max('anuncios');

        // if( $userMaxanuncios->value('user_id') == $anuncio->user->id ){
        //     Moreanuncios::dispatch( $anuncio );
        // }
        // $this->emitTo('alertnotification', 'anuncioAdded');
// dd($request->session()->all());
        $request->session()->flash('flash.banner', 'Yay it works!');
        $request->session()->flash('flash.bannerStyle', 'success');
        // return redirect('/');

        return redirect()->route('anuncio.misanuncios')
            ->with('success' , "Anuncio $anuncio->titulo guardado correctamente")
            ->cookie('lastInsertId', $anuncio->id, 0);
    }

    public function show( Anuncio $anuncio)
    {
        DB::table('anuncios')->increment('visitas', 1);

        // logica para mandar mail de felicitacion por tener mil visitas
        if( $anuncio->visitas == 1000 ){
            OneThousandVisits::dispatch(  $anuncio );
        }
        $ofertas = Oferta::where('anuncio_id', $anuncio->id )->where('rejected', FALSE)->orderBy('importe', 'DESC')->get();

        $ofertasRechazadas = Oferta::where('anuncio_id', $anuncio->id )->where('rejected', TRUE)->orderBy('importe', 'DESC')->get();
        // $anuncios = Anuncio::orderBy('id', 'ASC')->paginate(12);
        $totalOfertas = count($ofertas);
        // $anuncio = Anuncio::find($anuncio)->withCount('ofertas')->orderBy('ofertas_count', 'DESC')->all();

        return view('anuncios.show', [
            'anuncio'=>$anuncio,
            'totalOfertas' => $totalOfertas,
            'ofertas' => $ofertas,
            'ofertasRechazadas' => $ofertasRechazadas
        ]);
    }


    public function edit(Request $request, Anuncio $anuncio )
    {
        // Método que solo comprueba si la moto pertenece al usuario:
        // if( Auth::id() != $anuncio->user_id )
        //     return view('errors.403');

        //Autorización con Policies:
        // if(Auth::user()->cant('update', $anuncio))
        $user = $request->user();

        if( $user->cant('update', $anuncio))
        return view('errors.403');

        $categorias = Categoria::all()->pluck('nombre', 'id');

        $value = $request->session()->flash('status', '1');

        return view('anuncios.update', [
            'anuncio'=>$anuncio,
            'categorias' => $categorias
        ]);
    }

    public function update( AnuncioUpdateRequest $request, Anuncio $anuncio)
    {
        // logica que solo comprueba que el usuario y el user_id de la moto coinciden
        // if( Auth::id() != $anuncio->user_id )
        //     return view('errors.403');

        //Autorización con Policies:
        // if(Auth::user()->cant('update', $anuncio))
        //     return view('errors.403');

        //Autorizacion con Policies:
        //NO FUNCIONA SACANDO EL USUARIO DE LA RELACIÓN DEL MODELO
        $user = $anuncio->user();
        //Autorización con Policies:
        if(Auth::user()->cant('update', $anuncio))
            return view('errors.403');

        if($request->exists('image')){
            $savePhoto = AnuncioPhotoUploadService::store($request);
            $anuncio->image = $savePhoto;
            $anuncio->update();
        }

        if($request->filled('eliminarImagen') && $anuncio->image ){
            Storage::delete( 'public/'.config('filesystems.anunciosImageDir').'/'.$anuncio->image );
            $anuncio->image = NULL;
            $anuncio->update();
        }

        if( $request->input('categoria')){
            $anuncio->categoria_id = $request->input('categoria');
        }

        $anuncio->update($request->only('titulo', 'descripcion', 'precio', 'categoria_id'));
        //TO DO BORRAR FOTO ANTIGUA DEL SISTEMA DE ARCHIVOS

        return back()
                ->with('success' , "Anuncio $anuncio->titulo actualizado correctamente")
                ->cookie('lastInsertId', $anuncio->id, 0 );
    }

    public function misAnuncios()
    {
        $anuncios = Anuncio::where('user_id', 'LIKE', Auth::user()->id )->with('categoria')->withCount('ofertas')->orderBy('created_at', 'DESC')->paginate(12);
        // $anuncios = Anuncio::where('user_id', 'LIKE', Auth::user()->id )->paginate(12);
        $ofertas = Oferta::where('user_id', 'like', Auth::user()->id  )->paginate(10);

        $total = count($anuncios);

        $miperfil = TRUE;

        return view('anuncios.misanuncios', [
            'anuncios' => $anuncios,
            'total' => $total,
            'miperfil' => $miperfil,
            'ofertas' => $ofertas
        ]);
    }

    public function delete(Request $request,  Anuncio $anuncio )
    {
        $user = $request->user();

        if( $user->cant('delete',$anuncio) )
            return view('errors.403',
            [
                'mensaje' => "Estás intentando acceder a un recurso al que no tienes acceso"
            ]);

        return view('anuncios.delete', ['anuncio'=>$anuncio]);
    }

    public function destroy( Anuncio $anuncio )
    {
        // METODO PARA COMPROBAR EN EL CONTROLADOR SI LA RUTA ESTÁ CORRCETAMENTE FIRMADA
        // si usamos el middleware 'signed' en la ruta ya no hace falta pasarle al controlador la request
        // if( !$request->hasValidSignature() )
        //     abort(403, 'No estas autorizado a borrar esa moto');

        //Autorizacion con Policies:
        if( !Auth::user()->can('delete', $anuncio) )
            return view('errors.403');

        //USANDO UNA GATE PARA IMPEDIR EL BORRADO DE MOTOS POR USUARIOS QUE NO PUEDEN ACCEDER AL RECURSO
        // if(Gate::denies('borrarMoto', $anuncio))
        //     abort(401, 'No puedes borrar un recurso que no es tuyo');

        //MODO DE TENER RUTAS FIRMADAS CON CLAVES QUE NO SEAN LA APP.KEY
        // URL::setKeyResolver( fn() => config('app.route_key'));

        // $anuncio->delete();

        $ofertas = $anuncio->ofertas;

        foreach ($ofertas as $oferta){
            DeletedAnuncioEvent::dispatch(  $anuncio, $oferta->user, $oferta );
            $oferta->delete();
        }

        $anuncio->delete();

        return redirect()->route('anuncios.trashed', [
            'user' => Auth::user()
        ])
                ->with('success' , "Anucnio $anuncio->titulo con ID $anuncio->id y sus ofertas borrados");
    }

     /**
     * Metodo para recuperar los anuncios borrados con SOFTDELETES
     */

    public function userTrashedAnuncios( ){

        if( Auth::user()->hasRoles(['ADMINISTRADOR'])){
            $anuncios = Anuncio::onlyTrashed()->with('user')->paginate(12);
            $total = count(Anuncio::onlyTrashed()->get());
        }else{
            $anuncios = Auth::user()->anuncios()->onlyTrashed()->paginate(12);
            $total = count($anuncios);
        }

        return view('anuncios.trashed', ['anuncios' => $anuncios , 'total' => $total ]);
     }

     /**
      * RESTORE SOFDELETES
      */
    public function anuncioRestore( int $id ){

        $anuncio = anuncio::withTrashed()->find($id);

        if( $anuncio->user == NULL ){
            $anuncios = Anuncio::with('user')->orderBy('id', 'ASC')->paginate(12);
            // $anuncios = anuncio::orderBy('id', 'ASC')->paginate(12);
            $total = Anuncio::count();

            // return view('anuncios.list', ['anuncios' => $anuncios, 'total' => $total])
                    return back()->withErrors( ['error' => "Estás intentando restaurar un anuncio cuyo propietario está dado de baja"] );
        }

        $anuncio->restore();

        if( Auth::user()->hasRoles(['ADMINISTRADOR'])){
            $anuncios = Anuncio::with('user')->orderBy('id', 'ASC')->paginate(12);

            $total = Anuncio::count();

            return redirect()->route('anuncio.index', ['anuncios' => $anuncios])
                ->with('success' , "Anuncio $anuncio->titulo restaurado en la base de datos correctamente");

        }else{
            $anuncios = Anuncio::where('user_id', 'LIKE', Auth::user()->id )->paginate(12);

            $total = count($anuncios);

            // $miperfil = TRUE;

            return view('anuncios.list', ['anuncios' => $anuncios, 'total' => $total ])
                ->with('success' , "Anuncio $anuncio->titulo restaurado en la base de datos correctamente");
        }


    }

    /**
     * Elimina el anuncio definitivamente y la imagen asociada a dicho anuncio
     *
     * @param integer $id
     * @return void
     */
    public function purgeAnuncio ( Request $request ){

        $anuncio = anuncio::withTrashed()->find( $request->input('anuncio_id'));

        if( $anuncio->forceDelete() && $anuncio->image){
            Storage::delete('public/'.config('filesystems.anunciosImageDir').'/'.$anuncio->image );
        }

        return back()
                ->with('success' , "Anuncio $anuncio->titulo borrado definitivamente");
    }

    /**
     * search method by marca and modelo
     */
    public function search( Request $request ){

        $request->validate([
           'titulo' => 'max:16',
           'descripcion' => 'max:16'
        ]);

        $titulo = $request->input('titulo');
        $descripcion  = $request->input('descripcion');

        $anuncios = Anuncio::where( "titulo", "LIKE", "%$titulo%")
                    ->where('descripcion', "LIKE", "%$descripcion%")->get();

        $total = count($anuncios);

        $anuncios = Anuncio::where( "titulo", "LIKE", "%$titulo%")
                        ->where('descripcion', "LIKE", "%$descripcion%")
                        ->paginate(12)
                        ->appends(['titulo'=> $titulo, 'descripcion' => $descripcion ]);

        return view('anuncios.list', ['anuncios' => $anuncios, 'total' => $total, 'titulo'=> $titulo, 'descripcion' => $descripcion]);
    }


}
