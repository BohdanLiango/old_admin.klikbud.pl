<div wire:ignore.self class="modal fade" id="globalStatusObjects" tabindex="-1" role="dialog" aria-labelledby="addModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Global Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="selectModal('closeChangeGlobalStatus')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="Objects" class="col-form-label text-right col-lg-3 col-sm-12">Objects</label>
                    <div wire:ignore class="col-lg-9 col-md-9 col-sm-12">
                        <select id="Objects" class="form-control selectpicker @error('new_global_status_id') is-invalid @enderror" data-size="5" data-live-search="true" wire:model="new_global_status_id">
                            <option value="{{ NULL }}"></option>
                            @forelse($objects as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @empty
                            @endforelse
                        </select>
                        @error('new_global_status_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="selectModal('closeChangeObject')" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="changeGlobalStatus()" type="button" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </div>
    </div>
</div>
