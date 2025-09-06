<header id="page-header">
    {{-- {{ dd(Auth::user()) }} --}}
        <div class="content-header">
            <div class="d-flex align-items-center">
            </div>
            <div class="d-flex align-items-center">
                <div class="dropdown d-inline-block ml-2">
                    <button type="button" class="btn btn-sm btn-dual rounded-circle btnShowDrop" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('images/usuario.png') }}" alt="Header Avatar" style="width: 19px;">
                    </button>

                    <div class="dropdown-menu dropdown-main dropdown-menu-right font-size-sm" aria-labelledby="page-header-user-dropdown" >

                        <div class="dropMain" style="min-height: 17rem;">
                            <div class="pt-0 pb-0">
                                <div class="pl-2 d-flex align-items-center justify-content-between">
                                    <h5 class="textAzul mb-0 p-1 normal-texto-bold">{{ Auth::user()->nombre_cliente }}</h5>

                                </div>

                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('cuenta') }}">
                                    <span>
                                        <i class="far fa-address-card ml-1"></i>
                                        <span class="normal-texto">Información de la cuenta</span>
                                    </span>
                                    <span>
                                        <i class="fas fa-angle-right mr-2"></i>
                                    </span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between showSus" href="#">
                                    <span>
                                        <i class="nav-main-link-icon"><img src="{{ asset('dist/fontawesome-6/svgs/brands/credit-card.svg') }}" alt="" style="width: 1.3rem;"></i>
                                        <span class="normal-texto">Suscripción</span>
                                    </span>
                                    <span>
                                        <i class="fas fa-angle-right mr-2"></i>
                                    </span>
                                </a>

                                <a class="dropdown-item d-flex align-items-center justify-content-between showConf" href="#">
                                    <span>
                                        <i class="nav-main-link-icon"><img src="{{ asset('dist/fontawesome-6/svgs/brands/shield.svg') }}" alt="" style="width: 1.3rem;"></i>
                                        <span class="normal-texto">Configuración</span>
                                    </span>
                                    <span>
                                        <i class="fas fa-angle-right mr-2"></i>
                                    </span>
                                </a>

                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="">
                                    <span>
                                        <i class="fa fa-headphones ml-1"></i>
                                        <span class="normal-texto">Ayuda</span>
                                    </span>
                                    <span>
                                        <i class="fas fa-angle-right mr-2"></i>
                                    </span>
                                </a>

                                {{-- <div class="col-12">
                                    <button type="submit" class="btn campoRounded mb-2 mt-2" style="background:transparent; color: #132c47; width: 100%; border:2px solid #132c47">Administrar Usuarios</button>
                                </div> --}}

                                <div class="col-12 my-2">
                                    <form method="post" action="{{ route('logout') }}"> {{-- logout --}}
                                         @csrf
                                        <button type="submit" class="btn bg-blue campoRounded texto-boton" style="width: 100%">Cerrar Sesión</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="dropSuscripcion dropHide" id="dropSuscripcion" style="min-height: 20rem;">
                            <div class="pl-2 d-flex align-items-center justify-content-start">
                                <i type="button" class="fas fa-angle-left backSuscripcion"></i>
                                <h5 class="textAzul mb-0 p-1 normal-texto-bold">Suscripción</h5>
                            </div><hr>
                            <div class="mx-2">

                                <div class="card campoRounded shadow-sm">
                                    <div class="card-body">
                                        <span class="p-2 campoRounded normal-texto" style="background: aliceblue">Plan <b class="textAzul normal-texto">{{ Auth::user()->lawfirm["plan"]["name"] }}</b></span>
                                        <div class="d-flex justify-content-between mt-2">
                                            <span class="normal-texto">Pago Mensual</span>
                                            <span class="normal-texto">$ {{ Auth::user()->lawfirm["plan"]["price"] }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <span class="normal-texto">Siguiente Pago</span>
                                            <span class="normal-texto-light">23 de Diciembre de 2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="normal-texto">Tarjeta Asociada</span>
                                    <div class="card campoRounded shadow-sm">
                                        <div class="card-body">
                                            <img src="{{ asset('dist/fontawesome-6/svgs/brands/credit-card-2.svg') }}" style="width: 2.5rem;"> <span>**** **** 3774</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{ route('modificarPlan') }}">
                                    <button type="button" class="bg-blue px-4 py-2 campoRoundedX texto-boton" style="width: 18rem"><b>Modificar plan</b></button>
                                </a>
                            </div>

                        </div>

                        <div class="dropConfiguracion mb-3 dropHide " id="dropConfiguracion">
                            <div class="pl-2 d-flex align-items-center justify-content-start">
                                <i type="button" class="fas fa-angle-left pr-2 backConfiguracion"></i>
                                <h5 class="textAzul mb-0 p-1 normal-texto-bold">Configuración</h5>
                            </div><hr>
                            <div class="mx-2">
                                <div class="textAzul font-size1 pl-2 normal-texto">Seguridad y privacidad</div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('modificarContrasena') }}">
                                    <span>
                                        <span class="normal-texto">Cambiar contraseña</span>
                                    </span>
                                    <span>
                                        <i class="fas fa-angle-right mr-2"></i>
                                    </span>
                                </a><hr>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('cuenta') }}">
                                    <span>
                                        <span class="normal-texto">Términos y condiciones</span>
                                    </span>
                                    <span>
                                        <i class="fas fa-angle-right mr-2"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </header>
