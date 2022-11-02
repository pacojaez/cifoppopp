<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Oferta;
use App\Models\Anuncio;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfertaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Oferta $oferta)
    {
        return $user->isAnuncioOwner($oferta->anuncio) ||
                $user->hasRoles(['ADMINISTRADOR', 'EDITOR']);
    }

    public function delete(User $user, Oferta $oferta)
    {
       return $user->isOfertaOwner( $oferta)||
       $user->hasRoles(['ADMINISTRADOR', 'EDITOR']);
    }
}
