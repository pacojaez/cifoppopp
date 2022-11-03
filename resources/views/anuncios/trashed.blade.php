@extends('layouts.master')

@section('titulo', 'Todas los anucnios que has retirado de Cifoppopp')

@section('contenido')

    @if ($total >= 1)
        <div class="flex flex-row justify-center">
            <p>
                Has borrado {{ $total }} Anuncios
            </p>
        </div>
    @endif

    {{-- @if (isset($miperfil))
        <x-mi-perfil></x-mi-perfil>
    @endif --}}
    <h2 class="text-2xl font-bold text-gray-700">ANUNCIOS BORRADOS</h2>
    @if ($total >= 1)
        {{ $anuncios->links() }}
        <div class="grid w-full grid-cols-1 gap-4 mt-16 mb-6 break-words shadow-lg rounded-xl md:grid-cols-4">

            @foreach ($anuncios as $anuncio)
                <div class="m-5 border shadow card">
                    <div class="mx-4 -mt-6 card-header">
                        <a href="{{ route('anuncio.show', $anuncio->id) }}" blur-shadow-image="true">
                            <img class="w-auto rounded-lg hover:animate-pulse"
                                src="
                            @if ($anuncio->image != null) {{ asset('storage/' . config('filesystems.anunciosImageDir') . '/' . $anuncio->image) }}
                            @else
                            {{ asset('img/components/noimage.png') }} @endif
                        "
                                alt="{{ $anuncio->titulo . '-' . $anuncio->categoria->nombre }}" />
                            {{-- <img class="w-auto rounded-lg" src="{{ asset($anuncio->image) }}"
                            alt="{{ $anuncio->marca . '-' . $anuncio->modelo }}" /> --}}
                            {{-- {{ $anuncio->matriculada }} --}}

                        </a>
                    </div>
                    <div @class([
                        'card-body',
                        'bg-red-500/20' => !$anuncio->titulo,
                        'text-gray-500' => !$anuncio->titulo,
                    ])>

                        <h4 class="text-4xl font-bold">{{ $anuncio->titulo }}</h4>
                        <h4 class="text-2xl font-semibold">{{ $anuncio->descripcion }}</h4>

                        <p class="mb-1 text-xl uppercase opacity-60">
                            CAT: {{ $anuncio->categoria->nombre }}
                        </p>
                        {{-- @if ($anuncio->matriculada)
                            <p class="mb-1 text-xl opacity-60">
                                Matricula: {{ $anuncio->matricula }}
                            </p>
                        @endif --}}
                        {{-- <p class="mb-1 text-xl opacity-60">
                            Potencia: {{ $anuncio->caballos }} C.C.
                        </p> --}}
                        {{-- <p class="mb-1 text-xl opacity-60">
                            Kms: {{ $anuncio->kms }}
                        </p> --}}
                        @if (isset($anuncio->user->name))
                            <p class="mb-1 text-xl opacity-60">
                                DE: {{ $anuncio->user->name }}
                            </p>
                        @endif

                        <p class="mb-1 text-xl opacity-60">
                            Visitas: {{ $anuncio->visitas }}
                        </p>
                        <div class="flex flex-col justify-center align-middle">
                            {{-- @if (isset($anuncio->user->id) && $anuncio->user->id == Auth::id()) --}}
                            {{-- usando la dircetiva de blade can() --}}
                            @cannot('update', $anuncio)
                                <p class="self-center text-xs font-bold">Los anuncios solo los pueden editar sus propietarios </p>
                            @endcannot
                            @can('update', $anuncio)
                            @if( $anuncio->user != NULL )
                            <div class="flex justify-center mt-6">
                                <a href="{{ route('anuncio.restore', ['id' => $anuncio->id]) }}">
                                    <p
                                        class="px-3 py-2 mt-6 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-500 rounded-md dark:bg-green-600 dark:hover:bg-green-700 dark:focus:bg-green-700 hover:bg-green-600 focus:outline-none focus:bg-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-50">
                                        RESTAURAR ANUNCIO
                                    </p>
                                </a>
                            </div>
                            <form class="mt-2" action="{{ route('anuncio.purge', ['id' => $anuncio->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="anuncio_id" value="{{ $anuncio->id }}">
                                <div class="flex justify-center mt-6">
                                    <button type="submit"
                                        class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                        ELIMINAR PERMANENTEMENTE
                                    </button>
                                </div>
                            </form>
                            @else
                            <p class="self-center text-xs font-bold">Los anuncios solo se pueden restaurar si son de usuarios dados de alta </p>
                            @endif

                            @endcan
                            {{-- @endif --}}

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        {{ $anuncios->links() }}
    @else
        <div class="flex flex-row justify-center">
            <h2> NO HAY ANUNCIOS CON ESOS DATOS DE BÚSQUEDA</h2>

        </div>
    @endif
@endsection
