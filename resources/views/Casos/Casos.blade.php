@extends('dashboard')
@section('Contenido')

@vite(['resources/css/app.css', 'resources/js/casos/casos.js'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('dist/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
@endpush

<style>
     .boton_pdf{
        background-color: #132c47;
        color: #c1bdbf;
    }
    .boton_pdf:hover{
        background-color: #132c47;
        color: white;
    }

</style>


<div class="container-fluid bg-white my-5 py-5">
    <input type="text"  id="id_case" hidden>

    <span id="showListaCasos" type="button" class="btn btn-sm py-1 px-3" style="background: #f5f5f5; border-radius: 5px; display:none;"><i class="fa fa-arrow-left"> Regresar</i></span>

    <div id="listaCasos">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="input-group mb-3" id="barraBusqueda" style="display: none">
                    <div class="input-group-prepend">
                        <span class="input-group-text icon leftRounded" > <i class="fas fa-search"></i> </span>
                    </div>
                    <input type="text" class="form-control inputBarSearch" placeholder="Search">
                </div>
            </div>
            <div class="col-12 col-md-12 px-4 casoDatos DatosHoras">
                <div class="d-flex justify-content-between d-flex align-items-end">
                    <div>
                        <div style="font-size: 2rem">CASO <span id="span-titulo"></span></div>
                    </div>
                    <div hidden>
                        <i class="fa fa-regular fa-clock font-size15"></i> <span id="reloj" class="font-weight-bold font-size15"></span> <small class="font-size1">Horas trabajadas</small>
                    </div>
                </div>
            </div>
        </div><hr id="separadorHr" style="">
        <div class="d-flex col-md-12 px-0">
            <div class="col-md-8">
                <div class="btn-group">
                    <button type="button" class="btn pl-4 pr-4 dropdown-toggle campoRounded bg-claro" data-toggle="dropdown" aria-expanded="false">
                        Recorded by me
                    </button>
                    {{-- <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div> --}}
                </div>

            </div>
            <span class="col-md-1 d-flex justify-content-end pr-0 ArchivosCasos" >
                <span class="fa-stack fa-lg">
                    <i class="btn btn-sm " data-toggle="modal" data-target="#modalArchivoCaso" style="display: none" id="btnArchivos"><img src="{{ asset('dist/fontawesome-6/svgs/brands/add.svg') }}" style="width: 1.5rem"></i>
                </span>
            </span>
            <span class="col-md-3 d-flex justify-content-end mr-1">
                <span class="fa-stack fa-lg" id="btnEditCaso" style="display: none">
                    <i class="btn btn-sm " data-toggle="modal" data-target="#modalEditarCaso"><img src="{{ asset('dist/fontawesome-6/svgs/solid/user-gear.svg') }}" style="width: 1.5rem"></i>
                </span>
                <span class="fa-stack fa-lg" id="btnAltaCaso">
                    <i class="btn btn-sm " data-toggle="modal" data-target="#modalNuevoCaso"><img src="{{ asset('dist/fontawesome-6/svgs/brands/add.svg') }}" style="width: 1.5rem"></i>
                </span>
            </span>
        </div>
        <div class="my-4 DatosSup" id="DatosSup">

            <div id="listadoCasos">

                <template id="card-template">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                        <button type="button" class="btn btn-sm text-muted position-absolute eliminarCaso" style="top: 1rem; right: 1rem;">
                            <i class="fas fa-trash" data-toggle="modal" data-target="#modalEliminar"></i>
                        </button>
                        <div>
                            <h6 class="font-weight-bold mb-1 titulo-caso"></h6>
                            <p class="mb-1">Caso: <span class="text-dark descripcion-caso"></span></p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <small class="text-muted mt-5">Estado Actual: <strong class="text-dark estado-caso"></strong></small>
                            <div class="text-right mt-4">
                                <button type="button" class="bg-blue px-4 py-2 gestionarCaso">Gestionar Caso</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </template>

                <div id="contenedor-casos"></div>
            </div>

        </div>

        <div class="my-4 mx-2 col-md-9 DatosInf cardHide shadow-sm " id="DatosInf" style="height: 46vh; overflow-y: scroll;  scrollbar-color: #132c47 transparent; scrollbar-width: thin;">
            <div id="listadoArchivos">
                <template id="file-template">
                    <div class="card mb-3 border-0">
                        <div class="card-body border-bottom">
                            <a href="#" class="text-muted position-absolute borrar-archivo">
                                <i class="fa fa-trash"></i>
                            </a>
                            <div class="file-item">
                                <i class="far fa-file-alt file-icon"></i>
                                <div class="file-info">
                                    <div class="file-title">
                                        <a href="#" class="nombre-archivo" data-toggle="modal" data-target="#modalMostrarArchivo" style="color: #132c47"></a>
                                    </div>
                                    <div class="file-time">
                                        <span class="tipo-archivo"></span> <span class="fecha-archivo"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <div id="contenedor-archivos"></div>

                 <div id="mensaje-vacio" class="text-center text-muted py-4" style="display: none;">
                    <i class="far fa-folder-open fa-2x d-block mb-2"></i>
                    No hay archivos para mostrar
                </div>
            </div>
        </div>
    </div>
{{--  --}}




    <div class="chatbox-fixed" id="time-line" >
        <div class="card cardChat" style="border-radius: 25px;">
            <div class="d-flex justify-content-between align-items-center p-3">
                <strong>Timeline</strong>
                <div class="dropdown d-inline-block ml-2">
                    <button class="btn btn-sm btn-link text-secondary p-0" id="menu-options-notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon"><img src="{{ asset('dist/fontawesome-6/svgs/brands/cog.svg') }}" alt="" style="width: 1.3rem; font-weight: bold;"></i>
                    </button>
                    <div class="dropdown-menu dropdown-main dropdown-menu-right font-size-sm" aria-labelledby="menu-options-notifications" >
                        <div class="pt-0 pb-0">
                            <div class="pl-2" href="">
                                <h5 class="textAzul mb-0 p-1">
                                    <i class="icon"><img src="{{ asset('dist/fontawesome-6/svgs/brands/cog.svg') }}" alt="" style="width: 1.3rem; font-weight: bold;"></i>
                                    Opciones de notificación
                                </h5>


                                <!-- Template para los toggles -->
                                <template id="toggles-template">
                                    <div class="card p-2 m-2">

                                        <!-- Notificar por correo electrónico -->
                                        <div class="d-flex justify-content-between">
                                            <div class="file-item">
                                                <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                                    <i class="far fa-envelope file-icon"></i>
                                                </div>
                                                <div class="file-info">
                                                    <div class="file-title">Notificar por correo electrónico</div>
                                                    <div class="file-time"><small>Enviar un correo electrónico con el estado actual del caso</small></div>
                                                </div>
                                            </div>
                                        <div class="custom-control custom-switch ml-1">
                                            <input type="checkbox" class="custom-control-input" id="config_notify_email" name="config_notify_email">
                                            <label class="custom-control-label" for="config_notify_email"></label>
                                        </div>
                                        </div>

                                        <!-- Notificar al cliente -->
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="file-item">
                                                <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                                    <i class="fa fa-bars file-icon"></i>
                                                </div>
                                                <div class="file-info">
                                                    <div class="file-title">Notificar al cliente</div>
                                                    <div class="file-time"><span>Se actualizarán los documentos y estado para el cliente</span></div>
                                                </div>
                                            </div>
                                            <div class="custom-control custom-switch ml-1">
                                                <input type="checkbox" class="custom-control-input" id="config_notify_client" name="config_notify_client">
                                                <label class="custom-control-label" for="config_notify_client"></label>
                                            </div>
                                        </div>

                                        <!-- Notificar a otros abogados -->
                                        <div class="d-flex justify-content-between pt-2">
                                            <div class="file-item">
                                                <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                                    <i class="far fa-user file-icon"></i>
                                                </div>
                                                <div class="file-info">
                                                    <div class="file-title">Notificar a los otros abogados</div>
                                                    <div class="file-time"><span>Actualizar el estado directamente en el portal de los otros abogados</span></div>
                                                </div>
                                            </div>
                                            <div class="custom-control custom-switch ml-1">
                                                <input type="checkbox" class="custom-control-input" id="config_notify_attorneys" name="config_notify_attorneys">
                                                <label class="custom-control-label" for="config_notify_attorneys"></label>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- Contenedor donde se insertará -->
                                <div id="contenedor-toggles"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="border-bottom"></span>
            <div id="messages-full-container">
                <div class="messages-container">
                    <div class="py-4">
                        <div id="timeline-container"></div>
                        <template id="timeline-template">
                            <ul class="time-line">
                                <li class="time-line-item" data-status="inicio_caso">
                                    <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                        <i class="fa fa-gavel text-white" style="transform: scaleX(-1);"></i>
                                    </div>
                                    <div class="content-time-line">Inicio de caso</div>
                                    <small class="fecha"></small>
                                </li>
                                <li class="time-line-item" data-status="revision_documentos">
                                    <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <div class="content-time-line">Revisión de documentos</div>
                                    <small class="fecha"></small>
                                </li>
                                    <li class="time-line-item" data-status="proceso">
                                    <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                        <i class="fas fa-circle-notch"></i>
                                    </div>
                                    <div class="content-time-line">Proceso</div>
                                    <small class="fecha"></small>
                                </li>
                                <li class="time-line-item" data-status="sentencia">
                                    <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                        <i class="fas fa-check-double"></i>
                                    </div>
                                    <div class="content-time-line">Sentencia</div>
                                    <small class="fecha"></small>
                                </li>
                            </ul>
                        </template>



                        {{-- <ul class="time-line">
                            <li class="time-line-item status-completed ">
                                <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                    <i class="fa fa-gavel text-white" style="transform: scaleX(-1);"></i>
                                </div>
                                <div class="content-time-line">Inicio de caso</div>
                                <small>12 de marzo</small>
                            </li>
                            <li class="time-line-item status-pending">
                                <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="content-time-line active">Revisión de documentos</div>
                                <small>25 de marzo</small>
                            </li>
                            <li class="time-line-item status-pending">
                                <div class="icon-pending d-flex justify-content-center align-items-center rounded-circle">
                                    <i class="fas fa-circle-notch"></i>
                                </div>
                                <div class="content-time-line">Proceso</div>
                            </li>
                            <li class="time-line-item status-pending">
                                <div class="icon-pending d-flex justify-content-center align-items-center rounded-circle">
                                    <i class="fas fa-check-double"></i>
                                </div>
                                <div class="content-time-line">Sentencia</div>
                            </li>
                        </ul> --}}
                    </div>
                </div>
                <div class="text-center bg-white" style="padding: 0.5rem 1rem;">
                    <button class="btn btn-sm px-5 py-2 campoRoundedX bg-blue" id="edit-status">Editar Status</button>
                </div>
            </div>
        </div>
    </div>


{{--  --}}
@include('Mensajes.carga')
@include('Mensajes.success')
@include('Mensajes.error')

</div>

@include('Casos.Modals.AgregarCaso')
@include('Casos.Modals.EditarCaso')
@include('Casos.Modals.Eliminar')
@include('Casos.Modals.AgregarArchivo')
@include('Casos.Modals.MostrarArchivo')
@stop

@push('scripts')
    <script src="{{ asset('dist/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
@endpush
