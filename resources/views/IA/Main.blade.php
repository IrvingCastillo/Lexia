@extends('dashboard')

<style>

</style>

@section('Contenido')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
@endpush
@vite(['resources/css/app.css', 'resources/js/ia/ia.js'])

<div class="container-fluid bg-white my-5 py-5">
    <span id="showDropFiles" type="button" class="btn btn-sm py-1 px-3 texto-boton" style="background: #f5f5f5; border-radius: 5px; display:none;"><i class="fa fa-arrow-left"> Regresar</i></span>
    <div class="" id="listadoDocumento">
        <div class="card mt-5">
            <div class="card-body">
                <div>
                    <h3 class="titulo-texto textAzul">¿Qué puedes hacer con LEX-IA?</h3>

                    <div id="dropZone" class="rounded p-4 text-center d-flex justify-content-center text-align-center">
                        <p class="mb-0 normal-texto">Arrastra aquí tus archivos PDF/DOCX<br>o haz clic para seleccionarlos</p>
                        <input type="file" id="fileInput" class="d-none" multiple accept=".pdf,.docx">
                    </div>

                    <!-- Vista previa -->
                    <ul id="fileList" class="list-group mt-3"></ul>

                    {{-- <div class="card" style="border-style: dashed; height: 5rem">

                    </div> --}}

                    <div class="d-flex my-2">
                        <div class="d-flex">
                            <span class="normal-texto">¿Extraer información relevante?</span>
                            <div class="custom-control custom-switch ml-1">
                                <input type="checkbox" class="custom-control-input" data-motivo="status"  id="resumen">
                                <label class="custom-control-label" for="resumen"></label>
                            </div>
                        </div>
                        <div class="ml-3 d-flex">
                            <span class="normal-texto">¿Resumir documentos?</span>
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
                            <button id="startIA" type="button" class="bg-blue px-4 py-1 texto-boton" style="border-radius: 5px; 5px; width: 10rem; display:none" >Empezar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cardHide mt-4" id="divEditor">
        <div class="">
            <h2 class="textAzul font-size15 mb-0 titulo-texto">Editor de documento</h2>
            <div class="card w-full" style="height: 55vh; overflow-y: scroll;  scrollbar-color: #132c47 transparent; scrollbar-width: thin;">
                <div id="editor" class="p-3">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <div class="text-left mt-4">
                <button id="downloadPdf" type="button" class="bg-blue px-4 py-1 campoRoundedX texto-boton" style=" width: 10rem; display: none">Descargar</button>
            </div>
        </div>
    </div>


</div>

@include('Mensajes.success')
@include('Mensajes.carga')
@include('Mensajes.error')
@include('Mensajes.Archivos')

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/3.0.2/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
@endpush
@stop
