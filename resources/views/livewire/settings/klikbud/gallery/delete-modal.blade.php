<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin_klikbud/settings/klikbud/gallery.delete_modal.title_question') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">{{ trans('admin_klikbud/settings/klikbud/gallery.delete_modal.close') }}<</button>
                <button wire:click="delete" type="button" class="btn btn-primary font-weight-bold">{{ trans('admin_klikbud/settings/klikbud/gallery.delete_modal.delete') }}<</button>
            </div>
        </div>
    </div>
</div>
