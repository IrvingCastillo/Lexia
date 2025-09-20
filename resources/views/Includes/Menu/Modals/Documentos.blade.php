<div class="modal fade" id="modalDocumentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 25px 25px 25px 25px !important;">
            <div class="modal-header pb-0">
                <h1 class="modal-title" id="exampleModalLabel"></h1>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body pl-3 pr-3">
                <div class="modal-body pl-3 pr-3">
                    {{-- <div class="d-flex justify-content-center align-content-center">
                        <i class="fas fa-exclamation-circle" style="font-size: 90px; color:#132c47"></i>
                    </div> --}}
                    <h1 class="d-flex justify-content-center align-content-center">Aviso de Privacidad</h1>
                    <embed src="{{ asset('files/AvisoPrivacidad Lexia.pdf') }}" type="application/pdf" width="100%" height="600px">
                    <hr style=" border-top: 4px solid #132c47;" class="my-4">
                    <h1 class="d-flex justify-content-center align-content-center">Términos y Condiciones</h1>
                    <embed src="{{ asset('files/Terminos y Condiciones Lexia.pdf') }}" type="application/pdf" width="100%" height="600px">
                </div>
            </div>
        </div>
    </div>
</div>
