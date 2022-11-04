<?php


namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

class UserController
{

    public function coherenciaDatosDB(){

        $users = User::where('email_verified_at', NULL)->with('roles')->get();
        foreach($users as $user)
        {
            if($user->hasRoles('IDENTIFICADO'))
                continue;
            $user->roles()->attach(4);
            $user->roles()->detach([3,5]);
        }
        $users = User::where('email_verified_at', '!=', NULL)->with('roles')->get();
        foreach($users as $user)
        {
            if($user->hasRoles('VERIFICADO'))
                continue;
            $user->roles()->attach(3);
            $user->roles()->detach([5,4]);
        }

        $users = User::with('roles')->orderBy('id', 'ASC')->withCount('anuncios')->get();
        return view('users.list', [
            'users' => $users
        ]);
    }

    //
    public function index(){

        $users = User::with('roles')->orderBy('id', 'ASC')->withCount('anuncios')->get();

        return view('users.list', [
            'users' => $users
        ]);
    }

    //
    public function show( Request $request ){

        $user = User::find($request->user());

        return view('users.profile', [
            'user' => $user
        ]);
    }

    public function profile( Request $request ){

        $user = User::firstOrFail('id', 'like', Auth::user()->id)->with('anuncios')->get();
        dd($user);
        // $user->with('anuncios')->with('ofertas')->get();
        return view('users.profile', [
            'user'=>$user,
        ]);
    }

    public function edit( Request $request, User $user )
    {
        // Método que solo comprueba si la moto pertenece al usuario:
        // if( Auth::id() != $bike->user_id )
        //     return view('errors.403');

        //Autorización con Policies:
        $userA = $request->user();

        if($userA->cant('update', $user))
                return view('errors.403');

        if( Auth::user()->cant('update', $user))
                return view('errors.403');

        $roles = Role::all();
        $userRoles = $user->roles;

        // $notUserRoles = new Collection;

		//  foreach ($roles as $item)
		//  {
		//      if ( ! $userRoles->contains($item->getKey()))
		// 	 {
		// 	     $notUserRoles->add($item);
		// 	 }
		//  }
        $notUserRoles = $user->remainingRoles();

        return view('users.edit', [
            'user'=>$user,
            'roles' => $roles,
            'notUserRoles' => $notUserRoles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(  User $user, Request $request )
    {
        // logica que solo comprueba que el usuario y el user_id de la moto coinciden
        // if( Auth::id() != $bike->user_id )
        //     return view('errors.403');

        //Autorización con Policies:
        if(Auth::user()->cant('update', $user))
            return view('errors.403');

        //Autorizacion con Policies:
        //NO FUNCIONA SACANDO EL USUARIO DE LA RELACIÓN DEL MODELO
        // $user = $bike->user();
        // if( $user->cant('update',$bike))
        //             abort(401, 'No puedes editar esta moto');

        $request->validate([
            'name' =>'required|max:255',
            'apellidos' => 'required|max:255',
            'email' =>'required|max:255',
            'poblacion' =>'required|max:255',
            'provincia' =>'required|max:255',
            'telefono' =>'required|max:255',
            'fechanacimiento' => 'required',
            'roles' =>'max:255',
        ]);

        if($request->input('roles')){
            // dd($request->input('roles'));
            $user->roles()->attach($request->input('roles'));

            if( $user->hasRoles('BLOQUEADO')){
                $anuncios = $user->anuncios;
                    foreach ($anuncios as $anuncio){
                        foreach($anuncio->ofertas as $oferta){
                            $oferta->delete();
                        }
                        $anuncio->delete();
                    }
                $ofertas = $user->ofertas;
                foreach($ofertas as $oferta){
                    $oferta->delete();
                }
            }
        }

        $user->update($request->only('name', 'apellidos', 'email', 'poblacion', 'provincia', 'telefono', 'fechanacimiento'));

        $users = User::with('roles')->orderBy('id', 'ASC')->withCount('anuncios')->get();

        return redirect()->route('users.list', [ 'users' => $users ])
        ->with('success' , "Usuario $user->name con ID $user->id actualizado correctamente");
    }


    public function removeRole(  Request $request )
    {

        $user = User::findOrFail(request('userid'));
        $user->roles()->detach(request('roleid'));

        $users = User::with('roles')->orderBy('id', 'ASC')->withCount('anuncios')->get();

        return redirect()->route('users.list', [ 'users' => $users ])
        ->with('success' , "Usuario $user->name con ID $user->id quitado su rol correctamente");

    }

    public function destroy( User $user )
    {
        // METODO PARA COMPROBAR EN EL CONTROLADOR SI LA RUTA ESTÁ CORRCETAMENTE FIRMADA
        // si usamos el middleware 'signed' en la ruta ya no hace falta pasarle al controlador la request
        // if( !$request->hasValidSignature() )
        //     abort(403, 'No estas autorizado a borrar esa moto');

        //Autorizacion con Policies:
        if( !Auth::user()->can('delete', $user) )
            return view('errors.403');

        //USANDO UNA GATE PARA IMPEDIR EL BORRADO DE MOTOS POR USUARIOS QUE NO PUEDEN ACCEDER AL RECURSO
        // if(Gate::denies('borrarMoto', $bike))
        //     abort(401, 'No puedes borrar un recurso que no es tuyo');

        //MODO DE TENER RUTAS FIRMADAS CON CLAVES QUE NO SEAN LA APP.KEY
        URL::setKeyResolver( fn() => config('app.route_key'));

        $user->delete();

        $anuncios = $user->anuncios;
        foreach ($anuncios as $anuncio){
            $anuncio->delete();
        }

        return redirect()->route('users.trashed')
                ->with('success' , "Usuario $user->name con ID $user->id y sus anuncios borrados correctamente");
    }

    public function trashed (){
        $users = User::onlyTrashed()->with('roles')->orderBy('id', 'ASC')->get();

        foreach ($users as $user){
            $user->anuncios_count = count($user->anuncios()->withTrashed()->get());
        }

        return view('users.list', [
            'users' => $users
        ]);
    }

    public function userRestore( int $id ){
        $user = User::withTrashed()->find($id);
        $user->restore();

        $users = User::with('roles')->orderBy('id', 'ASC')->withCount('anuncios')->get();
        // $miperfil = TRUE;

        return redirect()->route('users.list', ['users' => $users])
                ->with('success' , "Usuario $user->name restaurado en la base de datos correctamente");
    }

    public function purgeUser( Request $request ){
        $user = User::withTrashed()->find( $request->input('user_id'));

            //TODO: ELIMINAR SUS MOTOS PERMANENTEMENTE
            /**
            *   $bikes = $user->bikes;
            *
            *   if($user->forceDelete()){
            *       foreach($bikes as $bike){
            *           if( $bike->forceDelete() && $bike->image){
            *               Storage::delete('public/'.config('filesystems.bikesImageDir').'/'.$bike->image );
            *           }
            *       };
            *    }
            */

        return back()
                // ->with('success' , "Usuario $user->name y todas sus motos borradas definitivamente");
                ->with('success' , "TODO: ELIMINAR SUS ANUNCIOS Y LAS FOTOS DE SUS MOTOS PERMANENTEMENTE");


    }

    public function dashboard(){
        return view('layouts.admin');
    }

}
