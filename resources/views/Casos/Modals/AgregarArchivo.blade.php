<div class="modal fade" id="modalArchivoCaso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 25px 25px 25px 25px !important;">
            <div class="modal-header pb-0">
                <h1 class="modal-title" id="exampleModalLabel">Agregar Archivo</h1>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body pl-3 pr-3">
                <div class="modal-body pl-3 pr-3">
                    <form id="AltaArchivoCaso">
                        <div class="d-flex justify-content-center">
                            <label for="archivo_caso" class="boton_pdf m-0 col-10 btn "  data-toggle="tooltip" data-placement="bottom" title="Subir archivo"><i class="fas fa-upload"></i></label>
                            <input class="archivo input-form" id="archivo_caso"  name="documents[]" style="display:none;" type="file" accept=".pdf,.docx"> {{-- solicitud --}}
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <div class="alert alert-warning alert-dismissible fade show col-md-8 showFile text-center" role="alert" style="display: none">
                                <strong id="fileName"></strong>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-end">
                            <div class="mt-3">
                                <button id="agregarArchivo" type="button" class="bg-blue px-4 py-2 campoRoundedX" style="width: 15rem">Subir Archivo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
