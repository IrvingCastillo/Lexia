@extends('dashboard')
@section('Contenido')

<style>
    #contenedor-usuarios .card {
  flex: 1 1 300px; /* ancho mínimo 300px, crece según espacio */
  max-width: 350px;
}

</style>
@vite(['resources/css/app.css', 'resources/js/usuarios/usuarios.js'])

<div>
    <div class="container-fluid bg-white my-5 py-5">
        {{ Auth::user() }}
        <div class="d-flex justify-content-between align-items-end">
            <span class="textAzul" style="font-size: 2.5rem">Usuarios</span>
            <span data-toggle="modal" data-target="#modalNuevoUsuario" type="button" class="btn btn-sm bg-blue py-1 px-3 align-content-center" style="height: 2rem;"><i class="fa fa-circle-plus fa-1x pr-1"></i> Agregar Usuario</span>
        </div><hr style="margin-top: .5rem">


        <div id="listadoUsuarios">
            <template id="usuario-template">
                <div class="card shadow-sm p-3 mb-3 mx-2" style="max-width: 400px;">
                    <div class="row g-0 align-items-center">
                        <!-- Avatar + Nombre -->
                        <div class="col-2">
                            <img class="rounded-circle avatar-usuario" width="48" height="48" alt="Avatar">
                        </div>
                        <div class="col-6">
                            <h6 class="mb-0 fw-bold nombre-usuario"></h6>
                            <small class="text-muted rol-usuario"></small>
                        </div>
                        <!-- Botón Editar -->
                        <div class="col-auto">
                            <button class="btn btn-dark btn-sm campoRoundedX btn-editar" style="width: 6rem">Editar</button>
                        </div>
                    </div>

                    <!-- Línea inferior -->
                    <div class="row mt-3 align-items-center">
                        <div class="col-4">
                            <i class="fa fa-clock me-1"></i>
                            <span class="small telefono-usuario"></span>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-calendar me-1"></i>
                            <span class="small fecha-usuario"></span>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-light btn-sm text-muted btn-remover" style="width: 6rem">Remover</button>
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



        {{-- <div id="listadoUsuarios">
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
        </div> --}}
    </div>
</div>

@include('Usuarios.Modals.AltaUsuario')

@include('Mensajes.success')
@include('Mensajes.carga')
@include('Mensajes.error')

@stop
