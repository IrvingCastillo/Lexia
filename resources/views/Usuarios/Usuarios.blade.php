@extends('dashboard')
@section('Contenido')

<style>


</style>
@vite(['resources/css/app.css', 'resources/js/usuarios/usuarios.js'])

<div>
    <div class="container-fluid bg-white my-5 py-5">
        <input type="text" id="id_user" hidden>
        <div class="d-flex justify-content-between align-items-end">
            <span class="textAzul titulo-texto">Usuarios</span>
            <span data-toggle="modal" data-target="#modalNuevoUsuario" type="button" class="btn btn-sm bg-blue py-1 px-3 align-content-center texto-boton" style="height: 2.2rem;"><i class="fa fa-circle-plus fa-1x pr-1"></i> Agregar Usuario</span>        </div><hr style="margin-top: .5rem">


        <div id="listadoUsuarios">
            <template id="usuario-template">
                <div class="card shadow-sm p-3 mb-3 mx-2" style="max-width: 400px;">
                    <div class="row g-0 align-items-center">
                        <!-- Avatar + Nombre -->
                        <div class="col-2">
                            <img class="rounded-circle avatar-usuario" width="48" height="48" alt="Avatar">
                        </div>
                        <div class="col-6">
                            <h6 class="mb-0 fw-bold nombre-usuario normal-texto"></h6>
                            <small class="text-muted rol-usuario normal-texto"></small>
                        </div>
                        <!-- Botón Editar -->
                        <div class="col-auto">
                            <button class="btn btn-dark btn-sm campoRoundedX btn-editar texto-boton" style="width: 6rem">Editar</button>
                        </div>
                    </div>

                    <!-- Línea inferior -->
                    <div class="row mt-3 align-items-center">
                        <div class="col-4">
                            <i class="fa fa-clock me-1"></i>
                            <span class="small telefono-usuario normal-texto-light"></span>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-calendar me-1"></i>
                            <span class="small fecha-usuario normal-texto-light"></span>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-light btn-sm text-muted btn-remover texto-boton" style="width: 6rem">Remover</button>
                        </div>
                    </div>
                </div>
            </template>

            <div class="col-md-12">
                <div id="contenedor-usuarios" class="row "></div>
            </div>

             <div id="mensaje-vacio" class="text-center text-muted mt-5" style="display: none;">
                <div>
                    <i class="fa fa-users fa-2x mb-2"></i>
                    <p>No hay usuarios disponibles</p>
                </div>
            </div>
        </div>

    </div>
</div>

@include('Usuarios.Modals.AltaUsuario')
@include('Usuarios.Modals.EditarUsuario')

@include('Mensajes.success')
@include('Mensajes.carga')
@include('Mensajes.error')

@stop
