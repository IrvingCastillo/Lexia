@extends('layouts.app')

@section('contenido')
@vite(['resources/login_f/login.css', 'resources/js/recuperarContrasena/recuperarContrasena.js'])
    <div>
        <div class="navLogin">
        <x-nav-guess color="blue"></x-nav-guess>
    </div>

    <div class="container-fluid bg-white">
        <div class="container py-5 divContrasena d-grid justify-content-center align-items-center">
            {{-- <div class="vh-100 d-flex justify-content-center align-items-center"> --}}
            <div>
                <div class="card shadow campoRounded" >
                    <div class="card-body">
                        <div class="p-2">
                            <h2>Recuperar contraseña</h2>
                            <span>Escribe el correo con el que te registraste y te enviaremos un enlace para reestablecerla</span>
                        </div>
                        <form id="RecuperarContrasenaForm" method="POST" accept-charset="utf-8">
                            {{ csrf_field() }}
                            <div class="mt-4">
                                <div class="input-group campoCorreoRecuperar campoRounded">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-envelope"></i> </span>
                                    </div>
                                    <input type="email" class="form-control inputLogin rounded-left" id="email_recuperacion" name="email" placeholder="Email" minlength="8" required>
                                </div>
                                <span class="text-left text-danger text-sm text-bold" id="errorEmailRecuperacion"></span>
                                <button type="submit" id="btnEnviarCorreoRecuperar" class="btnStep campoRounded" disabled>Recuperar contraseña</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center col-md-12">
                            <div class="mt-3">
                                <p class="texto-politica"><a href=""><b class="textAzul">Término y Condiciones</b></a> y <a href=""><b class="textAzul">Política de Privacidad</b></a></p>
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
