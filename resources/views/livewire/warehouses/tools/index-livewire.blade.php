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
                                        </h5>
                                        <div>
                                            <a href="#" wire:click.prevent="searchNew()" class="btn btn-light-success btn-sm font-weight-bolder">
                                                <i class="flaticon2-open-box"></i>  Pokaż nowe
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
