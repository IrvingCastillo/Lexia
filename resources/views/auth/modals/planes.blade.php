<div class="modal fade" id="modalPlanes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header pb-0">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Nuestros Planes</h5> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mb-0 pb-0 mt-0 pt-0">
                <x-planes></x-planes>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-blue" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
