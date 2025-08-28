@extends('dashboard')

<style>
    .ql-toolbar.ql-snow{
        display: none;
    }

     /* #respuestaIA { */
      /* font-family: monospace; */
      /* white-space: pre-wrap; */
      /* border: 1px solid #ccc; */
      /* padding: 10px; */
      /* width: 400px;
      min-height: 100px; */
    /* } */
    .cursor {
      display: inline-block;
      width: 2px;
      background: black;
      margin-left: 2px;
      animation: blink 0.7s steps(2, start) infinite;
    }
    @keyframes blink {
      to { visibility: hidden; }
    }
</style>

@section('Contenido')
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
@endpush
@vite(['resources/css/app.css', 'resources/js/ia/ia.js'])

<div class="container-fluid bg-white my-5 py-5">
    <div class="" id="listadoDocumento">
        {{-- <div class="card w-100 " style="height: 65vh" >
            <div class="d-flex justify-content-end px-3 py-2" style="font-size: 1.2rem">
                <i class="far fa-trash-alt px-3"></i>
                <i class="fas fa-pencil-alt" style="transform: scaleX(-1)"></i>
            </div>
            <div class="pt-3 pl-3">
                <h3>Documento</h3>
                <div class="file-item">
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
        </div> --}}

        <div class="card mt-5">
            <div class="card-body">
                <div>
                    <h3>¿Qué puedes hacer con LEX-IA?</h3>
                    <form class="dropzone" id="my-dropzone" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="question" id="question-hidden">
                    </form>

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
                            <button id="startIA" type="button" class="bg-blue px-4 py-1" style="border-radius: 5px; 5px; width: 10rem">Empezar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cardHide" id="divEditor">
        <div class="">
            <h2 class="textAzul font-size15 mb-0" style="font-family: 'Times New Roman'">Editor de documento</h2>
            <div class="card w-full" style="height: 45vh">
                <div id="editor" class="p-3">
                    {{-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, earum doloremque libero reiciendis voluptas asperiores cumque repellendus, quos ex, illo maiores eaque officia sequi est dicta fugit molestiae! Qui, aperiam!
                    <p>Propuesta de Proyecto Digital</p><br>
                    <p>Fecha: 24 de Octubre, 2023</p>
                    <p>Para: Cliente Potencial</p>
                    <p>De: Soluciones Creativas S.A.</p> --}}
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <div class="text-left mt-4">
                <button id="startIA" type="button" class="bg-blue px-4 py-1" style="border-radius: 5px; 5px; width: 10rem">Descargar</button>
            </div>
        </div>
    </div>


</div>

@php
    $d = new DateTime();
    $s = $d->format("v");
@endphp

@push('scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
@endpush
@stop
