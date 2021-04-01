<div wire:ignore.self class="modal fade" id="changeBoxModal" tabindex="-1" role="dialog" aria-labelledby="addModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Box</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="selectModal('closeChangeStatus')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12" for="checkBox">Box</label>
                    <div wire:ignore class="col-lg-9 col-md-9 col-sm-12">
                        <select  id="checkBox" class="form-control selectpicker @error('new_box_id') is-invalid @enderror" data-size="5" data-live-search="true" wire:model="new_box_id">
                            @if(!is_null($old_box_id))
                                <option value="{{ $old_box_id['id'] }}">{{ $old_box_id['title'] }}</option>
                            @endif
                            <option value="{{ NULL }}">----------</option>
                            @forelse($get_box as $item)
                                @if(!is_null($old_box_id) and $old_box_id['id'] == $item->id)
                                @else
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endif
                            @empty
                            @endforelse
                        </select>
                        @error('new_box_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="selectModal('closeChangeStatus')" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="changeBox()" type="button" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </div>
    </div>
</div>
