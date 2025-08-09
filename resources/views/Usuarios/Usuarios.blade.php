@extends('dashboard')
{{-- @section('Contenedor','main-container') --}}
@section('Contenido')
@include('Includes.HeadModule',['DireccionArea' => 'USUARIOS'])

<div>
    <div class="container-fluid bg-white my-5 py-5">
        <div class="d-flex justify-content-between align-items-end">
            <span class="textAzul" style="font-size: 2.5rem">Usuarios</span>
            <span data-toggle="modal" data-target="#modalNuevoUsuario" type="button" class="btn btn-sm bg-blue" style="height: 2rem;"><i class="fa fa-circle-plus fa-1x"></i> Agregar Usuario</span>
        </div><hr style="margin-top: .5rem">
    </div>
</div>

@include('Usuarios.Modals.AltaUsuario')
@php
    $d = new DateTime();
    $s = $d->format("v");
@endphp

@push('scripts')
    {{-- <script src="{{asset('js/Calendario/Calendario.js?q=')}}{{ $s }}"></script> --}}
@endpush

@stop
