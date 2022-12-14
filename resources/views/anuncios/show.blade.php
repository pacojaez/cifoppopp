@extends('layouts.master')

@section('titulo', 'Detalle del Anuncio {{ $anuncio->titulo }} ')

@section('contenido')
    <div class="p-4 md:w-1/3">
        <div class="h-full overflow-hidden border-2 border-gray-200 rounded-lg border-opacity-60">
            <div class="w-full">
                <div class="flex w-full p-2">
                    <div class="p-2 ">
                        <img src="https://firebasestorage.googleapis.com/v0/b/thecaffeinecode.appspot.com/o/Tcc_img%2Flogo.png?alt=media&token=5e5738c4-8ffd-44f9-b47a-57d07e0b7939"
                            alt="logo" class="w-10 h-10 overflow-hidden rounded-full" />
                    </div>
                    <div class="pt-2 pl-2 ">
                        <p class="font-bold">{{ $anuncio->user->name }}</p>
                        <p class="text-xs">Añadido: {{ $anuncio->created_at->toDateString() }}</p>
                        <p class="font-bold">EN: {{ $anuncio->user->poblacion }}-<span class="font-bold uppercase">{{ $anuncio->user->provincia }}</span></p>
                    </div>
                </div>
            </div>

            @if ($anuncio->vendido)
                <!-- SOLD OUT Card -->
                <div class="object-cover object-center w-full p-3 antialiased bg-gray-600 rounded-lg shadow-lg lg:h-48 md:h-36"
                    style="
                    background-image:url({{ url('') . '/storage/img/anuncios/' . $anuncio->image }});
                    background-repeat: no-repat;
                    background-size: cover;
                    background-blend-mode: multiply;
                ">
                    <img class="antialiased rounded-lg shadow-lg" src="{{ asset('/img/components/sold-out.png') }}">
                </div>
                <!-- End SOLD OUT Card -->
            @else
                <img class="object-cover object-center w-full lg:h-48 md:h-36"
                    src="{{ asset('/storage/img/anuncios/' . $anuncio->image) }}" alt="{{ $anuncio->titulo }}" />
            @endif

            <div class="p-4">
                <h2
                    class="p-2 m-2 mb-1 text-xs font-bold tracking-widest text-gray-800 uppercase bg-blue-200 rounded-lg p2 title-font">
                    CATEGORIA:{{ $anuncio->categoria->nombre }}</h2>
                <h2 class="mb-3 text-xl font-bold text-gray-900 title-font">{{ $anuncio->titulo }}</h2>
                <h3 class="mb-3 text-lg font-medium text-gray-900 title-font">{{ $anuncio->descripcion }}</h3>
                <div class="flex flex-wrap items-center ">
                    <span
                        class="inline-flex items-center py-1 pr-3 ml-auto mr-3 text-sm leading-none text-gray-400 border-r-2 border-gray-200 lg:ml-auto md:ml-0">
                        <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                        </svg>
                        Visitas: {{ $anuncio->visitas }}
                    </span>
                    <span class="inline-flex items-center text-sm leading-none text-gray-400">
                        <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path
                                d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                            </path>
                        </svg>
                        Ofertas: {{ $anuncio->ofertas_count }}
                    </span>

                </div>
            </div>
            @can('createOffer', $anuncio)
                @if (Auth::user()->hasVerifiedEmail())
                    @if (!$anuncio->isSold())
                        <div class="p-4">
                            <a href="{{ route('oferta.create', ['anuncio' => $anuncio]) }}"
                                class="p-2 m-2 font-boldrounded-lg md:mb-2 lg:mb-0">
                                {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                <div class="flex justify-center mt-6">
                                    <p type="submit"
                                        class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                        HACER OFERTA
                                    </p>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="p-4">
                            <div class="p-2 m-2 font-boldrounded-lg md:mb-2 lg:mb-0">
                                <div class="flex justify-center mt-6">
                                    <p
                                        class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-500 rounded-md dark:bg-red-600 dark:hover:bg-gray-700 dark:focus:bg-red-700 hover:bg-gray-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                        NO SE PUEDEN REALIZAR OFERTAS A UN ANUNCIO YA VENDIDO
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="p-4">
                        <div class="p-2 m-2 font-boldrounded-lg md:mb-2 lg:mb-0">
                            <div class="flex flex-col justify-center mt-6">
                                <p
                                    class="px-3 py-2 text-sm tracking-wide text-center text-white capitalize transition-colors duration-200 transform bg-gray-500 rounded-md dark:bg-red-600 dark:focus:bg-red-700 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                    Tienes que verificar tu mail antes de poder hacer alguna oferta
                                </p>
                                <a href="{{ route('profile.show') }}" class="p-2 m-2 font-boldrounded-lg md:mb-2 lg:mb-0">
                                    {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                    <p
                                        class="px-3 py-2 text-sm tracking-wide text-center text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                        {{ __('Editar Perfil') }}
                                    </p>
                                </a>
                                <form method="POST" action="{{ route('verification.send') }}" class="p-2 m-2 font-boldrounded-lg md:mb-2 lg:mb-0">
                                    @csrf

                                    <div class="px-3 py-2 text-sm tracking-wide text-center text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">

                                        <button type="submit">
                                            {{ __('Enviar Mail de Verificación') }}
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endcan
            @can('update', $anuncio)
                <div class="flex flex-wrap justify-center m-2">
                    <a href="{{ route('anuncio.show', ['anuncio' => $anuncio]) }}"
                        class="p-2 m-2 text-gray-800 uppercase bg-blue-300 rounded-lg md:mb-2 lg:mb-0">
                        <p class="inline-flex items-center">VER
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </p>
                    </a>
                    <a href="{{ route('anuncio.edit', ['anuncio' => $anuncio]) }}"
                        class="p-2 m-2 text-gray-800 uppercase bg-green-300 rounded-lg md:mb-2 lg:mb-0">
                        <p class="inline-flex items-center font-bold">EDITAR
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                {{-- <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path> --}}
                            </svg>
                        </p>
                    </a>
                    <a href="{{ route('anuncio.delete', ['anuncio' => $anuncio]) }}"
                        class="p-2 m-2 font-bold text-gray-800 bg-red-300 rounded-lg md:mb-2 lg:mb-0">
                        <p class="inline-flex items-center font-bold">ELIMINAR
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                {{-- <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path> --}}
                            </svg>
                        </p>
                    </a>
                </div>
            @endcan

        </div>
        @can('viewOffers', $anuncio)
            <div class="p-4">
                <h2
                    class="p-2 m-2 mb-1 text-xs font-bold tracking-widest text-gray-800 uppercase bg-blue-200 rounded-lg p2 title-font">
                    OFERTAS ACTIVAS
                </h2>
                @foreach ($ofertas as $oferta)
                    <div class="flex flex-col flex-wrap items-center p-2 m-2 shadow-md">
                        <h3 class="mb-3 text-lg font-medium text-gray-900 title-font">Oferta de: {{ $oferta->user->name }}
                        </h3>
                        <h3 class="mb-3 text-lg font-medium text-gray-900 title-font">COMENTARIO: {{ $oferta->texto }}</h3>
                        <h5 class="mb-3 text-xs font-bold text-gray-900 title-font">OFERTA REALIZADA EL :
                            {{ $oferta->created_at->toDateString() }}</h5>
                        <div class="flex flex-row flex-wrap items-center p-2 m-2">
                            <form action="{{ route('oferta.accepted', ['oferta' => $oferta]) }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="p-2 m-2 font-bold text-gray-800 bg-green-300 rounded-lg md:mb-2 lg:mb-0">
                                    <p class="inline-flex items-center">ACEPTAR {{ $oferta->importe }} €
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </p>
                                </button>
                            </form>
                            <a href="{{ route('oferta.rejected', ['oferta' => $oferta]) }}"
                                class="p-2 m-2 font-bold text-gray-800 bg-red-300 rounded-lg md:mb-2 lg:mb-0">
                                <p class="inline-flex items-center text-sm">RECHAZAR {{ $oferta->importe }} €
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </p>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <hr>
                @endforeach
            </div>
            <div class="p-4 bg-slate-400">
                <h2
                    class="p-2 m-2 mb-1 text-xs font-bold tracking-widest text-red-800 uppercase bg-blue-200 rounded-lg p2 title-font">
                    OFERTAS RECHAZADAS
                </h2>
                @foreach ($ofertasRechazadas as $oferta)
                    <div class="flex flex-col flex-wrap items-center p-2 m-2 shadow-md">
                        <h3 class="mb-3 text-lg font-medium text-red-900 title-font">Oferta de: {{ $oferta->user->name }}</h3>
                        <h3 class="mb-3 text-lg font-medium text-red-900 title-font">COMENTARIO: {{ $oferta->texto }}</h3>
                        <h5 class="mb-3 text-xs font-bold text-red-900 title-font">OFERTA REALIZADA EL :
                            {{ $oferta->created_at->toDateString() }}</h5>
                        <div class="flex flex-row flex-wrap items-center p-2 m-2">
                            <form action="{{ route('oferta.accepted', ['oferta' => $oferta]) }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="p-2 m-2 font-bold text-gray-300 bg-gray-600 rounded-lg md:mb-2 lg:mb-0">
                                    <p class="inline-flex items-center">ACEPTAR {{ $oferta->importe }} €
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </p>
                                </button>
                            </form>
                            {{-- <a href="{{ route('oferta.rejected', ['oferta' => $oferta ])}}" class="p-2 m-2 font-bold text-gray-800 bg-red-300 rounded-lg md:mb-2 lg:mb-0">
                                <p class="inline-flex items-center text-sm">RECHAZAR {{ $oferta->importe }} €
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </p>
                            </a> --}}
                        </div>
                    </div>
                    <hr>
                    <hr>
                @endforeach
            </div>
        @endcan
    </div>
@endsection
