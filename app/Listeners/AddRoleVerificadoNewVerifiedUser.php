<?php

namespace App\Listeners;

use App\Events\GiveRoleVerificado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddRoleVerificadoNewVerifiedUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\GiveRoleVerificado  $event
     * @return void
     */
    public function handle( GiveRoleVerificado $event)
    {
        $event->user->roles()->detach(4);
        $event->user->roles()->attach(3);
        $event->user->save();
    }
}
