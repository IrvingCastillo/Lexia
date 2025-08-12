@extends('dashboard')
{{-- @section('Contenedor','main-container') --}}
@section('Contenido')

<style>
        .btn-toggle-group {
        border-radius: 0.75rem;
        overflow: hidden;
        background-color: #f8f9fa;
        padding: 3px;
        display: inline-flex;
    }
    .btn-toggle-group input[type="radio"] {
        display: none;
    }
    .btn-toggle {
        border: none;
        padding: 0.5rem 1.5rem;
        border-radius: 0.65rem;
        font-weight: 600;
        color: gray;
        background: transparent;
        transition: 0.3s;
    }
    .btn-toggle.active {
        background-color: #112b44;
        color: white;
    }
</style>
@vite(['resources/css/app.css', 'resources/js/finanzas/finanzas.js'])


<div class="container-fluid bg-white my-5 py-5">
    <div class="d-flex justify-content-md-start">
        <div style="color: gray; font-size: 2.5rem;">PAGOS</div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-9">
            <div class="">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text group-text-transparent"> <i class="fas fa-search"></i> </span>
                    </div>
                    <input type="text" class="form-control rounded-right-input" placeholder="Buscar Pago">
                </div>

                <div class="pt-1 shadow-sm mt-3 "  style="height: 45vh; border:1px solid #f5f5f5; border-radius: 15px 15px; overflow-y: scroll;  scrollbar-color: #132c47 transparent; scrollbar-width: thin;">
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

        <div class="col-sm-3">
            <div class="card px-2 pb-2" style=" border-radius: 8px 8px;">
                <div>
                    <div class="d-flex">
                        <i class="fa fa-plus d-flex align-items-center textAzul" style="font-size: .8rem"></i>
                        <div class="textAzul ml-1" style="font-size: 1.5rem;">Pago</div>
                    </div>
                    <div class="text-muted" style="font-size: .8rem; margin-top: -.2rem">Agrega el pago correspondiente</div>
                </div>
                <div class="mt-3">
                    <div class="d-flex">
                        <span class="textAzul mr-3">Monto</span>
                        <i class="fa fa-arrow-left d-flex align-items-center" style="font-size: .8rem"></i>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text group-text-transparent"> <i class="fas fa-dollar"></i> </span>
                        </div>
                        <input type="text" class="form-control rounded-right-input" placeholder="0.00">
                    </div>
                </div>
                <div class="mt-3">
                    <span class="textAzul mr-3">Estado</span>
                    <div class="btn-toggle-group">
                        <input type="radio" id="porPagar" name="estado" checked>
                        <label for="porPagar" class="btn-toggle">Por Pagar</label>

                        <input type="radio" id="pagado" name="estado">
                        <label for="pagado" class="btn-toggle active">Pagado</label>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="textAzul mr-3">Fecha</span>
                    <input type="date" class="form-control">
                </div>
                <div class="mt-3">
                    <span class="textAzul mr-3">Caso</span>
                    <select name="" id="" class="form-control">
                        <option value="" selected>Nombre del caso <i class="fa fa-arrow-down" style="font-size: .8rem"></i></option>
                    </select>
                </div>
                <div class="mt-3 py-3">
                    <span class="textAzul mr-3">Descripción</span>
                    <textarea name="" id="" rows="3" class="form-control" placeholder="Opcional" style="min-height: 35px"></textarea>
                </div>
                <span type="button" class="bg-blue text-center px-4 py-1" style="border-radius: 5px 5px">Agregar</span>
            </div>

        </div>

        <div class="col-sm-8" style="margin-top: -15vh">
            <div class="">
                <div class="d-flex justify-content-md-start">
                    <div style="color: gray; font-size: 2.5rem;">Estadísticas</div>
                </div>
            </div>
        </div>


    </div>


</div>

@stop

