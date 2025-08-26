@extends('layouts.app')

@section('content')
<div>
    <body>
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
            <nav id="sidebar" aria-label="Main Navigation">
                <div class="content-side content-side-full">
                    <img id="Logo1" src="{{ asset('images/lexia_white.png') }}" class="img-fluid my-5" alt="LEXIA">
                    <div class="mt-3">
                        @include('Includes.Menu.Vertical')
                    </div>
                </div>
            </nav>
            @include('Includes.Menu.Horizontal')
            <main id="main-container" class="bg-white">
                <div class="bg-white">
                    <div class="content content-full bg-white">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
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
        @include('Includes.Footer')
    </body>
</div>
@endsection
