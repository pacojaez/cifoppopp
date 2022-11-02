@extends('layouts.master')

@section('titulo', 'Anuncios de CifoPpopP')

@section('contenido')
    <section class="w-full p-10 m-10 text-gray-600 body-font">
        <h2>MIS ANUNCIOS PUBLICADOS</h2>
        {{ $anuncios->links()}}
        <div class="container px-5 py-5 mx-auto">
            <div class="flex flex-wrap -m-4">
                <!--Start Here -->
                @foreach ($anuncios as $anuncio)
                <div class="p-4 md:w-1/3">
                    <div class="h-full overflow-hidden border-2 border-gray-200 rounded-lg border-opacity-60">
                        <div class="w-full">
                            <div class="flex w-full p-2">
                                <div class="pt-2 pl-2 ">
                                    {{-- <p class="font-bold">{{ $anuncio->user->name }}</p> --}}
                                    <p class="text-xs">Añadido: {{ $anuncio->created_at->toDateString() }}</p>
                                </div>
                            </div>
                        </div>

                        <!--public\storage\img\anuncios\1.jpg -->
                        <img class="object-cover object-center w-full lg:h-48 md:h-36"
                            src="{{ asset('/storage/img/anuncios/'. $anuncio->image) }}"
                            {{-- src="{{ asset('storage/' . config('filesystems.anunciosImageDir') . '/' . $anuncio->image) }}" --}}
                            {{-- src="{{asset('/storage/img/anuncios/1.jpg')}}" --}}


                            alt="{{ $anuncio->titulo }}" />

                        <div class="p-4">
                            <h2 class="p-2 m-2 mb-1 text-xs font-bold tracking-widest text-gray-800 uppercase bg-blue-200 rounded-lg p2 title-font">CATEGORIA:{{ $anuncio->categoria->nombre }}</h2>
                            <h1 class="mb-3 text-lg font-medium text-gray-900 title-font">{{ $anuncio->descripcion }}</h1>
                            <div class="flex flex-wrap items-center ">
                                <a href="{{ route('anuncio.show', ['anuncio' => $anuncio])}}" class="p-2 m-2 text-gray-800 uppercase bg-blue-300 rounded-lg md:mb-2 lg:mb-0">
                                    <p class="inline-flex items-center">VER
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </p>
                                </a>
                                <a href="{{ route('anuncio.edit', ['anuncio' => $anuncio])}}" class="p-2 m-2 text-gray-800 uppercase bg-green-300 rounded-lg md:mb-2 lg:mb-0">
                                    <p class="inline-flex items-center font-bold">EDITAR
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            {{-- <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path> --}}
                                        </svg>
                                    </p>
                                </a>
                                <a href="{{ route('anuncio.delete', ['anuncio'=> $anuncio ])}}" class="p-2 m-2 font-bold text-gray-800 bg-red-300 rounded-lg md:mb-2 lg:mb-0">
                                    <p class="inline-flex items-center font-bold">ELIMINAR
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            {{-- <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path> --}}
                                        </svg>
                                    </p>
                                </a>

                            </div>
                            <div class="flex flex-wrap items-center ">
                                <span
                                class="inline-flex items-center py-1 pr-3 ml-auto mr-3 text-sm leading-none text-gray-400 border-r-2 border-gray-200 lg:ml-auto md:ml-0">
                                <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                    </div>
                </div>
                @endforeach

                <!--End here-->
            </div>
        </div>
        {{-- <h2>MIS OFERTAS ACTIVAS</h2> --}}

        {{-- {{ $ofertas->links() }} --}}
        {{-- <div class="container px-5 py-5 mx-auto">
            <div class="flex flex-wrap -m-4">
                <!--Start Here -->
                @foreach ($ofertas as $oferta )
                <div class="p-4 md:w-1/3">
                    <div class="h-full overflow-hidden border-2 border-gray-200 rounded-lg border-opacity-60">
                        <div class="w-full">
                            <div class="flex w-full p-2">
                                <div class="pt-2 pl-2 ">
                                    <p class="font-bold">{{ $oferta->anuncio->titulo }}</p>
                                    <p class="text-xs font-bold">Mi oferta: {{ $oferta->importe }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex w-full p-2">
                                <p class="font-bold">DE: {{ $oferta->anuncio->user->name }}</p>
                            </div>
                        </div>

                        <img class="object-cover object-center w-full lg:h-48 md:h-36"
                            src="{{ asset('/storage/img/anuncios/'. $oferta->anuncio->image) }}"
                            alt="{{ $oferta->anuncio->titulo }}" />

                        <div class="p-4">
                            <h2 class="p-2 m-2 mb-1 text-xs font-bold tracking-widest text-gray-800 uppercase bg-blue-200 rounded-lg p2 title-font">CATEGORIA:{{ $oferta->anuncio->categoria->nombre }}</h2>
                            <h1 class="mb-3 text-lg font-medium text-gray-900 title-font">{{ $oferta->anuncio->descripcion }}</h1>
                            <div class="flex flex-wrap items-center ">
                                {{-- <a href="{{ route('anuncio.show', ['anuncio' => $oferta->anuncio])}}" class="p-2 m-2 text-gray-800 uppercase bg-green-300 rounded-lg md:mb-2 lg:mb-0">
                                    <p class="inline-flex items-center">VER
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </p>
                                </a>
                                <form class="mt-2" action="{{ route('oferta.destroy', ['id' => $oferta->id]) }}" method="POST">                                  @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="flex justify-center mt-6">
                                        <button type="submit"
                                            class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                            RETIRAR OFERTA
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="flex flex-wrap items-center ">
                                <span
                                class="inline-flex items-center py-1 pr-3 ml-auto mr-3 text-sm leading-none text-gray-400 border-r-2 border-gray-200 lg:ml-auto md:ml-0">
                                <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                </svg>
                                Visitas: {{ $oferta->anuncio->visitas }}
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!--End here-->
            </div>
        </div> --}}
    </section>
@endsection
