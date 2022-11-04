<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'poblacion' => ['required', 'string', ],
            'provincia' => ['required', 'string'],
            'cp' => ['required', 'string'],
            'telefono' => ['required', 'numeric'],
            'fechanacimiento' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'poblacion' => $request->poblacion,
            'provincia' => $request->provincia,
            'cp' => $request->cp,
            'telefono' => $request->telefono,
            'fechanacimiento' => $request->nacimiento
        ]);

        $user->roles()->attach(4);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }
}
