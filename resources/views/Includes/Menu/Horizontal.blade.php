<header id="page-header">
        <div class="content-header">
            <div class="d-flex align-items-center">
                {{-- <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button> --}}

                {{-- <button id="sidebar_mini_toggle" type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                    <i class="fa fa-fw fa-ellipsis-v"></i>
                </button> --}}

                {{-- <button type="button" class="btn btn-sm btn-dual d-sm-none" data-toggle="layout" data-action="header_search_on">
                    <i class="si si-magnifier"></i>
                </button> --}}

                {{-- @PermisosInterfaz('MenuBuscador') ++++++--}}
                {{-- <form class="d-none d-sm-inline-block" id="MonitoreoIndividual" method="POST">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-alt" placeholder="Buscar" name="Buscar" id="Busqueda">
                        <div class="input-group-append puntero_cursor" id="ClickBuscar">
                            <span class="input-group-text bg-body border-0">
                                <i class="si si-magnifier"></i>
                            </span>
                        </div>
                    </div>
                </form> --}}
                {{-- @endPermisosInterfaz ++++++++++--}}
            </div>

            <div class="d-flex align-items-center">
                <div class="dropdown d-inline-block ml-2">
                    <button type="button" class="btn btn-sm btn-dual rounded-circle" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('images/usuario.png') }}" alt="Header Avatar" style="width: 19px;">
                    </button>
                    {{-- <button type="button" class="btn btn-sm btn-dual rounded-circle" id="" data-toggle="" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('images/bars-filter.png') }}" alt="" style="width: 16px;">
                    </button> --}}

                    <div class="dropdown-menu dropdown-menu-right font-size-sm" aria-labelledby="page-header-user-dropdown">
                        {{-- <div class="p-3 text-center bg-p1">
                            <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('images/usuario_2.png') }}" alt=""><br>
                            <input type="hidden" id="NotificacionDepto" value="">
                        </div> --}}

                        <div class="pt-0 pb-0">
                            <div class="pl-2 d-flex align-items-center justify-content-between">
                                <h5 class="textAzul mb-0 p-1">Lic. Ulises A. González</h5>
                            </div>

                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="">
                                <span>
                                    <i class="far fa-address-card ml-1"></i>
                                    <span>Información de la cuenta</span>
                                </span>
                                <span>
                                    <i class="fas fa-angle-right mr-2"></i>
                                </span>
                            </a>
                            {{-- @if(auth()->user()->Rol == 'USUARIO') +++++++++--}}
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="">
                                    <span>
                                        <i class="nav-main-link-icon"><img src="{{ asset('dist/fontawesome-6/svgs/brands/credit-card.svg') }}" alt="" style="width: 1.3rem;"></i>
                                        <span>Suscripción</span>
                                    </span>
                                    <span>
                                        <i class="fas fa-angle-right mr-2"></i>
                                    </span>
                                </a>

                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="">
                                    <span>
                                        <i class="nav-main-link-icon"><img src="{{ asset('dist/fontawesome-6/svgs/brands/shield.svg') }}" alt="" style="width: 1.3rem;"></i>
                                        <span>Configuración</span>
                                    </span>
                                    <span>
                                        <i class="fas fa-angle-right mr-2"></i>
                                    </span>
                                </a>

                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="">
                                    <span>
                                        <i class="fa fa-headphones ml-1"></i>
                                        <span>Ayuda</span>
                                    </span>
                                    <span>
                                        <i class="fas fa-angle-right mr-2"></i>
                                    </span>
                                </a>
                            {{-- @endif ++++++++++--}}

                            <div class="col-12">
                                <button type="submit" class="btn campoRounded mb-2 mt-2" style="background:transparent; color: #132c47; width: 100%; border:2px solid #132c47">Administrar Usuarios</button>
                            </div>

                            <div class="col-12">
                                <form method="post" action=""> {{-- logout --}}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn bg-blue campoRounded" style="width: 100%">Cerrar Sesión</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->

            </div>
            <!-- END Right Section -->
        </div>

        {{-- <div id="page-header-search" class="overlay-header bg-white">
            <div class="content-header">
                <form class="w-100" action="be_pages_generic_search.html" method="POST">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div> --}}

        {{-- <div id="page-header-loader" class="overlay-header bg-white">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                </div>
            </div>
        </div> --}}

    </header>
