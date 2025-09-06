<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='icon' href='{{ asset('images/landing/lexia-logo2.png') }}' type='image/png' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('Includes.Head')

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <div id="page-loader" style="text-align:center; width: 100%; height: 130%; z-index: 1000000 !important; position: absolute; background: #BFBFBF; opacity: 0.4; top:50%; left:50%; transform:translate(-50%, -50%)">
        <div class="d-flex justify-content-center">
            <canvas id="pageLoad" class="Carga"  style="width: 550px; height:550px"></canvas>
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
