@extends('dashboard')

<style>
    .ql-toolbar.ql-snow{
        display: none;
    }

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


    /*  */

    #dropZone {
  cursor: pointer;
  transition: background-color 0.3s;
  height: 8rem;
  border: 1px dashed #132c47
}
#dropZone.dragover {
  background-color: transparent;
  border-color: #132c47;
}
.file-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.file-item span {
  font-size: 0.9rem;
}
</style>

@section('Contenido')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
@endpush
@vite(['resources/css/app.css', 'resources/js/ia/ia.js'])

<div class="container-fluid bg-white my-5 py-5">
    <span id="showDropFiles" type="button" class="btn btn-sm py-1 px-3" style="background: #f5f5f5; border-radius: 5px; display:none;"><i class="fa fa-arrow-left"> Regresar</i></span>
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

                    <div id="dropZone" class="rounded p-4 text-center d-flex justify-content-center text-align-center">
                        <p class="mb-0">Arrastra aquí tus archivos PDF/DOCX<br>o haz clic para seleccionarlos</p>
                        <input type="file" id="fileInput" class="d-none" multiple accept=".pdf,.docx">
                    </div>

                    <!-- Vista previa -->
                    <ul id="fileList" class="list-group mt-3"></ul>

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
                            <button id="startIA" type="button" class="bg-blue px-4 py-1" style="border-radius: 5px; 5px; width: 10rem; display:none" >Empezar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cardHide mt-4" id="divEditor">
        <div class="">
            <h2 class="textAzul font-size15 mb-0" style="font-family: 'Times New Roman'">Editor de documento</h2>
            <div class="card w-full" style="height: 55vh; overflow-y: scroll;  scrollbar-color: #132c47 transparent; scrollbar-width: thin;">
                <div id="editor" class="p-3">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <div class="text-left mt-4">
                <button id="downloadPdf" type="button" class="bg-blue px-4 py-1" style="border-radius: 5px; 5px; width: 10rem">Descargar</button>
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
