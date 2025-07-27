@extends('layouts.app')

@section('contenido')
@vite(['resources/login_f/login.css', 'resources/nuevaContrasena/nuevaContrasena.js'])

    <div>
        <div class="navLogin">
        <x-nav-guess color="blue"></x-nav-guess>
    </div>

    <div class="container-fluid bg-white">
        <div class="container py-5 divContrasena d-grid justify-content-center align-items-center">
            {{-- <div class="vh-100 d-flex justify-content-center align-items-center"> --}}
            <div>
                <div class="card shadow campoRounded" style="width: 55vw; height: 55vh">
                    <div class="card-body">
                        <div class="p-2">
                            <h2 class="mb-0">Restaurar contraseña</h2>
                            <span class="text-muted" style="font-size: 15px; color: #5e6674">La contraseña debe contener al menos 8 caracteres e incluir una letra mayúscula, una letra minúscula y un número.</span>
                        </div>
                        <form id="RecuperarContrasenaForm" method="POST"  accept-charset="utf-8">
                            {{ csrf_field() }}
                            <div class="mt-4">
                                <input type="password" class="form-control campoRounded" id="password_new" name="password" placeholder="Ingresa tu nueva contraseña">
                                <input type="password" class="form-control campoRounded mt-2" id="confirm_password" name="confirm_password" placeholder="Confirma tu nueva contraseña">
                                <span class="d-flex justify-content-center col-md-12 text-danger text-sm text-bold pb-3" id="errorRestaurarContra"></span>
                                <button id="btnNuevaContrasena" class="btnStep mt-5 campoRounded" disabled>Guardar nueva contraseña</button>
                            </div>
                        </form>
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
<script src="{{ asset('dist/bootstrap/js/bootstrap.min.js') }}"></script>
{{-- <script src="{{ asset('js/NuevaContrasena/nuevaContrasena.js') }}"></script> --}}
