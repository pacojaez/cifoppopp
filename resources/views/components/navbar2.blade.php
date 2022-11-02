@php($pagina = Route::currentRouteName())

<!-- component -->
<nav id="header" class="z-30 w-full py-1 bg-white border-b border-blue-400 shadow-lg top-10">
    <div class="flex flex-row items-center justify-between w-full px-6 py-2 mt-0">
        <label for="menu-toggle" class="block cursor-pointer md:hidden">
            <svg class="text-blue-600 fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle">

        <div class="order-3 hidden w-full md:flex md:items-center md:w-auto md:order-1" id="menu">
            <a class="ml-0 mr-auto nav-brand" href=" href="{{ route('welcome')}}">
                <img src="{{ asset('img/corporativo/logocifoppopp.png') }}" style="height:100px; width:100px"
                    alt="logoCifoPpopP" />
            </a>
        </div>

        <div class="order-3 hidden w-full md:flex md:items-center md:w-auto md:order-1" id="menu">
            <nav>
                <ul class="items-center justify-between pt-4 text-base text-blue-600 md:flex md:pt-0">
                    {{-- <li><a class="inline-block px-4 py-2 text-lg font-medium no-underline hover:text-black lg:-ml-2"
                            href="{{ route('welcome')}}">Home</a></li> --}}
                    <li><a class="inline-block px-4 py-2 text-lg font-medium no-underline hover:text-black lg:-ml-2"
                            href="{{ route('anuncio.index')}}">Productos</a></li>
                    <li><a class="inline-block px-4 py-2 text-lg font-medium no-underline hover:text-black lg:-ml-2"
                            href="{{ route('contact')}}">Contacto</a></li>
                </ul>
            </nav>
        </div>
        <div class="order-3 hidden w-full md:flex md:items-center md:w-auto md:order-1" id="menu">
            @auth
        <x-login-drop-down>
            <li class="px-3 py-1 rounded-sm hover:bg-gray-100">
                <form class="nav-link" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="">
                        <span class="{{ $pagina == 'password.reset' ? 'underline font-bold' : '' }}">
                            LOGOUT
                        </span>
                    </button>
                </form>
            </li>

            <li class="px-3 py-1 rounded-sm hover:bg-gray-100">
                <a class="nav-link" href="{{ route('reset.password') }}">
                    {{-- <i class="mr-2 text-base material-icons opacity-60"></i> --}}
                    <span class="{{ $pagina == 'reset.password' ? 'underline font-bold' : '' }}">
                        RESET PASSWORD
                    </span>
                </a>
            </li>
            <li class="px-3 py-1 rounded-sm hover:bg-gray-100">
                <a class="nav-link" href="{{ route('anuncio.create' ) }}">
                    <i class="mr-2 text-base material-icons opacity-60"></i>
                    <span class="{{ $pagina == 'anuncio.create' ? 'underline font-bold' : '' }}">CREAR ANUNCIO</span>
                </a>
            </li>
            <li class="px-3 py-1 rounded-sm hover:bg-gray-100">
                <a class="nav-link" href="{{ route('anuncio.misanuncios' ) }}">
                    <i class="mr-2 text-base material-icons opacity-60"></i>
                    <span class="{{ $pagina == 'anuncio.misanuncios' ? 'underline font-bold' : '' }}">MIS ANUNCIOS</span>
                </a>
            </li>
            <li class="px-3 py-1 rounded-sm hover:bg-gray-100">
                <a class="nav-link" href="{{ route('anuncios.trashed', ['user'=> Auth::user()] ) }}">
                    <i class="mr-2 text-base material-icons opacity-60"></i>
                    <span class="{{ $pagina == 'anuncios.trashed' ? 'underline font-bold' : '' }}">ANUNCIOS ELIMINADOS</span>
                </a>
            </li>
            <li class="px-3 py-1 rounded-sm hover:bg-gray-100">
                <a class="nav-link" href="{{ route('oferta.list' ) }}">
                    <i class="mr-2 text-base material-icons opacity-60"></i>
                    <span class="{{ $pagina == 'ofertas.misofertas' ? 'underline font-bold' : '' }}">MIS OFERTAS</span>
                </a>
            </li>
            @can('view', Auth::user())
                <li class="px-3 py-1 rounded-sm hover:bg-gray-100">
                    {{-- <a class="nav-link" href="{{ route('userTrashedBikes', ['user' => Auth::user()]) }}"> --}}
                        {{-- <i class="mr-2 text-base material-icons opacity-60"></i> --}}
                        {{-- <span class="{{ $pagina == 'userTrashedBikes' ? 'underline font-bold' : '' }}">MOTOS --}}
                            {{-- BORRADAS</span> --}}
                    {{-- </a> --}}
                </li>
                <li class="px-3 py-1 rounded-sm hover:bg-gray-100">
                    {{-- <a class="nav-link" href="{{ route('users.list') }}"> --}}
                        {{-- <i class="mr-2 text-base material-icons opacity-60"></i> --}}
                        {{-- <span class="{{ $pagina == 'users.list' ? 'underline font-bold' : '' }}">USUARIOS</span> --}}
                    {{-- </a> --}}
                </li>
                <li class="px-3 py-1 rounded-sm hover:bg-gray-100">
                    {{-- <a class="nav-link" href="{{ route('users.trashed') }}"> --}}
                        {{-- <i class="mr-2 text-base material-icons opacity-60"></i> --}}
                        {{-- <span class="{{ $pagina == 'users.trashed' ? 'underline font-bold' : '' }}">USUARIOS DADOS --}}
                            {{-- DE BAJA</span> --}}
                    {{-- </a> --}}
                </li>
            @endcan
        </x-login-drop-down>
        @else
        <div class="flex flex-wrap items-center justify-end order-2 mr-0 md:order-3 md:mr-4" id="nav-content">
            <div class="flex items-center w-full auth md:w-full">
                <a href="{{ route('login')}}"
                    class="p-2 mr-4 text-gray-800 bg-transparent border border-gray-300 rounded hover:bg-gray-100 hover:text-gray-700">Login</a>
                <a href="{{ route('register')}}" class="p-2 text-gray-200 bg-blue-600 rounded hover:bg-blue-500 hover:text-gray-100">Registro</a>
            </div>
        </div>
        @endauth
        </div>




    </div>
</nav>
