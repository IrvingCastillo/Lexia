<div class="modal fade" id="modalRestriccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 25px 25px 25px 25px !important; background: #132c47; color:whitesmoke">
            <div class="modal-header pb-0">
                <h1 class="modal-title" id="exampleModalLabel"></h1>
                <span type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body pl-3 pr-3">
                <div class="modal-body pl-3 pr-3" style="color: #f5f3ed">
                    <div class="d-flex justify-content-center align-content-center">
                        <i class="fas fa-exclamation-triangle mr-2" style="font-size: 30px; color:yellow"></i>
                        <h2 style="color: #f5f3ed" class="titulo-texto">Esta funcionalidad no se contempla en tu plan </h2>
                    </div>
                    <div >
                        <div class="d-flex justify-content-center normal-texto-bold">
                            Sin embargo te presentamos la pantalla principal
                        </div>
                        <div class="d-flex justify-content-center normal-texto-bold">
                            Aquí tienes apoyo de la inteligencia artificial
                        </div><br>
                        <div class="d-flex justify-content-center normal-texto-bold">
                            <a href="" style="text-decoration: none">¡Te ayuda a generar escritos legales con solo ingresar datos clave!</a>
                        </div>
                    </div>
                </div>
            </div>
             <div class="d-flex justify-content-center">
                <div class="mb-3">
                    <a href="{{ route('modificarPlan') }}" style="color: #132c47 !important">
                        <button type="button" class=" px-4 py-2 campoRoundedX" data-dismiss="modal" style="width: 15rem; font-weight:bold; background: #f5f3ed" id="addPayment">Actualizar plan</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
