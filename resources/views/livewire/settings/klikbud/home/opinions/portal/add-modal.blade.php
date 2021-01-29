<div  wire:ignore.self class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dodaj nowy portal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    <label for="store_title" class="col-3">Nazwa<span class="text-danger">*</span></label>
                    <div class="col-9">
                        <input  id="store_title" class="form-control @error('store_title') is-invalid @enderror" type="text" wire:model.lazy="store_title" />
                        @error('store_title')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="store_url" class="col-3">Link<span class="text-danger">*</span></label>
                    <div class="col-9">
                        <input  id="store_url" class="form-control @error('store_url') is-invalid @enderror" type="text" wire:model.lazy="store_url" />
                        <span class="form-text text-muted">Na strone portalu</span>
                        @error('store_url')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                @if($store_image)
                    <div class="form-group row">
                        <label for="image" class="col-3"></label>
                        <div class="col-9">
                            <img src="{{ $store_image->temporaryUrl() }}" style="width: 100px">
                        </div>
                    </div>
                @endif

                <div class="form-group row"  wire:loading.attr="disabled">
                    <label for="image" class="col-3">Zdjecie<span class="text-danger">*</span></label>
                    <div class="col-9">
                        <input type="file" class="custom-file-input form-control @error('store_image') is-invalid @enderror " wire:model.defer="store_image" name="store_image" id="customFile" accept=".png, .jpg, .jpeg"/>
                        <label class="custom-file-label" for="customFile" >Choose file</label>
                        @error('store_image') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button wire:click="resetInputFieldsStore" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="store" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
