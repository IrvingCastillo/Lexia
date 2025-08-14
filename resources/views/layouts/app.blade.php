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
<style>
    #page-loader {
    transition: opacity 0.3s ease-in-out;
}
</style>
<body class="bg-white">
    <div id="page-loader" style="text-align:center; width: 100%; height: 100%; z-index: 1000000 !important; position: absolute; background: aliceblue; opacity: 0.4; padding-top: 50%;">
        <div class="d-flex justify-content-center">
            <canvas id="pageLoad" class="Carga"  style="width: 550px; height:550px"></canvas>
            {{-- <img src="{{ url('https://media.tenor.com/WX_LDjYUrMsAAAAj/loading.gif') }}" alt="Cargando..." class="w-50"> --}}
        </div>
</div>
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
