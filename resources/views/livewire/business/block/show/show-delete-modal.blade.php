<div  wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin_klikbud/business.show.delete.delete_business') }} - {{ $business['title'] }} ?</h5>
                <button type="button"  wire:click="opensModals('deleteClose', {{ $business['id'] }})" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button wire:click="opensModals('deleteClose',  {{ $business['id'] }})" type="button" class="btn btn-secondary">{{ trans('admin_klikbud/business.show.delete.no') }}</button>
                <button wire:click="delete()" type="button" class="btn btn-danger">{{ trans('admin_klikbud/business.show.delete.yes') }}</button>
            </div>
        </div>
    </div>
</div>
