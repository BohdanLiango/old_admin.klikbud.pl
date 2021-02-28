<div  wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin_klikbud/settings/klikbud/contact.delete_modal.title') }} - {{ $contact->email }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ trans('admin_klikbud/settings/klikbud/contact.delete_modal.question') }}  ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary">{{ trans('admin_klikbud/settings/klikbud/contact.delete_modal.cancel') }}</button>
                <button wire:click="delete()" type="button" class="btn btn-primary">{{ trans('admin_klikbud/settings/klikbud/contact.delete_modal.save') }}</button>
            </div>
        </div>
    </div>
</div>
