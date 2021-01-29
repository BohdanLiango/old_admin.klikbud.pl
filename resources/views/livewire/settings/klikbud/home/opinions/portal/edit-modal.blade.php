<div  wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edytowanie portalu - {{ $pre_title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" wire:model="store_edit">

                <div class="form-group row">
                    <label for="store_title" class="col-3">Nazwa<span class="text-danger">*</span></label>
                    <div class="col-9">
                        <input  id="store_title" class="form-control @error('edit_title') is-invalid @enderror" type="text" wire:model.lazy="edit_title" />
                        @error('edit_title')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="store_url" class="col-3">Link<span class="text-danger">*</span></label>
                    <div class="col-9">
                        <input  id="store_url" class="form-control @error('edit_url') is-invalid @enderror" type="text" wire:model.lazy="edit_url" />
                        <span class="form-text text-muted">Na strone portalu</span>
                        @error('edit_url')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                @if($edit_image)
                    <div class="form-group row">
                        <label for="image" class="col-3"></label>
                        <div class="col-9">
                            <img src="{{ $edit_image->temporaryUrl() }}" style="width: 100px">
                        </div>
                    </div>
                @endif

                @if(isset($pre_portal_data->image_id) and $edit_image == null)
                    <div class="form-group row">
                        <label for="image" class="col-3"></label>
                        <div class="col-9">
                            <img src="{{ asset(Storage::url($pre_portal_data->image->file_view)) }}" style="width: 100px">
                        </div>
                    </div>
                @endif


                <div class="form-group row">
                    <label for="image" class="col-3">Zdjecie<span class="text-danger">*</span></label>
                    <div class="col-9">
                        <input type="file" class="custom-file-input form-control @error('edit_image') is-invalid @enderror " wire:model.defer="edit_image" name="edit_image" id="customFile" accept=".png, .jpg, .jpeg"/>
                        <label class="custom-file-label" for="customFile" >Choose file</label>
                        @error('edit_image') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button wire:click="resetInputFieldsEdit" type="button" class="btn btn-secondary">Close</button>
                <button wire:click="edit" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
