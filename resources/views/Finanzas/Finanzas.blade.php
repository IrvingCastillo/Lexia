@extends('dashboard')

@section('Contenido')

@vite(['resources/css/app.css', 'resources/js/finanzas/finanzas.js'])
@push('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endpush


<div class="container-fluid bg-white my-5 py-5">
    <div class="d-flex justify-content-md-start">
        <div class="titulo-texto textAzul">Pagos</div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-9">
            <div class="">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text group-text-transparent"> <i class="fas fa-search"></i> </span>
                    </div>
                    <input type="text" class="form-control rounded-right-input" placeholder="Buscar Pago" id="searchPayment">
                </div>

                <div id="ListaPagos">
                    <div class="pt-1 shadow-sm mt-3 "  style="height: 45vh; border:1px solid #f5f5f5; border-radius: 15px 15px; overflow-y: scroll;  scrollbar-color: #132c47 transparent; scrollbar-width: thin;">
                        <div class="card mb-3 border-0 ">
                            <div class="card-body border-bottom position-relative" style="border: 1px solid transparent;">
                                <div class="d-flex justify-content-between">
                                    <div class="file-item">
                                        <i class="far fa-file-alt file-icon"></i>
                                        <div class="file-info">
                                            <div class="file-title normal-texto textAzul">Primer Pago mes</div>
                                            <div class="file-time normal-texto-light"><span>Caso Ulises</span></div>
                                        </div>
                                    </div>
                                    <span>15/05/2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border-0 ">
                            <div class="card-body border-bottom position-relative" style="border: 1px solid transparent;">
                                <div class="d-flex justify-content-between">
                                    <div class="file-item">
                                        <i class="far fa-file-alt file-icon"></i>
                                        <div class="file-info">
                                            <div class="file-title normal-texto textAzul">Segundo Pago mes</div>
                                            <div class="file-time normal-texto-light"><span>Caso Ulises</span></div>
                                        </div>
                                    </div>
                                    <span>15/05/2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border-0 ">
                            <div class="card-body border-bottom position-relative" style="border: 1px solid transparent;">
                                <div class="d-flex justify-content-between">
                                    <div class="file-item">
                                        <i class="far fa-file-alt file-icon"></i>
                                        <div class="file-info">
                                            <div class="file-title normal-texto">Tercer Pago mes</div>
                                            <div class="file-time normal-texto-light"><span>Caso Ulises</span></div>
                                        </div>
                                    </div>
                                    <span>15/05/2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border-0 ">
                            <div class="card-body border-bottom position-relative" style="border: 1px solid transparent;">
                                <div class="d-flex justify-content-between">
                                    <div class="file-item">
                                        <i class="far fa-file-alt file-icon"></i>
                                        <div class="file-info">
                                            <div class="file-title">Primer Pago mes</div>
                                            <div class="file-time"><span>Caso Ulises</span></div>
                                        </div>
                                    </div>
                                    <span>15/05/2025</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <form id="AltaPagp">
                <div class="card px-2 pb-2" style=" border-radius: 8px 8px;">
                    <div>
                        <div class="d-flex">
                            <i class="fa fa-plus d-flex align-items-center textAzul" style="font-size: .8rem"></i>
                            <div class="textAzul ml-1 normal-texto-bold">Pago</div>
                        </div>
                        <div class="text-muted normal-texto-light" style=" margin-top: -.2rem">Agrega el pago correspondiente</div>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex">
                            <span class="textAzul mr-3 normal-texto">Monto</span>
                            <i class="fa fa-arrow-left d-flex align-items-center" style="font-size: .8rem"></i>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text group-text-transparent"> <i class="fas fa-dollar"></i> </span>
                            </div>
                            <input type="text" class="form-control rounded-right-input" placeholder="0.00" id="ammount" name="ammount">
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="textAzul mr-3 normal-texto">Estado</span>
                        <div class="btn-toggle-group">
                            <input type="radio" id="porPagar" name="estado" value="notpayed">
                            <label for="porPagar" class="btn-toggle">Por Pagar</label>

                            <input type="radio" id="pagado" name="estado" value="payed">
                            <label for="pagado" class="btn-toggle active">Pagado</label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="textAzul mr-3 normal-texto">Fecha</span>
                        <input type="date" class="form-control" id="payment_date" name="payment_date">
                    </div>
                    <div class="mt-3">
                        <span class="textAzul mr-3 normal-texto">Caso</span>
                        <select name="case" id="case" class="form-control">
                            {{-- <option value="" selected>Nombre del caso <i class="fa fa-arrow-down" style="font-size: .8rem"></i></option> --}}
                        </select>
                    </div>
                    <div class="mt-3 py-3">
                        <span class="textAzul mr-3 normal-texto">Descripción</span>
                        <textarea name="payment_description" id="payment_description" rows="3" class="form-control" placeholder="Opcional" style="min-height: 35px"></textarea>
                    </div>
                    <button type="button" class="bg-blue text-center px-4 py-1 texto-boton campoRoundedX" style="opacity: .3" id="addPayment" disabled>Agregar</button>
                </div>
            </form>

        </div>

        <div class="col-md-8" style="margin-top: -15vh">
            <div class="">
                <div class="d-flex justify-content-md-start">
                    <div class="titulo-texto textAzul">Estadísticas</div>
                </div>
                <div class=" my-1">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="grafica"></canvas>

                            <hr>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-muted">Balance</span>
                                    <h5 class="mb-0 text-success font-weight-bold">$700.00</h5>
                                </div>
                                <div>
                                    <span class="mr-3">
                                    <span style="display:inline-block;width:12px;height:12px;background:#0c2d48;border-radius:3px;margin-right:5px;"></span>
                                    Pagado
                                    </span>
                                    <span>
                                    <span style="display:inline-block;width:12px;height:12px;background:#6c757d;border-radius:3px;margin-right:5px;"></span>
                                    Por pagar
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('Mensajes.carga')
@include('Mensajes.error')

@stop
