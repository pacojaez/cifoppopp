<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->check() && auth()->user()->is_admin)
        // return $next($request);

        if( !$request->user()->hasRoles('ADMINISTRADOR'))
            abort(403, 'Acceso denegado, debes ser administrador para realizar estas tareas');

        return $next($request);
    }
}
