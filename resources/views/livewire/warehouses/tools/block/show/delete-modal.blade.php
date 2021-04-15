<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Czy chcesz usunac</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="selectModal('closeDeleteModal')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button wire:click="selectModal('closeDeleteModal')" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="delete()" type="button" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </div>
    </div>
</div>
