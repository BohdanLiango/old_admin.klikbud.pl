@if(count($tools) !== 0)
    @foreach($tools as $tool)
    <div class="col-md-4 col-xxl-4 col-lg-12">
        <div class="card card-custom card-shadowless">
            <div class="card-body p-0">
                <div class="overlay">
                    <div class="overlay-wrapper rounded bg-light text-center">
                        @empty($tool->image_id)
                            <img src="{{ asset('media/static/no-image.jpg') }}" alt="" class="w-100  h-100 rounded" />
                        @else
                            <img src="{{ Storage::disk(config('klikbud.disk_store'))->url($tool->image->path) }}" alt="" class="w-100 h-100 rounded" />
                        @endempty
                    </div>
                    <div class="overlay-layer">
                        <a href="{{ route('warehouses.tools.one', $tool->slug) }}" class="btn font-weight-bolder btn-sm btn-info mr-1"><i class="fa fa-eye"></i></a>
                        @if($collect_items_cart->contains($tool->id) or $tool->box_id !== NULL)
                            @else
                        <a href="#" class="btn font-weight-bolder btn-sm btn-light-success mr-1" wire:click.prevent.lazy="addToolToCart({{ $tool->id }}, {{ json_encode($tool->box_id) }})"><i class="fa fa-cart-plus"></i></a>
                        @endif

                        @if($tool->is_box === 1)
                            <a href="#" wire:click.prevent="searchWhereBoxId({{ $tool->id }}, {{ json_encode($tool->title) }})" class="btn font-weight-bolder btn-sm btn-primary"><i class="fa fa-box-open"></i></a>
                        @endif
                    </div>
                </div>
                <div class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                    <a href="{{ route('warehouses.tools.one', $tool->slug) }}" class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">
                        @if($tool->status_table === NULL) <span class="label label-success label-xl">NEW!</span> @endif{{ $tool->title }}
                    </a>
                    <span class="font-size-lg">
                        @foreach($status as $item)
                            @if($item['value'] == $tool->status_tool_id)
                                    <span class="{{ $item['class'] }} label-xl">{{ $item['title'] }}</span>
                                @break
                            @endif
                        @endforeach
                        @php
                            $collect_history = collect($tool->registerHistoryTool);
                            $get_history_last_not_box = $collect_history->where('table', '!==', config('klikbud.status_tools_table.box'))->last();
                            $count_collect_history = count($collect_history);
                        @endphp
                            @empty($tool->box_id) @else <i class="flaticon2-box"></i> {{ $tool->box->title }} @endempty
                            @if($count_collect_history > 0 and !is_null($get_history_last_not_box))
                                @if($get_history_last_not_box->table === config('klikbud.status_tools_table.warehouse'))
                                    @foreach($warehouses as $ware)
                                        @if((int)$ware->id === (int)$get_history_last_not_box->table_id)
                                            <i class="flaticon2-box-1"></i> {{ $ware->title }}
                                        @endif
                                    @endforeach
                                @endif
                                @if($get_history_last_not_box->table === config('klikbud.status_tools_table.object'))
                                    @foreach($objects as $object)
                                        @if((int)$object->id === (int)$get_history_last_not_box->table_id)
                                                <i class="flaticon2-architecture-and-city"></i> {{ $object->title }}
                                        @endif
                                    @endforeach
                                @endif
                                    @if($get_history_last_not_box->table === config('klikbud.status_tools_table.client'))
                                        @foreach($clients as $client)
                                            @if((int)$client->id === (int)$get_history_last_not_box->table_id)
                                                <i class="flaticon2-group"></i> {{ Str::limit($client->first_name, 10) }} {{ Str::limit($client->last_name, 10) }}
                                            @endif
                                        @endforeach
                                    @endif
                                    @if($get_history_last_not_box->table === config('klikbud.status_tools_table.business'))
                                        @foreach($business as $buss)
                                            @if((int)$buss->id === (int)$get_history_last_not_box->table_id)
                                                <i class="flaticon-presentation"></i> {{ Str::limit($buss->title, 20) }}
                                            @endif
                                        @endforeach
                                    @endif
                            @endif
                    </span>
                    <span class="font-size-lg">
                        @empty($tool->main_category) @else <i class="flaticon2-check-mark"></i> {{ $tool->main_category->title }} @endempty
                            @empty($tool->half_category) @else | <i class="flaticon2-check-mark"></i> {{ $tool->half_category->title }} @endempty
                            @empty($tool->category) @else | <i class="flaticon2-check-mark"></i> {{ $tool->category->title }} @endempty
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif
