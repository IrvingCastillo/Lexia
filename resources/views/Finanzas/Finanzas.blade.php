@extends('dashboard')
{{-- @section('Contenedor','main-container') --}}
@section('Contenido')

<style>
    .topFinance, .bottomFinance {
      flex: 1;
      display: flex;
      padding: 10px;
      box-sizing: border-box;
    }
    .topFinance {
      border-bottom: 1px solid #ccc;
    }
    .leftFinance {
      flex: 1;
      margin-right: 10px;
      overflow-y: auto;
    }
    .cardFinance {
      flex: 1;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      max-height: 40vh;
    }
    .bottomFinance > div {
      flex: 1;
      margin: 0 5px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      padding: 20px;
    }
    .bottomFinance > div:first-child { margin-left: 0; }
    .bottomFinance > div:last-child { margin-right: 0; }
</style>
<div>
    @include('Includes.HeadModule',['DireccionArea' => 'FINANZAS'])

    <div class="container-fluid">
        <div class="d-flex flex-row-reverse" >
            <div>
                <select name="" id="" class="custom-select">
                    <option value="" selected disabled>Estado de Pago</option>
                    <option value="">Formato 1</option>
                </select>
            </div>
        </div>

        <div class="topFinance">
            <!-- Tabla en el lado izquierdo -->
            <div class="leftFinance">
                <div class="cardFinance">
                    {{-- <table border="1" cellpadding="8" cellspacing="0" width="100%"> --}}
                        <table class="table table-sm table-striped font-size-table" id="tblFinanzas">
                            <thead>
                                <tr>
                                    <th>Caso</th>
                                    <th>Cliente</th>
                                    <th>Cobrado</th>
                                    <th>Saldo Pendiente</th>
                                </tr>
                            </thead>
                            <tbody id="data-table">
                                <tr><td>Garcia VS Martinez</td><td>Juan Garcia</td><td>$2,200</td><td>$13,400</td></tr>
                                <tr><td>Lopez VS Rodriguez</td><td>Ana Lopez</td><td>$1,100</td><td>$20,300</td></tr>
                            </tbody>
                        </table>
                </div>
            </div>

            <!-- Card con gráfico de pie -->
            <div class="cardFinance">
            <canvas id="pieChart" width="300" height="300"></canvas>
            </div>
        </div>

        <div class="bottomFinance">
            <!-- Gráficas de barra -->
            <div class="cardFinance">
            <canvas id="barChart1" width="300" height="300"></canvas>
            </div>
            <div class="cardFinance">
            <canvas id="barChart2" width="300" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

@php
    $d = new DateTime();
    $s = $d->format("v");
@endphp

@push('scripts')
    <script src="{{asset('js/Finanzas/Finanzas.js?q=')}}{{ $s }}"></script>
@endpush

@stop
