<div class="card card-custom card-stretch gutter-b">
    <div class="card-body p-15 pb-20">
        <div class="row mb-17">
            <div class="col-xxl-5 mb-11 mb-xxl-0">
                {{--<!--begin::Image-->--}}
                <div class="card card-custom card-stretch">
                    <div class="card-body p-0 rounded d-flex align-items-center justify-content-center">
                        @if(is_null($tool['image']))
                            <img src="{{ asset('media/static/no-image.jpg') }}" alt="" class="w-100 rounded"/>
                        @else
                            <img src="{{ Storage::disk(config('klikbud.disk_store'))->url($tool['image']) }}" alt=""
                                 class="w-100 rounded"/>
                        @endif
                    </div>
                </div>
                {{--<!--end::Image-->--}}
            </div>
            <div class="col-xxl-7 pl-xxl-11">
                <h2 class="font-weight-bolder text-dark mb-7" style="font-size: 32px;">{{ $tool['title'] }}
                    <a href="{{ route('warehouses.tools.edit', $tool['slug']) }}" class="btn btn-icon btn-warning ml-10"><i class="flaticon2-edit"></i></a>
                    <a wire:click="selectModal('openDeleteModal')" class="btn btn-icon btn-danger"><i class="flaticon2-delete"></i></a></h2>
                <div class="font-size-h2 mb-7 text-dark-50">Cena<span class="text-info font-weight-boldest ml-2">{{ $tool['price'] }} zł</span>
                </div>
                <div class="line-height-xl">{{ $tool['description'] }}</div>
                <hr>
                <div class="line-height-xl">Kategoria:
                    @if(!is_null($tool['category_id']))
                        {{ $tool['main_category_id'] }} /
                    @endif
                    @if(!is_null($tool['category_id']))
                        {{ $tool['half_category_id'] }} /
                    @endif
                    @if(!is_null($tool['category_id']))
                        {{ $tool['category_id'] }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row mb-6">
            {{--<!--begin::Info-->--}}
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">Status
                        @if($new_status_description)
                        <button class="btn btn-icon btn-primary btn-xs" data-container="body" data-toggle="tooltip" data-placement="right" title="{{ $new_status_description }}">
                            <i class="flaticon2-information"></i>
                        </button>
                        @endif
                        <button wire:click="selectModal('changeStatus')" class="btn btn-icon btn-warning btn-xs"><i class="flaticon2-edit"></i></button>
                    </span>
                    @foreach($status_tool_data as $status)
                        @if((int)$status['value'] === (int)$new_status)
                                <span class="{{ $status['class'] }} label-xl">{{ $status['title'] }}</span>
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">Box <button wire:click="selectModal('changeBox')" class="btn btn-icon btn-warning btn-xs"><i class="flaticon2-edit"></i></button></span>
                    <span class="text-muted font-weight-bolder font-size-lg">
                        @if(!is_null($new_box))
                            @forelse($get_box as $item)
                                @if($new_box == $item->id)
                                    <a href="{{ route('warehouses.tools.show', $item->slug) }}" target="_blank">{{ $item->title }}</a>
                                        @break
                                @endif
                            @empty
                                NONE
                            @endforelse
                        @else
                            NONE
                        @endif
                    </span>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">purchase_date</span>
                    <span class="text-muted font-weight-bolder font-size-lg">@if(is_null($tool['purchase_date']) || $tool['purchase_date'] === '01/01/1970')
                            NONE @else {{ $tool['purchase_date'] }} @endif</span>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">price</span>
                    <span class="text-muted font-weight-bolder font-size-lg">@if(is_null($tool['price']))
                            NONE @else {{ $tool['price'] }} zł @endif</span>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">serial_number</span>
                    <span class="text-muted font-weight-bolder font-size-lg">@if(is_null($tool['serial_number']))
                            NONE @else {{ $tool['serial_number'] }} @endif</span>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">Business_department</span>
                    @if(is_null($tool['business_departments_id']))
                        <span class="text-muted font-weight-bolder font-size-lg">NONE</span>
                    @else
                        <span class="text-muted font-weight-bolder font-size-lg"><a
                                href="{{ route('business.one', $tool['business_departments_id_business_slug']) }}"
                                target="_blank">{{ $tool['business_departments_id'] }}</a></span>
                    @endif
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">Manufacturer</span>
                    @if(is_null($tool['manufacturer_id']))
                        <span class="text-muted font-weight-bolder font-size-lg">NONE</span>
                    @else
                        <span class="text-muted font-weight-bolder font-size-lg"><a
                                href="{{ route('business.one', $tool['manufacturer_slug']) }}"
                                target="_blank">{{ $tool['manufacturer_id'] }}</a></span>
                    @endif
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">guarantee_date_end</span>
                    <span class="text-muted font-weight-bolder font-size-lg">@if(is_null($tool['guarantee_date_end']) || $tool['guarantee_date_end'] === '01/01/1970')
                            NONE @else {{ $tool['guarantee_date_end'] }} @endif</span>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">User add</span>
                    <span class="text-muted font-weight-bolder font-size-lg">
                        <a href="">
                        @if(is_null($tool['user_add_first_name'])) NONE @else {{ $tool['user_add_first_name'] }} @endif
                            @if(is_null($tool['user_add_last_name']))
                                NONE @else {{ $tool['user_add_last_name'] }} @endif</span>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">In_Object <button wire:click="selectModal('changeObject')" class="btn btn-icon btn-warning btn-xs"><i class="flaticon2-edit"></i></button></span>
                    <span class="text-muted font-weight-bolder font-size-lg">
                        @if($get_global_status_table === config('klikbud.status_tools_table.object'))
                            @forelse($objects as $object)
                                @if((int)$get_global_status_table_id === (int)$object->id)
                                    <a href="">{{ $object->title }}</a>
                                    @break
                                @endif
                            @empty
                                NONE
                            @endforelse
                        @else
                        NONE
                        @endif
                    </span>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">In_Warehouse <button wire:click="selectModal('changeWarehouse')" class="btn btn-icon btn-warning btn-xs"><i class="flaticon2-edit"></i></button></span>
                    <span class="text-muted font-weight-bolder font-size-lg">
                        @if($get_global_status_table === config('klikbud.status_tools_table.warehouse'))
                            @forelse($warehouses as $warehouse)
                                @if((int)$get_global_status_table_id === (int)$warehouse->id)
                                    <a href="">{{ $warehouse->title }} @empty($warehouse->square) @else - ({{ $warehouse->square }} m2) @endempty</a>
                                    @break
                                @endif
                            @empty
                                NONE
                            @endforelse
                        @else
                            NONE
                        @endif
                    </span>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">In_Client <button wire:click="selectModal('changeClient')" class="btn btn-icon btn-warning btn-xs"><i class="flaticon2-edit"></i></button></span>
                    <span class="text-muted font-weight-bolder font-size-lg">
                         @if($get_global_status_table === config('klikbud.status_tools_table.client'))
                            @forelse($clients as $client)
                                @if((int)$get_global_status_table_id === (int)$client->id)
                                    <a href="">{{ $client->first_name }} {{ $client->last_name }}</a>
                                    @break
                                @endif
                            @empty
                                NONE
                            @endforelse
                        @else
                            NONE
                        @endif
                    </span>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="mb-8 d-flex flex-column">
                    <span class="text-dark font-weight-bold mb-4">In_Business <button wire:click="selectModal('changeBusiness')" class="btn btn-icon btn-warning btn-xs"><i class="flaticon2-edit"></i></button></span>
                    <span class="text-muted font-weight-bolder font-size-lg">
                        @if($get_global_status_table === config('klikbud.status_tools_table.business'))
                            @forelse($business as $item)
                                @if((int)$get_global_status_table_id === (int)$item->id)
                                    <a href="">{{ $item->title }}</a>
                                    @break
                                @endif
                            @empty
                                NONE
                            @endforelse
                        @else
                            NONE
                        @endif
                    </span>
                </div>
            </div>
            {{--<!--end::Info-->--}}
        </div>
        {{--<!--begin::Buttons-->--}}
        <div class="d-flex">
            @if(!is_null($tool['guarantee_file']))
            <a href="{{ route('download', $tool['guarantee_file_id'] ) }}" class="btn btn-primary font-weight-bolder mr-6 px-6 font-size-sm" target="_blank"><i
                    class="flaticon2-download"></i>Download Guarantee File
            </a>
            @endif
            @if(!is_null($tool['image']))
            <a href="{{ route('download', $tool['image_id'] ) }}" class="btn btn-light-primary font-weight-bolder  mr-6 px-6 font-size-sm" target="_blank"><i
                    class="flaticon2-download-1"></i>Download Image
            </a>
            @endif
        </div>
        {{--<!--end::Buttons-->--}}
        @include('livewire.warehouses.tools.block.show.status-change-modal')
        @include('livewire.warehouses.tools.block.show.change-box-modal')
        @include('livewire.warehouses.tools.block.show.change-global-status-business')
        @include('livewire.warehouses.tools.block.show.change-global-status-warehouse')
        @include('livewire.warehouses.tools.block.show.change-global-status-client')
        @include('livewire.warehouses.tools.block.show.change-global-status-object')
        @include('livewire.warehouses.tools.block.show.delete-modal')
    </div>
</div>
