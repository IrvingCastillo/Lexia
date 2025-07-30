@extends('dashboard')
{{-- @section('Contenedor','main-container') --}}
@section('Contenido')

@vite(['resources/css/app.css', 'resources/casos/casos.js'])


<div class="container-fluid bg-white my-5 py-5">
    <div id="listaCasos" class="">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="input-group mb-3" id="barraBusqueda">
                    <div class="input-group-prepend">
                        <span class="input-group-text icon" style="border-radius: 15px 0 0 15px !important; border-color: transparent"> <i class="fas fa-search"></i> </span>
                    </div>
                    <input class="form-control inputBarSearch" placeholder="Search">
                </div>
            </div>
            <div class="col-12 col-md-12 px-4 casoDatos DatosHoras">
                <div class="d-flex justify-content-between d-flex align-items-end">
                    <div>
                        <div style="font-size: 2rem">CASO A</div>
                    </div>
                    <div>
                        <i class="fa fa-regular fa-clock" style="font-size: 1.5rem"></i> <span id="reloj" style="font-weight: bold; font-size: 1.5rem"></span> <small style="font-size: 1rem">Horas trabajadas</small>
                    </div>
                </div>
            </div>
        </div><hr id="separadorHr" style="">
        <div class="d-flex justify-content-between">
            <div class="btn-group">
                <button type="button" class="btn pl-4 pr-4 dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="background: #f5f5f5; border-radius: 15px 15px">
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
            <span class="btn btn-sm mr-3" data-toggle="modal" data-target="#modalNuevoCaso"><i class="fas fa-plus-circle" style="font-size: 20px"></i></span>
        </div>
        <div class="my-4 DatosSup" id="DatosSup">
              <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <!-- Ícono eliminar en la esquina -->
                    <a href="#" class="text-muted position-absolute" style="top: 1rem; right: 1rem;">
                        <i class="fas fa-trash"></i>
                    </a>

                    <div>
                        <h6 class="font-weight-bold mb-1">Resumen del Caso A</h6>
                        <p class="mb-1">Caso: <span class="text-dark">Demanda por Incumplimiento Contractual</span></p>
                    </div>

                    <div class="d-flex d-flex justify-content-between">
                        <small class="text-muted mt-5">Estado Actual: <strong class="text-dark">En Revisión de Documentos</strong></small>
                        <div class="text-right mt-4">
                            <button type="button" id="gestionarCaso" class="bg-blue px-4 py-2" style="border-radius: 5px; 5px; width: 20rem">Gestionar Caso</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-2  casoDatos DatosInf shadow-sm " id="DatosInf"  style="height: 75vh; border:1px solid #f5f5f5; border-radius: 15px 15px">
            <div class="card mb-3 border-0 ">
                <div class="card-body border-bottom position-relative" style="border: 1px solid transparent;">
                    <a href="#" class="text-muted position-absolute" style="top: .2rem; right: .5rem;">
                        <i class="fa fa-trash-light"></i>
                    </a>
                    <div class="file-item">
                        <i class="far fa-file-alt file-icon"></i>
                        <div class="file-info">
                            <div class="file-title">Alegato Inicial</div>
                            <div class="file-time"><span>Escrito Legal</span> - <span>20 MAR 2024</span></div>
                        </div>
                    </div>

                </div>

                {{--  --}}
                <div class="card-body border-bottom position-relative" style="border: 1px solid transparent;">
                    <a href="#" class="text-muted position-absolute" style="top: .2rem; right: .5rem;">
                        <i class="fa fa-trash"></i>
                    </a>
                    <div class="file-item">
                        <i class="far fa-file-alt file-icon"></i>
                        <div class="file-info">
                            <div class="file-title">Evidencia Fotográfica</div>
                            <div class="file-time"><span>Material Probatorio</span> - <span>18 MAR 2024</span></div>
                        </div>
                    </div>
                </div>

                {{--  --}}

                <div class="card-body border-bottom position-relative" style="border: 1px solid transparent;">
                    <div class="file-item">
                        <i class="far fa-file-alt file-icon"></i>
                        <div class="file-info">
                            <div class="file-title">Correspondencia Abogado-Cliente</div>
                            <div class="file-time"><span>Comunicación</span> - <span>15 MAR 2024</span></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
{{--  --}}




    <div class="chatbox-fixed" style="font-family: 'Montserrat'" id="time-line">
        <div class="card cardChat" style="border-radius: 25px;">
            <div class="d-flex justify-content-between align-items-center p-3">
                <strong>Timeline</strong>
                <div class="dropdown d-inline-block ml-2">
                    <button class="btn btn-sm btn-link text-secondary p-0" id="menu-options-notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                    <div class="dropdown-menu drop-notify font-size-sm" aria-labelledby="menu-options-notifications" style="min-width: 23rem; left: -12rem !important;">
                        <div class="pt-0 pb-0">
                            <div class="pl-2" href="">
                                <h5 class="textAzul mb-0 p-1"><i class="fas fa-cog"></i> Opciones de notificación</h5>
                                <div class="card p-2 m-2">
                                    <div class="d-flex justify-content-between">
                                        <div class="file-item">
                                            <i class="far fa-file-alt file-icon"></i>
                                            <div class="file-info">
                                                <div class="file-title">Notificar por correo electrónico</div>
                                                <div class="file-time"><small>Enviar un correo electrónico con el estado actual del caso</small></div>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-switch ml-1">
                                            <input type="checkbox" class="custom-control-input"  id="notify-email">
                                            <label class="custom-control-label" for="notify-email"></label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="file-item">
                                            <i class="far fa-file-alt file-icon"></i>
                                            <div class="file-info">
                                                <div class="file-title">Notificar al cliente</div>
                                                <div class="file-time"><span>Se actualizaran los documentos y estado para el cliente</span></div>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-switch ml-1">
                                            <input type="checkbox" class="custom-control-input"  id="notify-client">
                                            <label class="custom-control-label" for="notify-client"></label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between pt-2">
                                        <div class="file-item">
                                            <i class="far fa-file-alt file-icon"></i>
                                            <div class="file-info">
                                                <div class="file-title">Notificar a los otros abogados</div>
                                                <div class="file-time"><span>Actualizar el estado directamente en el portal de los otros abogados</span></div>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-switch ml-1">
                                            <input type="checkbox" class="custom-control-input"  id="notify-lawyers">
                                            <label class="custom-control-label" for="notify-lawyers"></label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="border-bottom"></span>
            <div class="messages-container">

                <div class="py-4">
                    <ul class="time-line">
                    <li class="time-line-item status-completed">
                        <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div class="content-time-line">
                            <div>Inicio de caso</div>
                            <small>12 de marzo</small>
                        </div>
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
                            <i class="fas fa-download"></i>
                        </div>
                        <div class="content-time-line">Proceso</div>
                    </li>
                    <li class="time-line-item status-pending">
                        <div class="icon-pending d-flex justify-content-center align-items-center rounded-circle">
                            <i class="fas fa-check-double"></i>
                        </div>
                        <div class="content-time-line">Sentencia</div>
                    </li>
                    </ul>




                </div>

            <!-- Evento normal -->
                {{-- <div class="timeline-event">
                    <div class="event-badge bg-primary text-white"><i class="fas fa-circle"></i></div>
                    <div class="event-content">
                    <div class="title">Inicio de caso</div>
                    <div class="date text-muted">12 MARZO</div>
                    </div>
                </div> --}}
                <!-- Evento con collapse -->
                {{-- <div class="timeline-event">
                    <div class="event-badge bg-primary text-white"><i class="fas fa-file-alt"></i></div>
                    <div class="event-content">
                    <a data-toggle="collapse" href="#details-docs" aria-expanded="false" aria-controls="details-docs" class="stretched-link">
                        <div class="title">Revisión de documentos</div>
                        <div class="date text-muted">25 MARZO</div>
                    </a>
                    <div id="details-docs" class="collapse">
                        <div class="detail-body mt-2">
                        <!-- Aquí va el contenido adicional -->
                        <p class="mb-1">Detalles del documento revisado...</p>
                        </div>
                    </div>
                    </div>
                </div> --}}
                <!-- Otros eventos -->
                {{-- <div class="timeline-event">
                    <div class="event-badge bg-secondary text-white"><i class="fas fa-tasks"></i></div>
                        <div class="event-content">
                            <div class="title">Proceso</div>
                    </div>
                </div>
                <div class="timeline-event">
                    <div class="event-badge bg-secondary text-white"><i class="fas fa-check"></i></div>
                    <div class="event-content">
                    <div class="title">Sentencia</div>
                    </div>
                </div> --}}
            </div>
            <div class="text-center bg-white" style="padding: 0.5rem 1rem;">
            <button class="btn btn-sm px-5 py-2" style="background: #132c47; border-radius: 5px 5px; color:whitesmoke">Editar Status</button>
            </div>
        </div>
    </div>


{{--  --}}

</div>

@include('Casos.Modals.AgregarCaso')
@stop
