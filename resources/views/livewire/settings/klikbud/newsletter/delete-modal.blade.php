<div  wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin_klikbud/settings/klikbud/newsletter.delete-modal.title') }} - {{ $pre_email }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary">{{ trans('admin_klikbud/settings/klikbud/newsletter.delete-modal.no') }}</button>
                <button wire:click="delete({{ $pre_id }})" type="button" class="btn btn-primary">{{ trans('admin_klikbud/settings/klikbud/newsletter.delete-modal.yes') }}</button>
            </div>
        </div>
    </div>
</div>
