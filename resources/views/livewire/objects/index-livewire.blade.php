<div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ trans('admin_klikbud/objects.index.title') }}</h5>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>

                    <div class="d-flex align-items-center mr-8" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $count_all }} {{ trans('admin_klikbud/objects.index.total') }}</span>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="#" class=""></a>
                    <a href="{{ route('objects.add') }}" class="btn btn-light-primary font-weight-bold ml-2">{{ trans('admin_klikbud/objects.index.buttons.add_new') }}</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="row">
                        <div class="form-group col-xl-3 float-left">
                            <label>{{ trans('admin_klikbud/objects.index.search') }}</label>
                            <input wire:model="searchQuery" class="form-control"/>
                        </div>
                        <div class="form-group col-xl-3 float-right">
                            <label>{{ trans('admin_klikbud/objects.index.status_object') }}</label>
                            <select wire:model="searchStatusObject" class="form-control ">
                                <option value="" selected="selected">{{ trans('admin_klikbud/objects.index.select_all') }}</option>
                                @forelse($status_object_data as $item)
                                    <option value="{{ $item['value'] }}">{{ $item['title'] }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-xl-3 float-right">
                            <label>{{ trans('admin_klikbud/objects.index.type_object') }}</label>
                            <select wire:model="searchTypeObject" class="form-control ">
                                <option value="" selected="selected">{{ trans('admin_klikbud/objects.index.select_all') }}</option>
                                @forelse($type_object_data as $item)
                                    <option value="{{ $item['value'] }}">{{ $item['title'] }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-xl-3 float-right">
                            <label>{{ trans('admin_klikbud/objects.index.type_repair') }}</label>
                            <select wire:model="searchRepair" class="form-control ">
                                <option value="" selected="selected">{{ trans('admin_klikbud/objects.index.select_all') }}</option>
                                @forelse($type_repair_data as $item)
                                    <option value="{{ $item['value'] }}">{{ $item['title'] }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                </div>
               @include('livewire.objects.block.index-content')
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex flex-wrap mr-3">
                        {{ $objects_show->links('vendor.livewire.bootstrap') }}
                    </div>
                    <div class="d-flex align-items-center">
                        <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;"  wire:model="paginate">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="text-muted">{{ trans('admin_klikbud/objects.index.displaying') }} {{ $paginate }} {{ trans('admin_klikbud/objects.index.of') }} {{ $count_all }} {{ trans('admin_klikbud/objects.index.records') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
