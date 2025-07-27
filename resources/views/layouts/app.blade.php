<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('Includes.Head')

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    {{-- <div id="imgLOAD" style="text-align:center; width: 100%; height: 100%; z-index: 1000000 !important; position: absolute; background: rgb(108, 115, 121); opacity: 0.5; padding-top: 20%;">
            <b style="color: black; font-weight: 900 !important;">Cargando...</b>
            <img src="{{ asset('img/ajax-loader.gif') }}"/>
        </div> --}}
    <div id="app">
        @guest
            <main class="bg-white">
                @yield('contenido')
            </main>
        @else
        @endguest
        <main class="bg-white">
            @yield('content')
        </main>
    </div>

</body>
</html>
