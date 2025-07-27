@extends('dashboard')
{{-- @section('Contenedor','main-container') --}}
@section('Contenido')

<div>
    @include('Includes.HeadModule',['DireccionArea' => 'USUARIOS'])

    <div class="container-fluid">

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link ml-1 active" data-toggle="tab" href="#Usuarios" role="tab" aria-selected="true">Usuarios <span class="badge badge-secondary" id="TotalRegistradosAU"> 0 </span></a>
                {{-- @if (Auth::user()->FkDepartamento != 33) --}}
                <div class="col text-lg-right">
                    <button type="button" class="btn btn-sm" style="background: #062f4d; color: whitesmoke"><i class="fas fa-user-plus fa-1x"></i> Agregar Usuario</button>
                </div>
                {{-- @endif --}}
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="Usuarios" role="tabpanel" aria-labelly="nav-home-tab">
                <br>
                <div class="row">
                <!--  -->
                    <div class="col-md-12 col-xl-12 col-sm-12 ">
                        <div class="table-responsive-sm table-responsive-md table-responsive-xl">
                            <table class="table table-sm table-striped font-size-table" id="tblUsuarios">
                                <thead class="thead-p1">
                                    <tr>
                                        <th class="TH1 col-1">Nombre</th>
                                        <th class="TH1 col-1">Rol</th>
                                        <th class="TH1 col-1">Estado</th>
                                        <th class="TH1 col-1">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td class="col-1">Irving Gerardo</td>
                                        <td>Practicante</td>
                                        <td>Activo</td>
                                        <td><button class="btn btn-sm"><i class="fas fa-edit">Editar</i></button></td>
                                    </tr>
                                    <tr>
                                        <td class="col-1">Samuel Aguilera</td>
                                        <td>Practicante</td>
                                        <td>Activo</td>
                                        <td><button class="btn btn-sm"><i class="fas fa-edit">Editar</i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!--  -->
                </div>

            </div>

        </div>

    </div>
</div>

@php
    $d = new DateTime();
    $s = $d->format("v");
@endphp

@push('scripts')
    {{-- <script src="{{asset('js/Calendario/Calendario.js?q=')}}{{ $s }}"></script> --}}
@endpush

@stop
