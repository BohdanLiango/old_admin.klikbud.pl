<div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        @include('livewire.warehouses.tools.block.index.subheader')
        @include('livewire.warehouses.tools.block.index.widget')
        <div class=" d-flex flex-column-fluid row">
            <div class="container">
                <div class="form-group col-xl-6 float-left">
                    <label>{{ trans('admin_klikbud/warehouse/tools.index.search') }}</label>
                    <input wire:model="searchQuery" class="form-control"/>
                </div>
                <div class="form-group col-xl-6 float-right">
                    <label>{{ trans('admin_klikbud/warehouse/tools.index.status') }}</label>
                    <select wire:model="searchStatus" class="form-control ">
                        <option value="">--------</option>
                        @foreach($status as $item)
                            <option value="{{ $item['value'] }}">{{ $item['title'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
{{--        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">--}}
{{--            <div class=" d-flex flex-column-fluid row">--}}
{{--                <div class="container">--}}
{{--                <div class="col-xl-12">--}}
{{--                    <p> HUJ | PIZDA</p>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="d-flex flex-row">
                    <div class="flex-column offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">
                      @include('livewire.warehouses.tools.block.index.aside-widgets')
                    </div>
                    <div class="flex-row-fluid ml-lg-8">
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-body">
                                <div class="mb-11">
                                    <div class="d-flex justify-content-between align-items-center mb-7">
                                        <h5 class="font-weight-bolder text-dark font-size-h3 mb-0">
                                            <i class="fa fa-tools"></i> {{ $count_tools_search }}
                                            @empty($searchQuery) @else | <i class="flaticon2-search"></i> {{ $searchQuery }} @endempty
                                            @empty($searchStatus) @else
                                                @foreach($status as $item)
                                                    @if($item['value'] == $searchStatus)
                                                        <span class="{{ $item['class'] }} label-xl">{{ $item['title'] }}</span>
                                                    @endif
                                                @endforeach
                                            @endempty
                                            @empty($searchMainCategory) @else
                                                @foreach($categories as $category)
                                                    @if($category->id == $searchMainCategory)
                                                        <i class="flaticon2-check-mark"></i> {{ $category->title }}
                                                    @endif
                                                @endforeach
                                            @endempty
                                            @empty($searchHalfCategory) @else |
                                                @foreach($categories as $category)
                                                    @if($category->id == $searchHalfCategory)
                                                        <i class="flaticon2-check-mark"></i> {{ $category->title }}
                                                    @endif
                                                @endforeach
                                            @endempty
                                            @empty($searchCategory) @else |
                                                @foreach($categories as $category)
                                                    @if($category->id == $searchCategory)
                                                        <i class="flaticon2-check-mark"></i> {{ $category->title }}
                                                    @endif
                                                @endforeach
                                            @endempty
                                            @empty($searchBoxId) @else |
                                                <i class="flaticon2-open-box"></i> {{ $searchBoxTitle }}
                                            @endempty
                                            @empty($searchGlobalStatusTable) @else |
                                                @if($searchGlobalStatusTable == config('klikbud.status_tools_table.warehouse'))
                                                    @foreach($warehouses as $item)
                                                        @if($item->id == $searchGlobalStatusId)
                                                            <i class="flaticon2-box-1"></i> {{ $item->title }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if($searchGlobalStatusTable == config('klikbud.status_tools_table.object'))
                                                    @foreach($objects as $item)
                                                        @if($item->id == $searchGlobalStatusId)
                                                            <i class="flaticon2-architecture-and-city"></i> {{ $item->title }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if($searchGlobalStatusTable == config('klikbud.status_tools_table.client'))
                                                    @foreach($clients as $item)
                                                        @if($item->id == $searchGlobalStatusId)
                                                            <i class="flaticon2-group"></i> {{ Str::limit($item->first_name, 10) }} {{ Str::limit($item->last_name, 10) }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if($searchGlobalStatusTable == config('klikbud.status_tools_table.business'))
                                                    @foreach($business as $item)
                                                        @if($item->id == $searchGlobalStatusId)
                                                            <i class="flaticon-presentation"></i> {{ Str::limit($item->title, 20) }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if($is_new !== true)
                                                <i class="flaticon-add"></i> Nowy
                                                @endif
                                            @endempty
                                        </h5>
                                        <div>
                                            @if($showCloseFiltersButton == 2)
                                                <a href="#" wire:click.prevent="clearSearchOptions()" class="btn btn-light-primary btn-sm font-weight-bolder">
                                                    <i class="flaticon2-delete"></i>  {{ trans('admin_klikbud/warehouse/tools.index.buttons.view_all') }}
                                                </a>
                                            @endif
                                            <a href="#" wire:click.prevent="searchNew()" class="btn btn-light-success btn-sm font-weight-bolder">
                                                <i class="flaticon2-add"></i>  Pokaż nowe
                                            </a>
                                                <a href="#" wire:click.prevent="searchAll()" class="btn btn-light-success btn-sm font-weight-bolder">
                                                    <i class="flaticon2-add"></i>  Pokaż wszystkie
                                                </a>
                                        </div>

                                    </div>
                                    <div class="row">
                                      @include('livewire.warehouses.tools.block.index.tools')
                                    </div>
                                    {{ $tools->links('vendor.livewire.bootstrap') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
