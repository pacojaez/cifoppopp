@extends('emails.base')
@section('content')
    <tr>
        <td>
            <h2>TENEMOS NOVEDADES QUE DARTE</h2>
            <p>De: {{ $mensaje->nombre}} {{ $mensaje->email }}</p>
            <p> {{ $mensaje->mensaje}} </p>
            <p>TE ESPERAMOS EN CIFOPPOPP</p>
        </td>
    </tr>
    <tr>
        <td align="center">
            <p>
                <a href="{{ route('login')}}" class="btn-primary">ENTRA A VER TUS ANUNCIOS</a>
            </p>
        </td>
    </tr>
@endsection

