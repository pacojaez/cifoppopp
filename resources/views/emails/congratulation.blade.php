@extends('emails.base')
@section('content')
    <tr>
        <td>
            <h2>¡¡¡¡ENHORABUENA!!!!</h2>
            <p>De: {{ $mensaje->nombre}} {{ $mensaje->email }}</p>
            <p> {{ $mensaje->mensaje}} </p>
            <p>TE ESPERAMOS EN LARABIKES</p>
        </td>
    </tr>
    <tr>
        <td align="center">
            <p>
                <a href="{{ route('login')}}" class="btn-primary">ENTRA A VER TUS PROGRESOS</a>
            </p>
        </td>
    </tr>
@endsection


{{-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- The CSS stylesheet which will be inlined. -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/mail.css')}}">
    @if($mensaje->asunto )
        <title>{{ $mensaje->asunto }}</title>
    @endif
    @vite('resources/css/mail.css')
</head>
<body>
    <header>
        <img src="{{ asset('img/components/favicon.png')}}" width="100px" height="100px"alt="favicon">
        <h1>{{ config('app.name') }}</h1>
    </header>
    <div class="w-full h-full px-8 py-12">
        <h2 class="text-3xl font-bold">MENSAJE RECIBIDO</h2>
        <p>De: {{ $mensaje->nombre}} {{ $mensaje->email }}</p>
        <p> {{ $mensaje->mensaje}} </p>
        <div class="max-w-md px-8 py-4 my-20 bg-white rounded-lg shadow-lg">
            <div class="flex justify-center -mt-16 md:justify-end">
              <img class="object-cover w-20 h-20 border-2 border-indigo-500 rounded-full" src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
            </div>
            <div>
              <h2 class="text-3xl font-semibold text-gray-800">Design Tools</h2>
              <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolores deserunt ea doloremque natus error, rerum quas odio quaerat nam ex commodi hic, suscipit in a veritatis pariatur minus consequuntur!</p>
            </div>
            <div class="flex justify-end mt-4">
              <a href="#" class="text-xl font-medium text-indigo-500">John Doe</a>
            </div>
          </div>
    </div>
    <footer>
        Mensaje enviado desde el {{ $concesionario }}
    </footer>
</body>
</html> --}}
