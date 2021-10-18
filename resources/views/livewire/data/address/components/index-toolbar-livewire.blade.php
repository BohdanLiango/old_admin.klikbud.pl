<div class="card-toolbar">
    <div class="me-4">
        <input wire:model="searchQuery" class="form-control form-control-flush" placeholder="{{ trans('data/address/index.search') }}"/>
    </div>
    <div class="me-4">
        <select wire:model="searchType" class="form-select form-select-solid" aria-label="Select example">
            <option value="">{{ trans('data/address/index.types') }}</option>
            @foreach($types as $type)
                <option value="{{ $type['value'] }}">{{ $type['title'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="me-4">
        <select wire:model="paginate" class="form-select form-select-solid" aria-label="Select example">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="200">200</option>
            <option value="1000">1000</option>
        </select>
    </div>

</div>
