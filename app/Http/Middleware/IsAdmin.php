<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->check() && auth()->user()->is_admin)
        // return $next($request);

        if( !Auth::user()->hasRoles('ADMINISTRADOR'))
            abort(403, 'Acceso denegado, debes ser administrador para realizar estas tareas');

        return $next($request);
    }
}
