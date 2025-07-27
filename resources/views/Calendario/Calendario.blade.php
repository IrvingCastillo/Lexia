@extends('dashboard')
{{-- @section('Contenedor','main-container') --}}
@section('Contenido')

<div>
    {{-- @include('Includes.HeadModule',['DireccionArea' => 'AGENDA']) --}}

    <div class="container-fluid">

        {{-- @include('Directivos.Agenda.Menu') --}}

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active"
                    data-toggle="tab"
                    href="#Calendario"
                    role="tab"
                    aria-controls="nav-calendario"
                    aria-selected="true">
                        Calendario
                </a>
                <a class="nav-item nav-link"
                    data-toggle="tab"
                    href="#Resgistradas"
                    role="tab"
                    aria-controls="nav-home"
                    aria-selected="true">
                        Lista de Eventos
                        <span class="badge badge-secondary" id="Registrados" v-html="Registrados"> 0 </span>
                </a>
            </div>
        </nav>

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

            <div class="tab-pane fade" id="Resgistradas" role="tabpanel" aria-labelledby="nav-home-tab">
                <br>
                <div class="row">
                    <div class="col-md-12 col-xl-12 col-sm-12 ">
                        <div class="table-responsive-xl">
                            <table class="table table-sm table-striped font-size-table" id="tblAgenda" style="width: 100%;">
                                <thead class="thead-p1">
                                    <tr>
                                        <th class="TH1">OPCIONES</th>
                                        {{-- <th class="TH1">DE</th> --}}
                                        <th class="TH1">TITULO</th>
                                        <th class="TH1">HORA DE INICIO</th>
                                        <th class="TH1">HORA DE FINALIZACIÓN</th>
                                        <th class="TH1">UBICACIÓN</th>
                                        <th class="TH1">DESCRIPCIÓN</th>
                                        <th class="TH1">ESTADO</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <br><br>
</div>

@php
    $d = new DateTime();
    $s = $d->format("v");
@endphp

@push('scripts')
    <script src="{{asset('js/Calendario/Calendario.js?q=')}}{{ $s }}"></script>
@endpush

@stop
