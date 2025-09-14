<div class="modal fade" id="modalEditarEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 25px 25px 25px 25px !important;">
            <div class="modal-header pb-0">
                <h1 class="modal-title" id="exampleModalLabel">Editar Cita</h1>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body pl-3 pr-3">
                <span class="pl-3 normal-texto" id="fecha_evento_edit"></span>
                <input type="text" id="id_appointment_edit" hidden>
                {{-- <i type="button" class="d-flex justify-content-end fas fa-trash trash-icon btn-delete" data-toggle="modal" data-target="#modalEliminar"></i> --}}
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-sm text-muted btn-delete" data-toggle="tooltip" title="Eliminar Cita">
                        <i class="fas fa-trash trash-icon" id="btnEliminar"></i>
                    </button>
                </div>
                <div class="modal-body pl-3 pr-3">
                    <form id="AltaCita">
                        <div class="form-row">
                            <div class="form-group mb-0 col-md-6">
                                <label class="normal-texto">Título:</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control campoRoundedX" name="body" id="body_asunto_edit" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 col-md-6">
                                <label class="normal-texto">Descripción:</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control campoRoundedX" name="notes" id="notes_edit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mb-0 col-md-6">
                                <label class="normal-texto">Fecha:</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="date" id="date_edit">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 col-md-3">
                                <label class="normal-texto">Hora inicio:</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control start_hour_edit" name="start_hour" id="startHour_edit">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 col-md-3">
                                <label class="normal-texto">Hora fin:</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control end_hour_edit" name="end_hour" id="endHour_edit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" hidden>
                            <div class="form-group mb-0 col-md-6">
                                <label class="normal-texto">Destinatario:</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control campoRoundedX" name="destinatario" id="destinatario_edit" value="5">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-12 d-flex justify-content-end align-items-end">
                                <div class="mb-3">
                                    <button id="editarCita" type="button" class="bg-blue px-4 py-2 campoRoundedX texto-boton" style="width: 15rem">Editar cita</button>
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
