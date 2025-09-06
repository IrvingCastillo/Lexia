<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 25px 25px 25px 25px !important;">
            <div class="modal-header pb-0">
                <h1 class="modal-title" id="exampleModalLabel">Editar Usuario</h1>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body pl-3 pr-3">
                <form id="AltaUsuarios">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Nombre</label>
                            <div class="form-group col-md-12 pl-0">
                                <div class="input-group">
                                    <input type="text" class="form-control campoRounded" id="nombre_cliente_edit" name="nombre_cliente">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Apellido Paterno</label>
                            <div class="form-group col-md-12 pl-0">
                                <div class="input-group">
                                    <input type="text" class="form-control campoRounded" id="apellido_paterno_edit" name="apellido_paterno">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Apellido Materno</label>
                            <div class="form-group col-md-12 pl-0">
                                <div class="input-group">
                                    <input type="text" class="form-control campoRounded" id="apellido_materno_edit" name="apellido_materno">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Teléfono</label>
                            <div class="form-group col-md-12 pl-0 d-flex">
                                <select class="form-control campoRounded col-3"  id="area_code_edit">
                                    <option value="+52">+ 52</option>
                                    <option value="+1">+ 1</option>
                                </select>
                                <div class="input-group offset-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text group-text-transparent"><i class="fa fa-phone" style="transform: scaleX(-1)"></i></span>
                                    </div>
                                    <input type="text" class="form-control rounded-right-input" id="telefono_edit">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Correo electrónico</label>
                            <div class="form-group col-md-12 pl-0">
                                <div class="input-group">
                                    <input type="text" class="form-control campoRounded" id="email_edit" name="email">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        {{-- <div class="form-group col-md-5">
                            <p class="textAzul" style="font-size:1.2rem; margin-bottom: 0 !important;"><b>Permisos</b></p>
                            <small class="text-muted">Selecciona el tipo de permisos que tendrá tu usuario</small>
                            <div class="form-group col-md-12 pl-0">
                                <div class="input-group">
                                    <select class="form-control campoRounded" name="tipo_de_permiso" id="tipo_de_permiso">
                                        <option value="usuario" selected>Usuario</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        <input type="text" value="usuario" name="tipo_de_permiso" hidden>
                        <div class="form-group d-flex justify-content-between align-items-end">
                            <div class="mb-3">
                                <button type="button" class="bg-blue px-4 py-2 campoRoundedX" data-dismiss="modal" style="width: 15rem" id="editUser">Guardar cambios</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
