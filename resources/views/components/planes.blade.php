<div class="container">
    {{-- <div class="text-center mb-3">
        <h1 class="textAzul">Planes</h1>
        <span style="color: #5e6674">Elige la opción que más se adecúe a tus necesidades</span>
    </div> --}}
    <div class="card-deck mb-3 justify-content-center">
        <!-- Plan Básico -->
        <div class="card mb-4 shadow-sm cardPlan">
            {{-- <div class="card-header">
                {{-- <h4 class="my-0 font-weight-normal">Básico</h4> --}
            </div> --}}
            <div class="card-body">
                <h1 class="text-left ">Personal</h1>
                <h1 class="card-title pricing-card-title mb-0">$1499 MXN </h1>
                <small class="text-muted offset-6" style="font-size: 20px">/ mes</small>
                <div>Para abogados independientes</div>
                <ul class="list-unstyled mt-3 mb-4 text-left">
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span>Carga de documentos</span>
                    </li>
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span>Calendario</span>
                    </li>
                    <li>
                        <i class="fas fa-close fa-1x"></i>
                        <span>Máximo 1 usuario</span>
                    </li>
                    <li>
                        <i class="fas fa-close fa-1x"></i>
                        <span>Sin inteligencia artificial</span>
                    </li>
                </ul>
                <a href="{{ route('registro') }}">
                    <button type="button" class="btnPlan btnPlanInactivo campoRounded" >Elegir</button>
                </a>
            </div>
        </div>

        <!-- Plan Estándar (popular) -->
        <div class="card mb-4 shadow-sm cardPlan">
            {{-- <div class="card-header">
                {{-- <h4 class="my-0 font-weight-normal">Básico</h4> --}
            </div> --}}
            <div class="card-body">
                <h1 class="text-left ">Profesional</h1>
                <h1 class="card-title pricing-card-title mb-0">$3499 MXN </h1>
                <small class="text-muted offset-6" style="font-size: 20px">/ mes</small>
                <div>Para despachos en crecimiento</div>
                <ul class="list-unstyled mt-3 mb-4 text-left">
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span>IA con Lexia <i type="button" class="fas fa-info-circle" style="color: #132c47"></i></span>
                    </li>
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span>Hasta 5 usuarios</span>
                    </li>
                    <li>
                        <i class="fas fa-close fa-1x"></i>
                        <span>Límite de hasta 10 documentos</span>
                    </li><br>
                </ul>
                <a href="{{ route('registro') }}">
                    <button type="button" class="btnPlan btnPlanInactivo campoRounded">Elegir</button>
                </a>
            </div>
        </div>

        <!-- Plan Premium -->
        <div class="card mb-4 shadow-sm cardPlan bg-blue">
            {{-- <div class="card-header">
                {{-- <h4 class="my-0 font-weight-normal">Básico</h4> --}
            </div> --}}
            <div class="card-body">
                <h1 class="text-left text-white">Corporativo</h1>
                <h1 class="text-white card-title pricing-card-title mb-0">$7999 MXN </h1>
                <small class="text-muted text-white offset-6" style="font-size: 20px">/ mes</small>
                <div>Firmas medianas y grandes</div>
                <ul class="list-unstyled mt-3 mb-4 text-left">
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span>IA con Lexia <i type="button" class="fas fa-info-circle"></i></span>
                    </li>
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span>Más de 10 usuarios</span>
                    </li>
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span>Soporte personalizado</span>
                    </li>
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span>Sin límite de documentos</span>
                    </li>
                </ul>
                <a href="{{ route('registro') }}">
                    <button type="button" class="btnPlan btnPlanActivo mt-3 campoRounded">Elegir</button>
                </a>
            </div>
        </div>
    </div>
</div>
