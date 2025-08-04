@extends('dashboard')

@section('Contenido')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@vite(['resources/css/app.css', 'resources/js/ia/ia.js'])

<div class="container-fluid bg-white my-5 py-5">
    <div class="card w-100" style="height: 65vh">
        <div class="d-flex justify-content-end px-3 py-2" style="font-size: 1.2rem">
            <i class="far fa-trash-alt px-3"></i>
            <i class="fas fa-pencil-alt" style="transform: scaleX(-1)"></i>
        </div>
        <div class="pt-3 pl-3">
            <h3>Documento</h3>
            <div class="file-item">
                {{-- <i class="far fa-file-alt"></i>       <!-- Documento -->
                <i class="far fa-lightbulb"></i>      <!-- Bombilla (idea) -->
                <i class="fas fa-chart-line"></i>     <!-- Gráfica de línea -->
                <i class="fas fa-chart-bar active"></i>      <!-- Reporte --> --}}
    {{-- <i class="fas fa-gavel active" ></i>
    <i class="fas fa-head-side-gear"></i>
    <i class="far fa-calendar-check"></i>        <!-- Calendario -->
    <i class="fas fa-cog"></i>                   <!-- Configuración --> --}}
                <i class="far fa-file-alt file-icon"></i>
                <div class="file-info">
                    <div class="file-title">Q2 2024 Financial Report</div>
                    <div class="file-time">2 hours ago</div>
                </div>
            </div>
        </div>
        <div style="position: absolute; top:50%; left:50%; transform:translate(-50%, -50%)">
            <div style="font-size: 4rem; color: #f5f5f5">LEX-IA</div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div>
                <h3>¿Qué puedes hacer con LEX-IA?</h3>
                <form action="/" class="dropzone" id="my-dropzone"></form>

                {{-- <div class="card" style="border-style: dashed; height: 5rem">

                </div> --}}

                <div class="d-flex my-2">
                    <div class="d-flex">
                        <span>¿Extraer información relevante?</span>
                        <div class="custom-control custom-switch ml-1">
                            <input type="checkbox" class="custom-control-input" data-motivo="status"  id="resumen">
                            <label class="custom-control-label" for="resumen"></label>
                        </div>
                    </div>
                    <div class="ml-3 d-flex">
                        <span>¿Resumir documentos?</span>
                        <div class="custom-control custom-switch ml-1">
                            <input type="checkbox" class="custom-control-input" data-motivo="status"  id="resumir">
                            <label class="custom-control-label" for="resumir"></label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-search"></i> </span>
                        </div>
                        <textarea rows="1" class="form-control" id="pregunta" name="pregunta" placeholder="Haz una pregunta"></textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="text-left mt-4">
                        <button type="button" class="bg-blue px-4 py-1" style="border-radius: 5px; 5px; width: 10rem">Empezar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $d = new DateTime();
    $s = $d->format("v");
@endphp

@push('scripts')
@endpush

@stop
