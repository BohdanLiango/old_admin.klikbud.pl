<div class="modal fade" id="deleteModalForm" tabindex="-1" role="dialog" aria-labelledby="deleteModalForm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin_klikbud/settings/klikbud/main-slider.delete_modal.title_question') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <h3>{{ trans('admin_klikbud/settings/klikbud/main-slider.delete_modal.slider') }}: {{ $textYellow_data }} {{ $textBlack_data }}</h3>
                @if($image_data !== NULL)
                    <br>
                    <hr>
                    <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px"
                         style="background-image: url({{ Storage::disk('s3')->url($image_data) }})"></div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">{{ trans('admin_klikbud/settings/klikbud/main-slider.delete_modal.close') }}</button>
                <button type="button" wire:click.prevent="delete" class="btn btn-danger font-weight-bold">{{ trans('admin_klikbud/settings/klikbud/main-slider.delete_modal.delete') }}</button>
            </div>
        </div>
    </div>
</div>
