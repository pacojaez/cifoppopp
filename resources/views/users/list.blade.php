@extends('layout.master')

@section('titulo', 'Todas las motos de Larabikes')

@section('contenido')
    @can('view', Auth::user())

        @php($pagina = Route::currentRouteName())
        {{-- formulario de busqueda --}}
        {{-- {{ $users->links() }} --}}
        <h2 class="text-2xl font-bold text-red-400">{{ $pagina == 'users.trashed' ? 'USUARIOS DADOS DE BAJA' : '' }}</h2>
        <h2 class="text-2xl font-bold text-gray-400">{{ $pagina == 'users.list' ? 'USUARIOS ACTIVOS' : '' }}</h2>
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
                                        Name
                                    </th>
                                    <th class="p-8 text-xs text-gray-500">
                                        Email
                                    </th>
                                    <th class="p-8 text-xs text-gray-500">
                                        ALTA
                                    </th>
                                    <th class="p-8 text-xs text-gray-500">
                                        Nº de MOTOS
                                    </th>
                                    <th class="p-8 text-xs text-gray-500">
                                        ROLES
                                    </th>
                                    @can('update', Auth::user())
                                        @if ($pagina == 'users.list')
                                            <th class="px-6 py-2 text-xs text-gray-500">
                                                EDITAR
                                            </th>
                                            <th class="p-8 text-xs text-gray-500">
                                                ELIMINAR (CON SOFTDELETES)
                                            </th>
                                        @elseif($pagina == 'users.trashed')
                                            <th class="px-6 py-2 text-xs text-gray-500">
                                                RESTAURAR
                                            </th>
                                            <th class="p-8 text-xs text-gray-500">
                                                ELIMINAR (CON FORCEDELETES)
                                            </th>
                                        @endif
                                    @endcan
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($users as $user)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{ $user->id }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="text-sm text-gray-900">
                                                {{ $user->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="text-sm text-gray-500">
                                                {{ $user->email }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{ $user->created_at }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{ $user->bikes_count }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            @foreach ($user->roles as $role)
                                                <p class="m-2 uppercase">{{ $role->role }}</p>
                                            @endforeach
                                        </td>
                                        @can('update', Auth::user())
                                            @if ($pagina == 'users.trashed')
                                                <td class="px-6 py-4 text-center">
                                                    <a href="{{ route('user.restore', ['id' => $user->id]) }}"
                                                        class="px-4 py-1 text-xs text-white bg-blue-400 rounded">
                                                        Restore
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <form class="" action="{{ route('user.purge', ['id' => $user->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                                                        <button type="submit"
                                                            class="px-4 py-1 text-xs text-white bg-red-400 rounded">
                                                            FORCE DELETE
                                                        </button>
                                                    </form>
                                                </td>
                                            @elseif ($pagina == 'users.list')
                                                <td class="px-6 py-4 text-center">
                                                    <a href="{{ route('user.edit', ['user' => $user]) }}"
                                                        class="px-4 py-1 text-xs text-white bg-blue-400 rounded">
                                                        Edit
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <form class="" action="{{ route('user.destroy', ['user' => $user]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                                                        <button type="submit"
                                                            class="px-4 py-1 text-xs text-white bg-red-400 rounded">
                                                            BORRAR
                                                        </button>
                                                    </form>

                                                </td>
                                            @endif
                                        @endcan
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
    @endcan

@endsection
