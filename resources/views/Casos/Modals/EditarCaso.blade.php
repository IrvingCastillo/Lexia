<div class="modal fade" id="modalEditarCaso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 25px 25px 25px 25px !important;">
            <div class="modal-header pb-0">
                <h1 class="modal-title" id="exampleModalLabel">Editar Caso</h1>
                <span type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body pl-3 pr-3">
                <div class="modal-body pl-3 pr-3">
                    <form id="AltaCaso">
                        <div class="form-row">
                            <div class="form-group mb-0 col-md-12">
                                <label>Nombre del caso</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control campoRounded" name="caso_nombre" id="caso_nombre_edit" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mb-0 col-md-12">
                                <label>Nombre del cliente</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control campoRounded" name="client_name" id="client_name_edit" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mb-0 col-md-12">
                                <label>Descripción</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control campoRounded" name="description" id="description_edit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mb-0 col-md-6">
                                <label>Fecha</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="date" class="form-control campoRounded" name="case_date" name="case_date_edit">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 col-md-6">
                                <label>Tipo del caso</label>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control campoRounded" name="case_type" id="case_type_edit" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group mb-0 col-md-5">
                                <p class="textAzul" style="margin-bottom: 0 !important;"><b>Seleccione el abogado asignado</b></p>
                                <div class="form-group col-md-12 pl-0">
                                    <div class="input-group">
                                        <select class="form-control campoRounded" name="attorneys[]" id="attorneys_edit" multiple>
                                            <option value=1>Ulises</option>
                                            <option value=2>Juan</option>
                                            <option value=3>Roberto</option>
                                            <option value=4>Miguel</option>
                                            <option value=5>Julio</option>
                                            <option value=6>Rubén</option>
                                            <option value=7>Ana</option>
                                            <option value=8>Pilar</option>
                                            <option value=9>Carmen</option>
                                            <option value=10>Luisa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group offset-3 d-flex justify-content-between align-items-end">
                                <div class="mb-3">
                                    <button id="editarCaso" type="button" class="bg-blue px-4 py-2 campoRoundedX" data-dismiss="modal" style="width: 15rem">Editar</button>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="config_notify_client" value="false" id="" hidden>
                        <input type="text" name="config_notify_attorneys" value="false" hidden>
                        <input type="text" name="config_notify_email" value="false" hidden>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
