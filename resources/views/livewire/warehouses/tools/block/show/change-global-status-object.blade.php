<div wire:ignore.self class="modal fade" id="globalStatusObjects" tabindex="-1" role="dialog" aria-labelledby="addModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin_klikbud/warehouse/tools.one.modals.object_change') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="selectModal('closeChangeGlobalStatus')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="Objects" class="col-form-label text-right col-lg-3 col-sm-12">{{ trans('admin_klikbud/warehouse/tools.one.modals.objects') }}</label>
                    <div wire:ignore class="col-lg-9 col-md-9 col-sm-12">
                        <select id="Objects" class="form-control selectpicker @error('new_global_status_table_id') is-invalid @enderror" data-size="5" data-live-search="true" wire:model="new_global_status_table_id">
                            <option value="{{ NULL }}">-----------</option>
                            @forelse($objects as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @empty
                            @endforelse
                        </select>
                        @error('new_global_status_table_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="selectModal('closeChangeObject')" type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin_klikbud/warehouse/tools.one.modals.close') }}</button>
                <button wire:click="changeGlobalStatus()" type="button" class="btn btn-primary">{{ trans('admin_klikbud/warehouse/tools.one.modals.save') }}</button>
            </div>
        </div>
    </div>
</div>
