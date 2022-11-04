<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isVerified1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( $request->user()->hasRoles(['VERIFICADO', 'EDITOR', 'ADMINISTRADOR']))
            return $next($request);
            // abort(403, 'Acceso denegado, debes tener más permisos para realizar estas tareas para realizar estas tareas');


    }
}
