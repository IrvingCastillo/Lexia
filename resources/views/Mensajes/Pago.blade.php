<div class="modal fade" id="modalMensajePago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <i class="fas fa-exclamation-triangle mr-2" style="font-size: 20px; color:yellow"></i>
                        <h2 style="color: #f5f3ed">Pon al día tu suscripción</h2>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div>
                            Parece que tu suscripción llegó a su fín
                        </div>
                        <div>
                            No te preocupes, ¡Puedes renovarla en segundos y seguir disfrutando
                        </div>
                        <div>
                            de todas las funcionalidades sin interrupciones!
                        </div>
                    </div>
                </div>
            </div>
             <div class="d-flex justify-content-center">
                <div class="mb-3">
                    <a href="{{ route('modificarPlan') }}" style="color: #132c47 !important">
                        <button type="button" class=" px-4 py-2 campoRoundedX" data-dismiss="modal" style="width: 15rem; font-weight:bold; background: #f5f3ed" id="addPayment">Relizar Pago</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
