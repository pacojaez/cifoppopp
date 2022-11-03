@extends('emails.base')
@section('content')
    <tr align="center">
        <td align="center">
            <h2>¡¡¡¡ENHORABUENA!!!!</h2>
            <p>De: {{ $mensaje->nombre}} {{ $mensaje->email }}</p>
            <p> {{ $mensaje->mensaje}} </p>
            <p>TE ESPERAMOS EN CIFOPPOPP</p>
        </td>
    </tr>
    <tr>
        <td align="center">
            <p>
                <a href="{{ route('login')}}" class="btn-primary">LOGIN</a>
            </p>
        </td>
        <td align="center">
            <p>
                <a href="{{ url($mensaje->link )}}" class="btn-primary">VER ANUNCIO</a>
            </p>
        </td>
    </tr>
@endsection
