@props(['color' => 'oscuro'])

@php
    switch ($color) {
        case 'oscuro':
                $bg = 'bg-oscuro';
                $img = 'images/lexia_transparent.png';
            break;
        case 'blue':
                $bg = 'bg-blue';
                $img = 'images/lexia_transparent.png';
            break;
        case 'claro':
                $bg = 'bg-claro';
                $img = 'images/lexia_white.png';
            break;
        default:
                $bg = 'bg-oscuro';
                $img = 'images/lexia_transparent.png';
            break;
    }
@endphp

<nav {{ $attributes->merge(['class'=>'navbar navbar-dark justify-content-between ' .$bg]) }}>
    <div>
        <img src="{{ asset($img) }}" alt="LEXIA" id="logoLogin">
    </div>
    <div class="mr-3">
        <span class="navLinks"><a class="nav-login-link {{ (\Request::route()->getName() == 'landing') ? 'active' : '' }}" href="{{ route('landing') }}"> Inicio </a></span>
        <span class="navLinks"><a class="nav-login-link {{ (\Request::route()->getName() == 'planes') ? 'active' : '' }}" href=" {{ route('planes') }}"> Planes </a></span>
        <span class="navLinks"><a class="nav-login-link {{ (\Request::route()->getName() == 'login') ? 'active' : '' }}" href="{{ route('login') }}"> Iniciar Sesión </a></span>

    </div>
</nav>
