<?php

namespace App\Models;

use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'apellidos',
        'poblacion',
        'provincia',
        'cp',
        'telefono',
        'fechanacimiento',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function anuncios(){
        return $this->hasMany(Anuncio::class);
    }

    /**
     * RELATION WITH ROLES
     *
     */
    public function roles(){
        return $this->belongsToMany(Role::class);
    }


    public function ofertas(){
        return $this->hasMany(Role::class);
    }

    /**
     * METODO PARA COMPROBAR SI EL USUARIO ES PROPIETARIO DEL ANUNCIO
     */
    public function isAnuncioOwner( Anuncio $anuncio ){
        return $this->id == $anuncio->user_id;
    }

    /**
     * METODO PARA CONMPROBAR SI EL USUARIO ES PROPIETARIO DE LA OFERTA
     */
    public function isOfertaOwner( Oferta $oferta ){
        return $this->id == $oferta->user_id;
    }

    /**
     * Method para comprobar si el usuario tiene un rol concreto dentro de un array
     */
    public function hasRoles( string|array $rolesNames ): bool
    {
        if(!is_array($rolesNames))
            $rolesNames = [ $rolesNames];

        foreach( $this->roles as $role){
            if(in_array($role->role, $rolesNames) )
            return TRUE;
        }

        return FALSE;
    }

    /**
     * Roles not asigned to user
     *
     * @param User $user
     * @return void
     */
    public function remainingRoles( ){

        $roles = Role::all();
        $userRoles = $this->roles;
        return $roles->diff($userRoles);
    }
}
