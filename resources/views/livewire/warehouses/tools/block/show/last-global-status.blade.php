@if(count($register_status_global))
<div class="card card-custom">
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Status globalny</span>
        </h3>
    </div>
    <div class="card-body py-0">
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                <thead>
                <tr class="text-left">
                    <th class="pl-0" style="min-width: 20px">ID</th>
                    <th style="min-width: 110px">Gdzie?</th>
                    <th style="min-width: 120px">Data</th>
                    <th style="min-width: 120px">Różnica</th>
                    <th style="min-width: 120px">Status</th>
                </tr>
                </thead>
                <tbody>
                @forelse($register_status_global as $status)
                <tr>
                    <td class="pl-0">
                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $status->id }}</a>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                            @if($status->table == config('klikbud.status_tools_table.box'))
                                @foreach($get_box as $box)
                                    @if($box->id === $status->table_id)
                                        <a href="{{ route('warehouses.tools.one', $box->slug) }}">{{ $box->title }}</a>
                                      @break
                                    @endif
                                @endforeach
                            @endif

                                @if($status->table == config('klikbud.status_tools_table.business'))
                                    @foreach($business as $item)
                                        @if($item->id === $status->table_id)
                                            <a href="{{ route('business.one', $item->slug) }}" target="_blank">{{ $item->title }}</a>
                                            @break
                                        @endif
                                    @endforeach
                                @endif

                                @if($status->table == config('klikbud.status_tools_table.client'))
                                    @foreach($clients as $item)
                                        @if($item->id === $status->table_id)
                                            <a href="{{ route('clients.one', $item->slug) }}" target="_blank">{{ $item->first_name }} {{ $item->last_name }}</a>
                                            @break
                                        @endif
                                    @endforeach
                                @endif

                                @if($status->table == config('klikbud.status_tools_table.object'))
                                    @foreach($objects as $item)
                                        @if($item->id === $status->table_id)
                                            <a href="{{ route('objects.one', $item->slug) }}" target="_blank">{{ $item->title }}</a>
                                            @break
                                        @endif
                                    @endforeach
                                @endif

                                @if($status->table == config('klikbud.status_tools_table.warehouse'))
                                    @foreach($warehouses as $item)
                                        @if($item->id === $status->table_id)
                                            <a href="" target="_blank">{{ $item->title }}</a>
                                            @break
                                        @endif
                                    @endforeach
                                @endif
                        </span>
                        <span class="text-muted font-weight-bold">
                            @if($status->table == config('klikbud.status_tools_table.box'))
                                Skrzynia
                            @endif
                                @if($status->table == config('klikbud.status_tools_table.warehouse'))
                                    Magazyn
                                @endif
                                @if($status->table == config('klikbud.status_tools_table.object'))
                                    Obiekt
                                @endif
                                @if($status->table == config('klikbud.status_tools_table.client'))
                                    Client
                                @endif
                                @if($status->table == config('klikbud.status_tools_table.business'))
                                    Business
                                @endif
                        </span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Początek: {{ \Carbon\Carbon::parse($status->created_at)->format('H:i:s d/m/Y')}} |
                            <a href="">
                                @empty($status->user_add->name) NULL @else {{ $status->user_add->name }} @endempty
                                @empty($status->user_add->surname) NULL @else {{ $status->user_add->surname }} @endempty
                            </a>
                        </span>
                        @if($status->created_at != $status->updated_at)
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Koniec: {{ \Carbon\Carbon::parse($status->updated_at)->format('H:i:s d/m/Y')}} |
                             <a href="">{{ $status->user_update->name }} {{ $status->user_update->surname }}</a>
                            </span>
                        @else
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">W procesie</span>
                        @endif
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                             @if($status->created_at != $status->updated_at)
                                     {{ $status->created_at->diffInDays($status->updated_at)}} Dni
                                 @else
                                    {{ $status->created_at->diffInDays(\Carbon\Carbon::now())}} Dni
                             @endif
                        </span>
                    </td>
                    <td>
                        @if($status->status_id === 1)
                            <span class="label label-lg label-light-success label-inline">W procesie</span>
                        @else
                            <span class="label label-lg label-light-danger label-inline">Zakonczono</span>
                        @endif
                    </td>
                    <td class="pr-0 text-right">
                    </td>
                </tr>
                    @empty
                 @endforelse
                </tbody>
            </table>
            {{ $register_status_global->links('vendor.livewire.bootstrap') }}
        </div>
    </div>
</div>
@endif
