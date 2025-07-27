{{-- <?php
$routeName = explode("/", Route::getFacadeRoot()->current()->uri());
$routeName1 = (!isset($routeName[0])) ? '0' : $routeName[0];
$routeName2 = (!isset($routeName[1])) ? '0' : $routeName[1];
?> --}}

<ul class="nav-main">
    {{-- <li class="nav-main-heading">Menu de Navegación</li> --}}
    <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'casos') ? 'active' : '' }}" href="{{ asset('casos') }}">
            <i class="nav-main-link-icon fas fa-gavel fa-1x" style="font-size:18px;"></i>
            <span class="nav-main-link-name">Casos</span>
        </a>
    </li>

    {{-- <li class="nav-main-item">
        <a class="nav-main-link {{ ($routeName1 == 'Funcion-Publica') ? 'active' : '' }}" href="{{ route('Funcion-Publica') }}">
            <i class="nav-main-link-icon fa fa-cloud-upload-alt fa-1x"></i>
            <span class="nav-main-link-name">Función Pública</span>
        </a>
    </li> --}}

    {{-- @foreach ($menus as $key => $item) +++++++++++
    @if ($item['Padre'] != 0)
    @break
    @endif --}}

    {{--
    <li class="nav-main-item ">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
            <i class="nav-main-link-icon "></i>
            <span class="nav-main-link-name"></span>
        </a>
        <ul class="nav-main-submenu">
            {{-- @foreach ($item['submenu'] as $submenu) +++++++++++--}}
            {{-- @if($submenu['Tipo'] == 'PADRE') +++++++--}

            <li class="nav-main-item ">


                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="">
                        <i class="nav-main-link-icon "></i>
                    <span class="nav-main-link-name">  </span>
                        {{-- @if ($submenu['submenu'] != []) ++++++--}}
    {{--                         <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span> --}}
                        {{-- @endif ++++++++++--}
                    </a>

                <ul class="nav-main-submenu">
                    {{-- @foreach ($submenu['submenu'] as $submenu2) +++++++++++x
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ (\Request::route()->getName() == $submenu2['NombreRutaNivel3']) ? 'active' : '' }}" href="{{ asset($submenu2['Ruta']) }}">
                                <i class="nav-main-link-icon far fa-window-maximize fa-1x"></i>
                                <span class="nav-main-link-name">{{ $submenu2['Nombre'] }}</span>
                            </a>
                        </li>
                    @endforeach ++++++++++--}
                </ul>
            </li>

            {{-- @else +++++++++--}}

            {{-- @if(auth()->user()->Rol == 'ADMINISTRADOR') +++++--}
                <li class="nav-main-item">
                    <a class="nav-main-link " href="">
                        <i class="nav-main-link-icon far fa-window-maximize fa-1x"></i>
                        <span class="nav-main-link-name"></span>
                    </a>
                </li>
            {{-- @else +++++++--}}
                {{-- @if($submenu['menu_permiso'] != null) +++++++++++--}
                    <li class="nav-main-item">
                        <a class="nav-main-link " href="">
                            <i class="nav-main-link-icon far fa-window-maximize fa-1x"></i>
                            <span class="nav-main-link-name"></span>
                        </a>
                    </li>
                {{-- @endif +++++++++--}}
            {{-- @endif ++++++++++--}}


            {{-- @endif +++++--}}
            {{-- @endforeach ++++++++++++ --}
        </ul>
    </li> --}}
    {{-- @endforeach ++++++++++++ --}}

    {{-- <li class="nav-main-heading"></li> --}}

    {{-- @PermisosInterfaz('MenuOficialia')
        <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'Oficialia') ? 'active' : '' }}" href="{{ asset('Oficialia') }}">
                <i class="nav-main-link-icon far fa-window-maximize fa-1x"></i>
                <span class="nav-main-link-name">Oficialia</span>
            </a>
        </li>
    @endPermisosInterfaz --}}

        <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'ia') ? 'active' : '' }}" href="{{ asset('ia') }}">
                <i class="nav-main-link-icon"><img src="{{ asset('dist/fontawesome-6/svgs/brands/head-gear.svg') }}" alt="" style="width: 1.5rem; transform: scaleX(-1); font-weight: bold;"></i>
                <span class="nav-main-link-name">IA</span>
            </a>
        </li>

        <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'Solicitud') ? 'active' : '' }}" href="{{ asset('Solicitud') }}">
                <i class="nav-main-link-icon"><img src="{{ asset('dist/fontawesome-6/svgs/brands/dollar.svg') }}" alt="" style="width: 1.3rem; font-weight: bold;"></i>
                <span class="nav-main-link-name">Finanzas</span>
            </a>
        </li>


        <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'calendario') ? 'active' : '' }}" href="{{ asset('calendario') }}">
                <i class="nav-main-link-icon far fa-calendar-check fa-1x" style="font-size:20px;"></i>
                <span class="nav-main-link-name">Calendario</span>
                <span class=" rounded-circle-notify ml-4 text-center" id="">9</span>
            </a>
        </li>


        <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'usuarios') ? 'active' : '' }}" href="{{ asset('usuarios') }}">
                <i class="nav-main-link-icon"><img src="{{ asset('dist/fontawesome-6/svgs/brands/cog.svg') }}" alt="" style="width: 1.3rem; font-weight: bold;"></i>
                <span class="nav-main-link-name">Informes</span>
            </a>
        </li>

        {{-- <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'usuarios') ? 'active' : '' }}" href="{{ asset('usuarios') }}">
                <i class="nav-main-link-icon far fa-user fa-1x"></i>
                <span class="nav-main-link-name">Usuarios</span>
            </a>
        </li> --}}

         {{-- <li class="nav-main-item">
            <a class="nav-main-link {{ (\Request::route()->getName() == 'finanzas') ? 'active' : '' }}" href="{{ asset('finanzas') }}">
                <i class="nav-main-link-icon far fa-user fa-1x"></i>
                <span class="nav-main-link-name">Finanzas</span>
            </a>
        </li> --}}
</ul>
