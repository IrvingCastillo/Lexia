@extends('layouts.app')

@section('contenido')

@vite(['resources/login_f/login.css', 'resources/login_f/login.js', 'resources/landing/main.css', 'resources/landing/animations.css', 'resources/landing/components.css', 'resources/landing/main.js'])
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="navLogin">
  <x-nav-guess color="blue"></x-nav-guess>
</div>

<div class="container-fluid bg-white py-5 my-5">
    <div class="row no-gutters">
        <div class="col-md-6 split-left">
            <div class="col-6 mr-5">
                <img src="{{ asset('images/login.png') }}" alt="" style="width: 33rem;">
            </div>
        </div>

        <div class="col-md-6 split-right">
            <div class="card login-card shadow">
                <div class="card-body">
                    <p class="card-title text-left mb-1 titulo-texto">Empecemos</p>
                    <p class="mb-4 normal-texto">Inicia sesión en tu cuenta</p>
                    <form id="loginForm">
                        {{-- {{ csrf_field() }} --}}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-envelope"></i> </span>
                                </div>
                                <input type="email" class="form-control inputLogin emailLogin campoRounded border border-0" id="email" name="email" placeholder="Email" required>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-lock"></i> </span>
                                </div>
                                <input type="password" class="form-control inputLogin border border-0" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                                    <div class="input-group-append">
                                    <span type="button" class="input-group-text verContraseña"  onclick="const p = document.getElementById('password'); p.type = (p.type === 'password' ? 'text' : 'password');"><i class="fas fa-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <span class="d-flex justify-content-center col-md-12 text-danger text-sm text-bold pb-3" id="errorLogin"></span>
                        <button class="btnLogin campoRounded texto-boton">Continuar</button>
                    </form>

                    <div class="d-flex justify-content-center col-md-12">
                        <div class="mt-2">
                            <span><a class="text-dark normal-texto-light" href="{{ route('recuperarContrasena') }}">¿Olvidaste tu contraseña?</a></span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center col-md-12">
                        <div class="mt-3">
                            <p class="texto-politica"><a href="{{ asset('files/Terminos y Condiciones Lexia.pdf') }}" target="_blank"><b class="textAzul">Término y Condiciones</b></a> y <a href="{{ asset('files/AvisoPrivacidad Lexia.pdf') }}" target="_blank"><b class="textAzul">Política de Privacidad</b></a></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center col-md-12">
                        <div class="mt-5">
                            <p class="texto-politica mb-0 normal-texto-light">¿No tienes cuenta? <a href="{{ route('registro') }}"><b class="textAzul normal-texto">Regístrate</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('Mensajes.carga')
@include('Mensajes.success')
@include('Mensajes.error')
@stop
<script src="{{ asset('dist/jquery/dist/jquery.min.js') }}"></script>

@push('scripts')
<script defer src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.13.0/lottie.min.js" type="text/javascript"></script>
@endpush
