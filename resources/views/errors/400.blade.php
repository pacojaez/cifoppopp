@extends('layouts.master')

@section('titulo', 'Sintaxis incorrecta')

@section('contenido')
    <div class="flex mt-16 mb-6 shadow-lg flex-colw-full rounded-xl md:grid-cols-4">
        <div class="m-5 border shadow card">
            <div class="mx-4 -mt-6 card-header">
                <img class="w-auto rounded-lg" src="{{ asset('/img/components/error400.png') }}"
                    alt=" en construccion" />
            </div>
        </div>
    </div>
@endsection
