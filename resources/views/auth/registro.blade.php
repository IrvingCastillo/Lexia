@extends('layouts.app')

@section('contenido')
@vite(['resources/login_f/login.css', 'resources/js/registro/registro.js'])
<div>
    <div class="navLogin">
        <x-nav-guess color="claro"></x-nav-guess>
    </div>

    <x-contactos-login></x-contactos-login>


    <div class="container-fluid bg-white d-flex justify-content-center">
        <div class="card cardRegistro">
            <div class="card-body">
                <div class="ml-4">
                    <h1>Registro</h1>

                    <span><span id="paginacion">1</span> de 3</span>
                </div>
                <div class="container m-1">
                    <!-- Wizard Navigation -->
                    <ul class="nav nav-pills mb-4" id="pill-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pill-reg1-tab" data-toggle="pill" data-target="#reg1" type="button" role="tab" aria-controls="reg1" aria-selected="true"></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="pill-reg2-tab" data-toggle="pill" data-target="#reg2" type="button" role="tab" aria-controls="reg2" aria-selected="false"></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="pill-reg3-tab" data-toggle="pill" data-target="#reg3" type="button" role="tab" aria-controls="reg3" aria-selected="false"></button>
                        </li>
                    </ul>

                    <!-- Step Content -->
                    <form id="AltaUsuarioForm">
                        {{-- {{ csrf_field() }} --}}
                        <div class="tab-content" id="pill-tabContent">
                            <div class="tab-pane fade show active" id="reg1" role="tabpanel" aria-labelledby="pill-reg1-tab">
                                <div class="d-flex justify-content-between">
                                    <div class="form-group col-5 p-0">
                                        <label for="nombre_cliente">Nombre</label>
                                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" maxlength="50" placeholder="Ingresa tu(s) nombre(s)" oninput="this.value = this.value.replace(/[^a-zA-z]+$/g, '');" required>
                                        <span class="text-left text-danger text-sm text-bold" id="errorNombre"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido_paterno">Apellido Paterno</label>
                                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" maxlength="50" placeholder="Apellido Paterno" oninput="this.value = this.value.replace(/[^a-zA-z]+$/g, '');" required>
                                        <span class="text-left text-danger text-sm text-bold" id="errorApellidoPaterno"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido_materno">Apellido Materno</label>
                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" maxlength="50" placeholder="Apellido Materno" oninput="this.value = this.value.replace(/[^a-zA-z]+$/g, '');" required>
                                        <span class="text-left text-danger text-sm text-bold" id="errorApellidoMaterno"></span>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="despacho">Nombre del despacho</label>
                                    <input type="text" class="form-control" id="nombre_despacho" name="nombre_despacho" maxlength="50" placeholder="Nombre comercial del despacho" oninput="this.value = this.value.replace(/[^a-zA-z0-9]+$/g, '');" required>
                                    <span class="text-left text-danger text-sm text-bold" id="errorNombreDespacho"></span>
                                </div>
                                <div class="form-group">
                                    <label for="razon">Razón Social</label>
                                    <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="Nombre legal o razón social" oninput="this.value = this.value.replace(/[^a-zA-z0-9]+$/g, ' ');">
                                    <span class="text-left text-danger text-sm text-bold" id="errorRazon"></span>
                                </div>
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" class="form-control" id="rfc" name="rfc" placeholder="(opcional)" maxlength="50">
                                    <span class="text-left text-danger text-sm text-bold" id="errorRFC"></span>
                                </div>
                                <button type="button" id="pag_2" class="btnStep mt-3" data-toggle="pill" href="#reg2">Siguiente</button>
                            </div>

                            <div class="tab-pane fade " id="reg2" role="tabpanel" aria-labelledby="pill-reg2-tab">
                                <div class="form-group">
                                    <label for="correo">Correo Electrónico</label>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                    <span class="text-left text-danger text-sm text-bold" id="errorEmail"></span>
                                </div>
                                <div class="form-group">
                                    <label for="correo">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="La contraseña debe contener al menos 8 caracteres, incluir una letra mayúscula y un número." required>
                                    <span class="text-left text-danger text-sm text-bold" id="errorPassword"></span>
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" pattern="[0-9]+" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                    <span class="text-left text-danger text-sm text-bold" id="errorTelefono"></span>
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" oninput="this.value = this.value.replace(/[^a-zA-z0-9]+$/g, ' ');">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>País</label>
                                        <div class="form-group col-md-12 pl-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="México" id="pais" name="pais" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 offset-1">
                                        <label>Estado</label>
                                        <div class="form-group col-md-12 pl-0">
                                            <div class="">
                                                <select class="custom-select" id="estado" name="estado">
                                                    <option value="" selected disabled>Seleccione un estado</option>
                                                    <option value="Aguascalientes">Aguascalientes</option>
                                                    <option value="Baja California">Baja California</option>
                                                    <option value="Baja California Sur">Baja California Sur</option>
                                                    <option value="Campeche">Campeche</option>
                                                    <option value="Chiapas">Chiapas</option>
                                                    <option value="Chihuahua">Chihuahua</option>
                                                    <option value="Ciudad de México">Ciudad de México</option>
                                                    <option value="Coahuila">Coahuila</option>
                                                    <option value="Colima">Colima</option>
                                                    <option value="Durango">Durango</option>
                                                    <option value="Estado de México">Estado de México</option>
                                                    <option value="Guanajuato">Guanajuato</option>
                                                    <option value="Guerrero">Guerrero</option>
                                                    <option value="Hidalgo">Hidalgo</option>
                                                    <option value="Jalisco">Jalisco</option>
                                                    <option value="Michoacán">Michoacán</option>
                                                    <option value="Morelos">Morelos</option>
                                                    <option value="Nayarit">Nayarit</option>
                                                    <option value="Nuevo León">Nuevo León</option>
                                                    <option value="Oaxaca">Oaxaca</option>
                                                    <option value="Puebla">Puebla</option>
                                                    <option value="Querétaro">Querétaro</option>
                                                    <option value="Quintana Roo">Quintana Roo</option>
                                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                                    <option value="Sinaloa">Sinaloa</option>
                                                    <option value="Sonora">Sonora</option>
                                                    <option value="Tabasco">Tabasco</option>
                                                    <option value="Tamaulipas">Tamaulipas</option>
                                                    <option value="Tlaxcala">Tlaxcala</option>
                                                    <option value="Veracruz">Veracruz</option>
                                                    <option value="Yucatán">Yucatán</option>
                                                    <option value="Zacatecas">Zacatecas</option>
                                                </select>
                                            </div>
                                            <span class="text-left text-danger text-sm text-bold" id="errorEstado"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 offset-1">
                                        <div class="form-group">
                                            <label for="correo">Ciudad</label>
                                            <input type="text" class="form-control" id="ciudad" name="ciudad" maxlength="20"  oninput="this.value = this.value.replace(/[^a-zA-z]+$/g, ' ');">
                                            <span class="text-left text-danger text-sm text-bold" id="errorCiudad"></span>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="pag_3" class="btnStep" data-toggle="pill" href="#reg3">Siguiente</button>
                            </div>

                            <div class="tab-pane fade " id="reg3" role="tabpanel" aria-labelledby="pill-reg3-tab">
                                <div style="height: 45vh">
                                    <div>
                                        <label>Plan seleccionado</label>
                                        <select class="custom-select" id="plan_seleccionado" name="plan_seleccionado">
                                            <option value="1">Personal</option>
                                            <option value="2">Profesional</option>
                                            <option value="3">Corporativo</option>
                                        </select>
                                        <span class="text-left text-danger text-sm text-bold" id="errorPlan"></span>
                                    </div>
                                    <div class="mt-3">
                                        <span>¿No estás seguro de qué plan elegir? Echa un vistazo</span> <span><a id="verPlanes" href="" data-toggle="modal" data-target="#modalPlanes">Ver planes</a></span>
                                    </div>

                                    <div class="terms-cond">
                                        <div class="col-12 mb-3 d-flex justify-content-center">
                                            <div class="input-group-prepend mr-2">
                                                <input type="checkbox" id="aceptar_terminos" name="aceptar_terminos">
                                                <span class="text-left text-danger text-sm text-bold" id="errorTerminos"></span>
                                            </div>
                                            <div>
                                                <span>Al continuar, aceptas los términos y condiciones de uso de esta aplicación, así como nuestras políticas de privacidad. Tu información será tratada conforme a la normativa legal vigente.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="btnSuscribirse" class="btnStep mt-3 p-2" data-toggle="tooltip" data-placement="top" title="Debes aceptar los términos y condiciones" disabled>Suscribirse</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('auth.modals.planes')
@include('Mensajes.carga')
@include('Mensajes.success')
@include('Mensajes.error')
@stop


<script src="{{ asset('dist/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('dist/bootstrap/js/bootstrap.min.js') }}"></script>

 <script defer src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.13.0/lottie.min.js" type="text/javascript"></script>

