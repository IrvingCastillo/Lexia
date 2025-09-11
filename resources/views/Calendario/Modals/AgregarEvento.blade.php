<div class="modal fade" id="modalAgregarEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 25px 25px 25px 25px !important;">
            <div class="modal-header pb-0">
                <h1 class="modal-title" id="exampleModalLabel">Agregar Cita</h1>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body pl-3 pr-3">
                <span class="pl-3 normal-texto" id="texto_evento"></span>
                <div class="modal-body pl-3 pr-3">
                    <form id="AltaCita">
                        <div class="form-row">
                            <div class="form-group mb-0 col-md-6">
                                <label class="normal-texto">Cliente:</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <select class="form-control" name="destinatario" id="destinatario" required>
                                            <option value="" selected disabled>Elige una opción</option>
                                            <option value="25">Victor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 col-md-6">
                                <label class="normal-texto">Asunto:</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control campoRoundedX" name="body" id="body_asunto" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mb-0 col-md-6">
                                <label class="normal-texto">Estatus de la cita:</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <select class="form-control" name="status" id="status_cita" required>
                                            <option value="" selected disabled>Elige una opción</option>
                                            <option value="scheduled">Agendar</option>
                                            <option value="confirmed">Confirmada</option>
                                            <option value="done">Realizada</option>
                                            <option value="cancelled">Cancelada</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 col-md-6">
                                <label class="normal-texto">Notas</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control campoRoundedX" name="notes" id="notes">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mb-0 col-md-6">
                                <label class="normal-texto">Abogado asignado</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <select class="form-control" name="provider_id" id="provider_id" required>
                                            <option value="25">Irving</option>
                                            <option value="26">Angel</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="offset-3 d-flex justify-content-between align-items-end">
                                <div class="mb-3">
                                    <button id="agregarCita" type="button" class="bg-blue px-4 py-2 campoRoundedX texto-boton" style="width: 15rem">Agregar</button>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-row">
                            <div class="form-group mb-0 col-md-5">
                                <p class="textAzul" style="margin-bottom: 0 !important;"><b>Seleccione el abogado asignado</b></p>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <select class="form-control campoRounded" name="attorneys[]" id="attorneys" multiple>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="offset-3 d-flex justify-content-between align-items-end">
                                <div class="mb-3">
                                    <button id="agregarCaso" type="button" class="bg-blue px-4 py-2 campoRoundedX texto-boton" style="width: 15rem">Agregar</button>
                                </div>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
