@extends('dashboard')
{{-- @section('Contenedor','main-container') --}}
@section('Contenido')

@vite(['resources/css/app.css', 'resources/js/cambiarContrasena/cambiarContrasena.js'])

<div class="container-fluid bg-white my-5 py-5 ">
    <div class="card shadow-sm" style="position: absolute; top:50%; left:50%; transform:translate(-50%, -50%); width: 40vw">
        <div class="card-body">
            <h2 class="textAzul" style="font-size: 2.5rem">Cambiar contraseña</h2>
            <form action="">
                <div>
                    <label for="">Contraseña anterior</label>
                    <input type="text" class="form-control bg-input campoRoundedX" name="current_password" id="current_password" autocomplete="off">
                </div>
                <div>
                    <label for="">Nueva contraseña</label>
                     <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="form-control bg-input campoRoundedX" name="new_password" id="new_password" autocomplete="off" placeholder="Debe contener al menos 8 caracteres, una letra mayúscula y un número." required>
                            <div class="input-group-append">
                                <span type="button" class="input-group-text" style="border-radius: 5px 5px !important"  onclick="const p = document.getElementById('new_password'); p.type = (p.type === 'password' ? 'text' : 'password');"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="">Confirma nueva contraseña</label>
                    <div class="input-group">
                            {{-- <input type="password" class="form-control bg-input campoRoundedX" name="new_password" id="new_password" required> --}}
                            <input type="password" class="form-control bg-input campoRoundedX" id="new_password_confirm" autocomplete="off">
                            <div class="input-group-append">
                                <span type="button" class="input-group-text" style="border-radius: 5px 5px !important"  onclick="const p = document.getElementById('new_password_confirm'); p.type = (p.type === 'password' ? 'text' : 'password');"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                </div>
                <span class="d-flex justify-content-center col-md-12 text-danger text-sm normal-texto-bold my-3 fw-bold" id="infoContrasena"></span>
                <div class="d-flex justify-content-center mt-4">
                    <button type="button" class="bg-blue px-4 py-1 mt-1 mb-5 campoRoundedX texto-boton" style="width: 18rem; opacity: .2" id="changePass" disabled>Guardar Contraseña</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
