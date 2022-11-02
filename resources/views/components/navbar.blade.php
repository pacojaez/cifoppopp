@php($pagina = Route::currentRouteName())
<nav class="w-full bg-gray-200 navbar ">
    <div class="px-0 container-lg">

        <div class="flex flex-row items-center">
            <a class="ml-0 mr-auto nav-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/components/logolarabikes.png') }}" style="height:200px; width:200px"
                    alt="logoLarabikes" />
            </a>
            {{-- <p> LARABIKES</p> --}}
            <button navbar-trigger="" class="mb-0 ml-auto mr-0 navbar-trigger lg:hidden xl:hidden" type="button"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-trigger-icon">
                    <span bar1="" class="mt-1 navbar-trigger-bar"><span
                            class="hidden origin-[10%_10%] rotate-45"></span></span>
                    <span bar2="" class="mt-2 bar2 navbar-trigger-bar"></span>
                    <span bar3="" class="mt-2 bar3 navbar-trigger-bar"><span
                            class="mt-mt-[0.4375rem] hidden origin-[10%_90%] -rotate-45"></span></span>
                </span>
            </button>
        </div>

        <div class="collapse navbar-collapse" navbar-menu="">
            <!-- search bar -->
            <x-bike-search />
            <!-- end search bar -->
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link" aria-current="page" href="{{ route('bike.index') }}">
                        <i class="mr-2 text-base material-icons opacity-60">article</i>
                        <span class="{{ $pagina == 'bike.index' ? 'underline font-bold' : '' }}">NUESTRAS MOTOS</span>
                    </a>
                </li>
                <li class="flex">
                    <a class="nav-link" href="{{ route('contact') }}">
                        <i class="mr-2 text-base material-icons opacity-60"></i>
                        <span class="{{ $pagina == 'contact' ? 'underline font-bold' : '' }}">CONTACTO</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="https://github.com/pacojaez/laravelcursocifo" target="blank">
                        <i class="mr-2 text-base fab fa-github opacity-60"></i>
                        <span>Github</span>
                    </a>
                </li>

                @auth
                    @can('create', new App\Models\Bike())
                        <li>
                            <a class="nav-link" href="{{ route('bike.create') }}">
                                <i class="mr-2 text-base material-icons opacity-60">apps</i>
                                <span class="{{ $pagina == 'bike.create' ? 'underline font-bold' : '' }}">CREAR MOTO</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('bike.editLast') }}">
                                <i class="mr-2 text-base material-icons opacity-60">apps</i>
                                <span class="{{ $pagina == 'bike.editLast' ? 'underline font-bold' : '' }}">LAST UPDATED</span>
                            </a>
                        </li>
                    @endcan
                    @can('update', new App\Models\User())
                        <li class="flex">
                            <a class="nav-link" href="{{ route('bike.cleanBikeDirectory') }}">
                                <i class="mr-2 text-base material-icons opacity-60"></i>
                                <span class="{{ $pagina == 'cleanBikeDirectory' ? 'underline font-bold' : '' }}">CLEAN BIKES
                                    DIR</span>
                            </a>
                        </li>
                    @endcan
                    <li class="flex">
                        <a class="nav-link" href="{{ route('testwelcome') }}">
                            <i class="mr-2 text-base material-icons opacity-60"></i>
                            <span class="{{ $pagina == 'testwelcome' ? 'underline font-bold' : '' }}">TEST</span>
                        </a>
                    </li>
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
                            <a class="nav-link" href="{{ route('bike.myBikes') }}">
                                {{-- <i class="mr-2 text-base material-icons opacity-60"></i> --}}
                                <span class="{{ $pagina == 'bike.myBikes' ? 'underline font-bold' : '' }}">MIS MOTOS</span>
                            </a>
                        </li>
                        @can('view', Auth::user())
                            <li class="px-3 py-1 rounded-sm hover:bg-gray-100">
                                <a class="nav-link" href="{{ route('userTrashedBikes', ['user' => Auth::user()]) }}">
                                    {{-- <i class="mr-2 text-base material-icons opacity-60"></i> --}}
                                    <span class="{{ $pagina == 'userTrashedBikes' ? 'underline font-bold' : '' }}">MOTOS
                                        BORRADAS</span>
                                </a>
                            </li>
                            <li class="px-3 py-1 rounded-sm hover:bg-gray-100">
                                <a class="nav-link" href="{{ route('users.list') }}">
                                    {{-- <i class="mr-2 text-base material-icons opacity-60"></i> --}}
                                    <span class="{{ $pagina == 'users.list' ? 'underline font-bold' : '' }}">USUARIOS</span>
                                </a>
                            </li>
                            <li class="px-3 py-1 rounded-sm hover:bg-gray-100">
                                <a class="nav-link" href="{{ route('users.trashed') }}">
                                    {{-- <i class="mr-2 text-base material-icons opacity-60"></i> --}}
                                    <span class="{{ $pagina == 'users.trashed' ? 'underline font-bold' : '' }}">USUARIOS DADOS
                                        DE BAJA</span>
                                </a>
                            </li>
                        @endcan
                    </x-login-drop-down>
                @else
                    <x-login-drop-down>
                        <li class="flex">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="mr-2 text-base material-icons opacity-60"></i>
                                <span class="{{ $pagina == 'login' ? 'underline font-bold' : '' }}">LOGIN</span>
                            </a>
                        </li>
                        <li class="flex">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="mr-2 text-base material-icons opacity-60"></i>
                                <span class="{{ $pagina == 'register' ? 'underline font-bold' : '' }}">REGISTRO</span>
                            </a>
                        </li>
                    </x-login-drop-down>
                @endauth
            </ul>
        </div>
    </div>
</nav>
