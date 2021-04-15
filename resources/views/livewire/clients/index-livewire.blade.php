<div>
    <div class="flex-row-lg-fluid ml-lg-8">
        @include('livewire.clients.block.index-widget')
        <div class="form-group">
            <label>{{ trans('admin_klikbud/clients.search') }}</label>
            <input wire:model="searchQuery" class="form-control" />
        </div>
        <div class="mb-7"></div>
        @include('livewire.clients.block.index-clients')
        {{--<!--begin::Pagination-->--}}
        <div class="card card-custom">
            <div class="card-body py-7">
                {{--<!--begin::Pagination-->--}}
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex flex-wrap mr-3">
                        {{ $clients->links('vendor.livewire.bootstrap') }}
                    </div>
                    <div class="d-flex align-items-center">
                        <select
                            class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary"
                            style="width: 75px;" wire:model="paginate">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="text-muted">{{ trans('admin_klikbud/clients.index.displaying') }} {{ $paginate }} {{ trans('admin_klikbud/clients.index.of') }} {{ $count_all }} {{ trans('admin_klikbud/clients.index.records') }}</span>
                    </div>
                </div>
                {{--<!--end:: Pagination-->--}}
            </div>
        </div>
        {{--<!--end::Pagination-->--}}
    </div>
    @push('scripts_p')
        <script src="{{ asset('js/pages/custom/contacts/list-columns.js') }}"></script>
    @endpush
</div>
