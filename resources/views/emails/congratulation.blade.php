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
