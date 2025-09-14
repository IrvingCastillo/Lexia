@extends('dashboard')
@section('Contenido')
@vite(['resources/css/app.css', 'resources/js/calendario/calendario.js'])
@push('styles')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.css"> --}}
@endpush

<style>
.ui-timepicker-list li {
  text-align: center;
}

/* centrar dropdown completo respecto al input */
.ui-timepicker-wrapper {
  width: 250px;
  font-family: 'Inter';
}

</style>
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

    @include('Mensajes.carga')
    @include('Mensajes.error')
</div>
@include('Calendario.Modals.AgregarEvento')
@include('Calendario.Modals.EditarEvento')

@stop

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.js"></script>
@endpush
