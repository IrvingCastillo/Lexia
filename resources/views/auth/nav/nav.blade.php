<nav class="navbar navbar-dark bg-dark justify-content-between">
    <div>
        <img src="{{ asset('images/lexia_transparent.png') }}" alt="LEXIA" id="logoLogin">
    </div>
    <div class="mr-3">
        <span class="navLinks"><a class="nav-login-link {{ (\Request::route()->getName() == 'home') ? 'active' : '' }}" href="{{ route('home') }}"> Inicio </a></span>
        <span class="navLinks"><a class="nav-login-link {{ (\Request::route()->getName() == 'planes') ? 'active' : '' }}" href=" {{ route('planes') }}"> Planes </a></span>
        <span class="navLinks"><a class="nav-login-link {{ (\Request::route()->getName() == 'login') ? 'active' : '' }}" href="{{ route('login') }}"> Iniciar Sesión </a></span>

    </div>
</nav>
