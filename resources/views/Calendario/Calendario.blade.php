@extends('dashboard')
@section('Contenido')
@vite(['resources/css/app.css', 'resources/js/calendario/calendario.js'])


<div>
    <div class="container-fluid bg-white my-5 py-5">
        {{-- <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" data-toggle="tab" href="#Calendario" role="tab" aria-controls="nav-calendario" aria-selected="true">
                        Calendario
                </a>
                {{-- <a class="nav-item nav-link" data-toggle="tab" href="#Resgistradas" role="tab" aria-controls="nav-home" aria-selected="true">
                        Lista de Eventos
                        <span class="badge badge-secondary" id="Registrados"> 0 </span>
                </a> --}
            </div>
        </nav> --}}

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="Calendario" role="tabpanel" aria-labelledby="nav-calendario-tab">
                <br>
                <div class="row">
                    <div class="col-md-12 col-xl-12 col-sm-12 ">
                        <div id='calendar-container'>
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@include('Calendario.Modals.AgregarEvento')
@include('Mensajes.carga')
@include('Mensajes.error')

@stop
