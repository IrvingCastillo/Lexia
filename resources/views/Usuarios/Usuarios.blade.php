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

        <div>
            <div class="card shadow-sm p-3" style="max-width: 400px;">
                <div class="row g-0 align-items-center">
                    <!-- Avatar + Nombre -->
                    <div class="col-2">
                    <img src="https://media.istockphoto.com/id/1300845620/es/vector/icono-de-usuario-plano-aislado-sobre-fondo-blanco-s%C3%ADmbolo-de-usuario-ilustraci%C3%B3n-vectorial.jpg?s=612x612&w=0&k=20&c=grBa1KTwfoWBOqu1n0ewyRXQnx59bNHtHjvbsFc82gk=" class="rounded-circle" width="48" height="48" alt="Avatar">
                    </div>
                    <div class="col-6">
                    <h6 class="mb-0 fw-bold">Tiya Mcdaniel</h6>
                    <small class="text-muted">Abogado</small>
                    </div>
                    <!-- Botón Editar -->
                    <div class="col-auto">
                    <button class="btn btn-dark btn-sm campoRoundedX" style="width: 6rem">Editar</button>
                    </div>
                </div>

                <!-- Línea inferior -->
                <div class="row mt-3 align-items-center">
                    <div class="col-4">
                    <i class="fa fa-clock me-1"></i>
                    <span class="small">9611233361</span>
                    </div>
                    <div class="col-4">
                    <i class="fa fa-calendar me-1"></i>
                    <span class="small">04/06/2022</span>
                    </div>
                    <div class="col-auto">
                    <button class="btn btn-light btn-sm text-muted" style="width: 6rem">Remover</button>
                    </div>
                </div>
            </div>
        </div>
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
