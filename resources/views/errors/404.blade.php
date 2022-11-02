@extends('layouts.master')

@section('titulo', 'Pagina no encontrada')

@section('contenido')
    <div class="flex mt-16 mb-6 shadow-lg flex-colw-full rounded-xl md:grid-cols-4">
        <div class="m-5 border shadow card">
            <div class="mx-4 -mt-6 card-header">
                <img class="w-auto rounded-lg" src="{{ asset('/img/components/error404.jpg') }}"
                    alt=" en construccion" />
            </div>
        </div>
    </div>
@endsection
