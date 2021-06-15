<div wire:ignore.self class="modal fade" id="openWarehouseModal" tabindex="-1" role="dialog" aria-labelledby="openWarehouseModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Przenieś do magazynu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="selectModal('closeWarehouseModal')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="warehouse" class="col-form-label text-right col-lg-3 col-sm-12">Magazyny</label>
                    <div wire:ignore class="col-lg-9 col-md-9 col-sm-12">
                        <select id="warehouse" class="form-control selectpicker @error('new_global_status_table_id') is-invalid @enderror" data-size="5" data-live-search="true" wire:model="modal_value">
                            <option value="{{ NULL }}">-----------</option>
                            @forelse($warehouses as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @empty
                            @endforelse
                        </select>
                        @error('modal_value')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="selectModal('closeWarehouseModal')" type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin_klikbud/warehouse/tools.one.modals.close') }}</button>
                <button type="button" class="btn btn-primary" wire:click="changePlace('{{ config('klikbud.status_tools_table.warehouse') }}')">{{ trans('admin_klikbud/warehouse/tools.one.modals.save') }}</button>
            </div>
        </div>
    </div>
</div>
