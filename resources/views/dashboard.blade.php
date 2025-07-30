@extends('layouts.app')

@section('content')
<div>
    <body>
        {{-- <div style="text-align:center; width: 100%; height: 100%; z-index: 1000000 !important; position: absolute; background: aliceblue; opacity: 0.4; padding-top: 20%;">
            <canvas class="animError" style="width: 250px; height:150px"></canvas>
        </div> --}}
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
            {{-- @include('Includes.Menu.Derecho') --}}
            <nav id="sidebar" aria-label="Main Navigation">
                <div class="content-side content-side-full">
                    <img id="Logo1" src="{{ asset('images/lexia_white.png') }}" class="img-fluid mb-5" alt="LEXIA">
                    @include('Includes.Menu.Vertical')
                </div>
            </nav>
            @include('Includes.Menu.Horizontal')
            <main id="main-container" class="bg-white">
                <div class="bg-white">
                    <div class="content content-full bg-white">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            {{-- <h1 class="flex-sm-fill h3 my-2">
                                @yield('Titulo')
                            </h1> --}}
                            {{-- {{ Breadcrumbs::render() }} --}}
                        </div>
                    </div>
                </div>
                <div id="app">
                    @if(isset($acceso['acceso']))
                        @if($acceso['acceso'])
                            @yield('Contenido')
                        @else
                            {{-- @include('Errors.Denied') --}}
                        @endif
                    @else
                        @yield('Contenido')
                    @endif
                </div>
            </main>
        </div>
        {{-- @include('Partials.Toast') --}}
        @include('Includes.Footer')
    </body>
</div>
@endsection
