<div wire:ignore.self class="modal fade" id="changeBoxModal" tabindex="-1" role="dialog" aria-labelledby="addModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin_klikbud/warehouse/tools.one.modals.box_title') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="selectModal('closeChangeStatus')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12" for="checkBox">{{ trans('admin_klikbud/warehouse/tools.one.modals.boxes') }}</label>
                    <div wire:ignore class="col-lg-9 col-md-9 col-sm-12">
                        <select  id="checkBox" class="form-control selectpicker @error('new_box') is-invalid @enderror" data-size="5" data-live-search="true" wire:model="new_box">
                            <option value="{{ NULL }}">-----------</option>
                            @forelse($get_box as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="selectModal('closeChangeStatus')" type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin_klikbud/warehouse/tools.one.modals.close') }}</button>
                <button wire:click="changeBox()" type="button" class="btn btn-primary">{{ trans('admin_klikbud/warehouse/tools.one.modals.save') }}</button>
            </div>
        </div>
    </div>
</div>
