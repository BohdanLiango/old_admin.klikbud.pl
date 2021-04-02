<div wire:ignore.self class="modal fade" id="changeStatusModal" tabindex="-1" role="dialog" aria-labelledby="addModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="selectModal('closeChangeStatus')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-3">Status<span class="text-danger">*</span></label>
                    <div class="radio-inline col-7">
                        @foreach($status_tool_data as $status)
                        <label class="radio radio-rounded">
                            <input type="radio" name="radios15_1" @if((int)$status['value'] === (int)$new_status ) checked="checked" @endif wire:click="clickRadio({{ $status['value'] }})"/>
                            <span></span>
                            {{ $status['title'] }}
                        </label>
                        @endforeach
                            @error('new_status')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="store_title" class="col-3">Info</label>
                    <div class="col-9">
                        <input id="store_title" class="form-control @error('new_status_description') is-invalid @enderror"
                               type="text" wire:model.lazy="new_status_description"/>
                        @error('new_status_description')
                        <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="selectModal('closeChangeStatus')" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="changeStatus()" type="button" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </div>
    </div>
</div>
