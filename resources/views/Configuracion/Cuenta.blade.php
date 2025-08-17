@extends('dashboard')
{{-- @section('Contenedor','main-container') --}}
@section('Contenido')

@vite(['resources/css/app.css'])

<div class="container-fluid bg-white my-5 py-5 ">
    <div class="px-4">
        <div class="textAzul font-size15 text-bold" style="margin-top: 8rem"> <i class="far fa-user mr-2"></i>Información de la cuenta</div><hr>
        <div>
            <p class="textAzul font-size1 mb-0">Despacho asociado</p>
            <small class="text-muted">{{ Auth::user()->lawfirm["nombre_despacho"] }} </small>
        </div><hr>
        <div>
            <p class="textAzul font-size1 mb-0">Nombre</p>
            <small class="text-muted">{{ Auth::user()->nombre_cliente }}</small>
        </div><hr>
        <div>
            <p class="textAzul font-size1 mb-0">RFC asociado</p>
            <small class="text-muted">{{ (Auth::user()->rfc) ? Auth::user()->rfc : 'Sin registrar' }}</small>
        </div><hr>
        <div>
            <p class="textAzul font-size1 mb-0">Eliminar cuenta</p>
            <small class="text-muted">Se eliminará tus usuarios y registros</small>
        </div><hr>
    </div>
</div>
@stop
