@props(['color' => 'oscuro'])

@php
    switch ($color) {
        case 'oscuro':
                $bg = ' ';
                // $img = 'images/landing/lexia-logo-white.png';
            break;
        case 'blue':
                $bg = 'bg-blue';
                // $img = 'images/landing/lexia-logo-white.png';
            break;
        case 'claro':
                $bg = 'bg-claro';
                // $img = 'images/landing/lexia-logo2.png';
            break;
        default:
                $bg = 'bg-oscuro';
                // $img = 'images/landing/lexia-logo-white.png';
            break;
    }
@endphp

<nav {{ $attributes->merge(['class'=>'navbar navbar-expand-lg fixed-top justify-content-between py-0 ' .$bg]) }} >
    <div class="container-fluid py-2" style="height: 130px; background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.95)) !important; font-weight:800">
        <a class="navbar-brand" href="#" style="font-weight: 700; font-size: 1.8rem;">
            <img src="{{ asset('images/landing/lexia-logo-white.png') }}" alt="Lexia Logo" class="navbar-logo">
            Lexia
        </a>
        <div class="d-flex align-items-center gap-3">
            <a class="btn-signin {{ (\Request::route()->getName() == 'login') ? 'active' : '' }}" href="{{ route('login') }}"> Iniciar Sesión </a>
            <a class="btn-signin {{ (\Request::route()->getName() == 'registro') ? 'active' : '' }}" href="{{ route('registro') }}"> Regístrate </a>
            <a class="btn-signin {{ (\Request::route()->getName() == 'planes') ? 'active' : '' }}" href=" {{ route('planes') }}"> Planes </a>

        </div>
    </div>
</nav>
