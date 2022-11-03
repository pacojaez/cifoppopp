@extends('layouts.master')

@section('titulo', 'Todas tu ofertas realizadas en Cifoppopp')

@section('contenido')
    {{-- @can('view', Auth::user()) --}}

    @php($pagina = Route::currentRouteName())
    <h2 class="text-2xl font-bold text-red-400">OFERTAS QUE HE REALIZADO</h2>
    <h4 class="font-semibold text-gray-600 text-large">LAS OFERTAS MARCADAS EN ROJO SON DE PRODUCTOS QUE O BIEN NO ESTÁ EL USUARIO DE ALTA O BIEN EL ANUNCIO YA NO ESTÁ DISPONIBLE</h4>
    <div class="container mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="p-4 border-b border-gray-200 shadow">
                    <!-- <table> -->
                    <table id="dataTable" class="p-4">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="p-8 text-xs text-gray-500">
                                    ID
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    IMPORTE
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    TEXTO
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    VIGENCIA
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    ANUNCIO
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    EMAIL VENDEDOR
                                </th>

                                <th class="p-8 text-xs text-gray-500">
                                    ELIMINAR
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($ofertas as $oferta)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{ $oferta->id }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="text-sm text-gray-900">
                                            {{ $oferta->importe }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="text-sm text-gray-500">
                                            {{ $oferta->texto }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{ $oferta->vigencia }}
                                    </td>
                                    <td @class([
                                        'px-6',
                                        'py-4',
                                        'text-sm',
                                        'text-center',
                                        'text-gray-500',
                                        'bg-red-300' => $oferta->anuncio->deleted_at
                                        ])
                                            >
                                        {{ $oferta->anuncio->titulo }}
                                    </td>
                                    <td <td @class([
                                        'px-6',
                                        'py-4',
                                        'text-sm',
                                        'text-center',
                                        'text-gray-500',
                                        'bg-red-300' => $oferta->anuncio->user->deleted_at
                                        ])
                                    >
                                        {{ $oferta->anuncio->user->email }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <form class="" action="{{ route('oferta.destroy', ['id' => $oferta->id]) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="id" value="{{ $oferta->id }}">

                                            <button type="submit" class="px-4 py-1 text-xs text-white bg-red-400 rounded">
                                                ELIMINAR OFERTA
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

        });
    </script>
    {{-- {{ $users->links() }} --}}
    {{-- @endcan --}}

@endsection
