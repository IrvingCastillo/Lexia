<div class="modal fade" id="modalNuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 25px 25px 25px 25px !important;">
            <div class="modal-header pb-0">
                <h1 class="modal-title" id="exampleModalLabel">Agregar Usuario</h1>
                <span type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                    <input type="text" class="form-control campoRounded" id="nombre_cliente" name="nombre_cliente" maxlength="30" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Apellido Paterno</label>
                            <div class="form-group col-md-12 pl-0">
                                <div class="input-group">
                                    <input type="text" class="form-control campoRounded" id="apellido_paterno" name="apellido_paterno" maxlength="20" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Apellido Materno</label>
                            <div class="form-group col-md-12 pl-0">
                                <div class="input-group">
                                    <input type="text" class="form-control campoRounded" id="apellido_materno" name="apellido_materno" maxlength="20" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Teléfono</label>
                            <div class="form-group col-md-12 pl-0 d-flex">
                                <select class="form-control campoRounded col-3"  id="area_code" name="lada">
                                    <option value="+52">+ 52</option>
                                    <option value="+1">+ 1</option>
                                </select>
                                <div class="input-group offset-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text group-text-transparent"><i class="fa fa-phone" style="transform: scaleX(-1)"></i></span>
                                    </div>
                                    <input type="text" class="form-control rounded-right-input" id="telefono" name="telefono" pattern="[0-9]+" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Correo electrónico</label>
                            <div class="form-group col-md-12 pl-0">
                                <div class="input-group">
                                    <input type="email" class="form-control campoRounded" id="email" name="email" required>
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
                        <div class="col-12 d-flex justify-content-end align-items-end">
                            <div class="mb-3">
                                <button type="button" class="bg-blue px-4 py-2 campoRoundedX texto-boton" style="width: 15rem" id="addUser">Agregar Usuario</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
