<div>
    <div class="flex-row-fluid ml-lg-8">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h3 text-dark">My Shopping Cart</span>
                </h3>
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline">
                        <a href="{{ route('warehouses.tools.show') }}" class="btn btn-primary font-weight-bolder font-size-sm">Powrót</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="text-center"></th>
                            <th class="text-right"></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tools as $tool)
                            <tr>
                                <td class="d-flex align-items-center font-weight-bolder">
                                    <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                        @empty($tool->image_id)
                                            <div class="symbol-label" style="background-image: url({{ asset('media/static/no-image.jpg') }})"></div>
                                                @else
                                            <div class="symbol-label" style="background-image: url({{ Storage::disk(config('klikbud.disk_store'))->url($tool->image->path) }})"></div>
                                        @endempty
                                    </div>
                                    <a href="{{ route('warehouses.tools.one', $tool->slug) }}" class="text-dark text-hover-primary" target="_blank">
                                        @if($tool->is_box === 1)
                                            <i class="flaticon2-open-box"></i>
                                        @else
                                            <i class="fas fa-wrench"></i>
                                        @endif
                                            {{ $tool->title }}
                                    </a>
                                </td>
                                <td class="text-center align-middle">
                                    <span class="mr-2 font-weight-bolder">
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
                                    </span>
                                </td>
                                <td class="text-right align-middle">
                                    <a href="#" class="btn btn-danger font-weight-bolder font-size-sm" wire:click.prevent="deleteItem({{ $tool->id }})">Remove</a>
                                </td>
                            </tr>
                            @empty
                        @endforelse
                        <tr>
                            <td colspan="2"></td>
                            <td class="font-weight-bolder font-size-h4 text-right">Subtotal</td>
                            <td class="font-weight-bolder font-size-h4 text-right">{{ count($tools) }} szt</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0 text-right pt-10">
                                <a href="#" class="btn btn-success font-weight-bolder px-8" wire:click.prevent="selectModal('openWarehouseModal')"><i class="flaticon2-box-1"></i>Move to Warehouse</a>
                                @include('livewire.warehouses.tools.cart.warehouses-modal')
                                <a href="#" class="btn btn-success font-weight-bolder px-8"><i class="flaticon2-architecture-and-city"></i>Move to Objects</a>
                                <a href="#" class="btn btn-success font-weight-bolder px-8"> <i class="flaticon2-group"></i>Move to Clients</a>
                                <a href="#" class="btn btn-success font-weight-bolder px-8"> <i class="flaticon-presentation"></i>Move to Business</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.addEventListener('openWarehouseModal', event => {
            $("#openWarehouseModal").modal('show')
        })
        window.addEventListener('closeWarehouseModal', event => {
            $("#closeWarehouseModal").modal('hide')
        })

        window.addEventListener('openObjectModal', event => {
            $("#openObjectModal").modal('show')
        })
        window.addEventListener('closeObjectModal', event => {
            $("#closeObjectModal").modal('hide')
        })

        window.addEventListener('openClientsModal', event => {
            $("#openClientsModal").modal('show')
        })
        window.addEventListener('closeClientsModal', event => {
            $("#closeClientsModal").modal('hide')
        })

        window.addEventListener('openBusinessModal', event => {
            $("#openBusinessModal").modal('show')
        })
        window.addEventListener('closeBusinessModal', event => {
            $("#closeBusinessModal").modal('hide')
        })
    </script>
</div>
