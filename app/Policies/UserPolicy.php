<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Anuncio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user)
    {
        // El ADMINISTRADOR es el único con capcidad de ver listados de usuarios
        // return $user->email == 'admin@larabikes.com';
        return $user->hasRoles(['ADMINISTRADOR', 'EDITOR']);
    }

    public function create(User $user)
    {
        return $user->hasRoles(['ADMINISTRADOR', 'EDITOR']);
    }

    public function update(User $user )
    {
        // El ADMINISTRADOR es el único con capcidad de ver listados de usuarios
        // return $user->email == 'admin@larabikes.com';
        return $user->hasRoles(['ADMINISTRADOR']);
    }

    public function delete(User $user, User $model)
    {

       return $user->hasRoles(['ADMINISTRADOR']);
    }

    public function restore(User $user, User $model)
    {
        //
    }

    public function forceDelete(User $user, User $model)
    {
        //
    }
}
