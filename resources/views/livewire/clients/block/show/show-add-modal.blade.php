<div wire:ignore.self class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin_klikbud/clients.one.add_modal.title') }} - {{ $modal_title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="resetInputFields()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($modal_info == 'number')
                    <div class="form-group row">
                        <label for="store_title" class="col-3">{{ trans('admin_klikbud/clients.one.add_modal.phone') }}<span class="text-danger">*</span></label>
                        <div class="col-9">
                            <input id="store_title" class="form-control @error('add_number') is-invalid @enderror"
                                   type="text" wire:model.lazy="add_number"/>
                            @error('add_number')
                            <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                @endif
                @if($modal_info == 'email')
                    <div class="form-group row">
                        <label for="store_title" class="col-3">{{ trans('admin_klikbud/clients.one.add_modal.email') }}<span class="text-danger">*</span></label>
                        <div class="col-9">
                            <input id="store_title" class="form-control @error('add_email') is-invalid @enderror"
                                   type="text" wire:model.lazy="add_email"/>
                            @error('add_email')
                            <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button wire:click="resetInputFields()" type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin_klikbud/clients.one.add_modal.close') }}</button>
                <button wire:click="store()" type="button" class="btn btn-primary">{{ trans('admin_klikbud/clients.one.add_modal.save') }}</button>
            </div>
        </div>
    </div>
</div>
