<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CifoPpopP') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/components/favicon.png') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <script defer src="https://unpkg.com/alpinejs@3.8.1/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <link href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" />
    {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" /> --}}
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!--DATA TABLES FOR USERS TABLE-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/animationsvg.css') }}"> --}}
    {{-- <link href="https://tailwindcomponents.com/css/component.nature.css" rel="stylesheet"> --}}
    @vite('resources/css/app.css')
    @livewireStyles

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link
        href="https://fonts.googleapis.com/css?family=Abhaya+Libre:400,800|Montserrat:600|Alegreya+Sans:500&display=swap"
        rel="stylesheet" />

    <!-- Scripts -->

    <script defer src="{{ mix('js/app.js') }}"></script>
    {{-- <script defer src="{{ mix('js/todosFilter.js') }}" defer></script> --}}

    {{-- <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script> --}}

    <!-- ANIME -->
    {{-- <script src="{{ asset('js/anime.min.js') }}" defer></script> --}}
    <!-- Alpine v3 -->
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    {{-- <script src="https://unpkg.com/alpinejs" defer></script> --}}
    {{-- <script defer src="https://unpkg.com/alpinejs@3.8.1/dist/cdn.min.js"></script> --}}
    @livewireStyles

</head>

<body class="overflow-x-hidden">
    @include('components.navbar2')
    {{-- @include('navigation-menu') --}}

    @includeWhen(Session::has('success'), 'layouts.success')
    @includeWhen($errors->any(), 'layouts.error')
    <main class="flex flex-col items-center justify-center w-full mt-2">
        {{-- <x-alert /> --}}

        @yield('contenido')

    </main>
    @include('components.footer')

    @stack('scripts')

    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/colored-shadow.js"></script>
    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
    @livewireScripts

    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script> --}}
    {{-- @stack('scripts') --}}
</body>

</html>
