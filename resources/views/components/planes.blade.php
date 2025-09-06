@php
    if (Auth::user() ){
        $redirectPage = "#";
    }
    else{
        $redirectPage = route('registro');
        $btnTitleP = "Seleccionar";
        $btnTitlePr = "Seleccionar";
        $btnTitleC = "Seleccionar";
        $dis = " ";
        $bgCard = " ";
        $colorText = " ";
        $classBtn = "btnPlanInactivo";
    }
@endphp
<div class="container">
    <div class="card-deck mb-3 justify-content-center">
        @php
        if (Auth::user()) {
            if (Auth::user()->lawfirm["plan"]["id"] == 1) {
                $btnTitleP = "Plan actual";
                $dis = " disabled";
                $bgCard = "bg-blue";
                $colorText = "text-white";
                $classBtn = "btnPlanActivo";
            }
            else{
                $btnTitleP = "Seleccionar";
                $dis = " ";
            }
        }
        @endphp
        <!-- Plan Básico -->
        <div class="card mb-4 shadow-sm cardPlan {{ $bgCard }}">
            <div class="card-body">
                <h1 class="text-left titulo-texto {{ $colorText }}">Personal</h1>
                <h1 class="card-title pricing-card-title mb-0 {{ $colorText }} text-right">$1499 MXN </h1>
                <small class="text-muted offset-9 normal-texto-light {{ $colorText }}" style="font-size: 20px">/ mes</small>
                <div class="my-3 normal-texto">Para abogados independientes</div>
                <ul class="list-unstyled mt-3 mb-4 text-left">
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span class="normal-texto">Carga de documentos</span>
                    </li>
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span class="normal-texto">Seguimiento de casos</span>
                    </li>
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span class="normal-texto">Panel Financiero</span>
                    </li>
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span class="normal-texto">1 usuario como máximo</span>
                    </li>
                </ul>

                <a href="{{ $redirectPage }}">
                <button type="button" class="btnPlan {{ $classBtn }} campoRoundedX texto-boton" {{ $dis }}>
                    {{ $btnTitleP }}
                </button>
                </a>
            </div>
        </div>

            @php
            if (Auth::user()) {
                if (Auth::user()->lawfirm["plan"]["id"] == 2) {
                    echo Auth::user()->lawfirm["plan"]["id"];
                    $btnTitlePr = "Plan actual";
                    $dis = " disabled";
                    $bgCard = "bg-blue";
                    $colorText = "text-white";
                    $classBtn = "btnPlanActivo";
                }
                else{
                    $btnTitlePr = "Seleccionar";
                    $dis = " ";
                    $bgCard = "";
                    $colorText = "";
                    $classBtn = "btnPlanInactivo";
                }
            }
            @endphp

        <!-- Plan Estándar (popular) -->
        <div class="card mb-4 shadow-sm cardPlan {{ $bgCard }}">
            <div class="card-body">
                <h1 class="text-left titulo-texto {{ $colorText }}">Profesional</h1>
                <h1 class="card-title pricing-card-title mb-0 {{ $colorText }} text-right">$3499 MXN </h1>
                <small class="text-muted offset-9 normal-texto-light {{ $colorText }}" style="font-size: 20px">/ mes</small>
                <div class="my-3 normal-texto">Para despachos en crecimiento</div>
                <ul class="list-unstyled mt-3 mb-4 text-left">
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span  class="position-relative normal-texto">
                            Inteligencia Artificial para casos jurídicos
                            <i id="infoBtn" type="button" class="fas fa-info-circle ms-2" style="color:#132c47; cursor:pointer;"></i>

                            <div id="customTooltip" class="custom-tooltip shadow-sm">
                                Escritos legales generados automáticamente con solo ingresar datos clave.
                            </div>
                        </span>
                    </li>
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span class="normal-texto">Carga hasta 10 documentos por caso</span>
                    </li>
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span class="normal-texto">3 usuarios como máximo</span>
                    </li><br>
                </ul>
                <a href="{{ $redirectPage }}">
                    <button type="button" class="btnPlan {{ $classBtn }} campoRoundedX texto-boton" {{ $dis }}>{{ $btnTitlePr }}</button>
                </a>
            </div>
        </div>

        <!-- Plan Premium -->

        @php
            if (Auth::user()) {
                if (Auth::user()->lawfirm["plan"]["id"] == 3) {
                    echo Auth::user()->lawfirm["plan"]["id"];
                    $btnTitleC = "Plan actual";
                    $dis = " disabled";
                    $bgCard = "bg-blue";
                    $colorText = "text-white";
                    $classBtn = "btnPlanActivo";
                }
                else{
                    $btnTitleC = "Seleccionar";
                    $dis = " ";
                    $bgCard = "";
                    $colorText = "";
                    $classBtn = "btnPlanInactivo";
                }
            }
            else{
                $bgCard = "bg-blue";
                $colorText = "text-white";
                $classBtn = "btnPlanActivo";
            }
            @endphp
        <div class="card mb-4 shadow-sm cardPlan {{ $bgCard }}">
            {{-- <div class="card-header">
                {{-- <h4 class="my-0 font-weight-normal">Básico</h4> --}
            </div> --}}
            <div class="card-body">
                <h1 class="text-left titulo-texto {{ $colorText }}">Corporativo</h1>
                <h1 class="{{ $colorText }} card-title pricing-card-title mb-0 text-right">$7999 MXN </h1>
                <small class="text-mute {{ $colorText }} offset-9 normal-texto-light" style="font-size: 20px">/ mes</small>
                <div class="my-3 normal-texto">Firmas medianas y grandes</div>
                <ul class="list-unstyled mt-3 mb-4 text-left">
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span class="normal-texto">Sin límites de documentos</span>
                    </li>
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span class="normal-texto">Soporte y asistencia personalizada</span>
                    </li>
                    <li>
                        <i class="far fa-check-circle fa-1x"></i>
                        <span class="normal-texto">Hasta 10 usuarios como máximo</span>
                    </li>
                </ul>
                <a href="{{ $redirectPage }}">
                    <button type="button" class="btnPlan {{ $classBtn }} mt-3 campoRoundedX texto-boton" {{ $dis }}>{{ $btnTitleC }}</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    const btn = document.getElementById("infoBtn");
const tooltip = document.getElementById("customTooltip");

// Mostrar/ocultar al hacer click en el botón
btn.addEventListener("click", (e) => {
  e.stopPropagation(); // evita que cierre inmediatamente
  tooltip.style.display = tooltip.style.display === "block" ? "none" : "block";
});

// Ocultar al hacer click fuera
document.addEventListener("click", () => {
  tooltip.style.display = "none";
});
</script>
