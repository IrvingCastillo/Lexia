@extends('dashboard')
{{-- @section('Contenedor','main-container') --}}
@section('Contenido')
@php
    $user = Auth::user()->getAttributes()[0];
    // dd($user);
@endphp
@vite(['resources/css/app.css'])

<div class="container-fluid bg-white my-5 py-5 ">
    <div class="px-4">
        <div class="textAzul font-size15 titulo-texto" style="margin-top: 8rem"> <i class="far fa-user mr-2"></i>Información de la cuenta</div><hr>
        <div>
            <p class="textAzul font-size1 mb-0 normal-texto">Despacho asociado</p>
            <small class="text-muted normal-texto-light">{{ $user["lawfirm"]["nombre_despacho"] }} </small>
        </div><hr>
        <div>
            <p class="textAzul font-size1 mb-0 normal-texto">Nombre</p>
            <small class="text-muted normal-texto-light">{{ $user["nombre_cliente"] }}</small>
        </div><hr>
        <div>
            <p class="textAzul font-size1 mb-0 normal-texto">RFC asociado</p>
            <small class="text-muted normal-texto-light">{{ isset($user["rfc"]) ? $user["rfc"] : 'Sin registrar' }}</small>
        </div><hr>
        <div>
            <p class="textAzul font-size1 mb-0 normal-texto">Eliminar cuenta</p>
            <small class="text-danger normal-texto-light">Se eliminará tus usuarios y registros</small>
        </div><hr>
    </div>
</div>
@stop
