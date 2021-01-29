<div  wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Usunięcie portalu - {{ $pre_title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Czy napełno chcesz usunąć portal: {{ $pre_title }} ?
            </div>
            <div class="modal-footer">
                <button wire:click="resetInputFieldsDelete" type="button" class="btn btn-secondary">Close</button>
                <button wire:click="delete({{$id_opinion}})" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
