@extends('dashboard')
{{-- @section('Contenedor','main-container') --}}
@section('Contenido')

@vite(['resources/css/app.css'])

<div class="container-fluid bg-white my-5 py-5 ">
    <div class="card shadow-sm" style="position: absolute; top:50%; left:50%; transform:translate(-50%, -50%); width: 40vw">
        <div class="card-body">
            <h2 class="textAzul" style="font-size: 2.5rem">Cambiar contraseña</h2>
            <form action="">
                <div>
                    <label for="">Contraseña anterior</label>
                    <input type="text" class="form-control bg-input campoRoundedX">
                </div>
                <div>
                    <label for="">Nueva contraseña</label>
                    <input type="text" class="form-control bg-input campoRoundedX">
                </div>
                <div>
                    <label for="">Confirma nueva contraseña</label>
                    <input type="text" class="form-control bg-input campoRoundedX">
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button type="button" class="bg-blue px-4 py-1 mt-1 mb-5 campoRoundedX" style="width: 18rem">Guardar Contraseña</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
