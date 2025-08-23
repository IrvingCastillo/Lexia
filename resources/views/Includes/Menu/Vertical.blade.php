{{-- <?php
$routeName = explode("/", Route::getFacadeRoot()->current()->uri());
$routeName1 = (!isset($routeName[0])) ? '0' : $routeName[0];
$routeName2 = (!isset($routeName[1])) ? '0' : $routeName[1];
?> --}}

<ul class="nav-main">
    <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'casos') ? 'active' : '' }}" href="{{ asset('casos') }}">
            <i class="nav-main-link-icon" style="font-size:18px;"> <img src="{{ asset('dist/fontawesome-6/svgs/brands/gavel.svg') }}" alt="" style="width: 1.5rem; transform: scaleX(-1); font-weight: bold;"> </i>
            <span class="nav-main-link-name">Casos</span>
        </a>
    </li>

        <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'ia') ? 'active' : '' }}" href="{{ asset('ia') }}">
                <i class="nav-main-link-icon"><img src="{{ asset('dist/fontawesome-6/svgs/brands/head-gear.svg') }}" alt="" style="width: 1.5rem; transform: scaleX(-1); font-weight: bold;"></i>
                <span class="nav-main-link-name">IA</span>
            </a>
        </li>

        <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'finanzas') ? 'active' : '' }}" href="{{ asset('finanzas') }}">
                <i class="nav-main-link-icon"><img src="{{ asset('dist/fontawesome-6/svgs/brands/dollar.svg') }}" alt="" style="width: 1.3rem; font-weight: bold;"></i>
                <span class="nav-main-link-name">Finanzas</span>
            </a>
        </li>


        <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'calendario') ? 'active' : '' }}" href="{{ asset('calendario') }}">
                <i class="nav-main-link-icon far fa-calendar-check fa-1x" style="font-size:20px;"></i>
                <span class="nav-main-link-name">Calendario</span>
                {{-- <span class=" rounded-circle-notify ml-4 text-center" id="">9</span> --}}
            </a>
        </li>


        <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'usuarios') ? 'active' : '' }}" href="{{ asset('usuarios') }}">
                <i class="nav-main-link-icon"><img src="{{ asset('dist/fontawesome-6/svgs/brands/cog.svg') }}" alt="" style="width: 1.3rem; font-weight: bold;"></i>
                <span class="nav-main-link-name">Administrar usuarios</span>
            </a>
        </li>
