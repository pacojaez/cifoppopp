<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Anuncio;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnuncioPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return TRUE;
    }

    public function view(User $user, Anuncio $anuncio)
    {
        return TRUE;
    }

    public function create(User $user)
    {
        return $user->hasVerifiedEmail();
    }

    public function update( User $user, Anuncio $anuncio )
    {
        // return $user->id == $anuncio->user_id || $user->email == 'EDITOR@laraanuncios.com';
        return $user->isAnuncioOwner($anuncio) ||
                $user->hasRoles(['ADMINISTRADOR', 'EDITOR']);
    }

    public function delete(User $user, Anuncio $anuncio)
    {
        // || $user->email == 'EDITOR@laraanuncios.com';
        return $user->isAnuncioOwner($anuncio) ||
                $user->hasRoles(['ADMINISTRADOR', 'EDITOR']);
    }

    public function restore(User $user, Anuncio $anuncio)
    {
        //
    }

    public function forceDelete( User $user )
    {
        // El ADMINISTRADOR es el único con capcidad de borrar motos
        return $user->email == 'admin@cifoppopp.com';
    }
}
