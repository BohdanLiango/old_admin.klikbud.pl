<div>
    {{--<!--begin::Card-->--}}
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{ trans('admin_klikbud/settings/address.card-lable') }}
                    <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('dashboard') }}" class="btn btn-primary font-weight-bolder" style="margin-right: 10px"><i class="flaticon2-back"></i>{{ trans('admin_klikbud/settings/address.button-back') }}</a>
                <a href="{{ route('settings.address.add', 4) }}" class="btn btn-success font-weight-bolder" style="margin-right: 10px"><i class="flaticon2-plus"></i>{{ trans('admin_klikbud/settings/address.add-button-street') }}</a>
                <a href="{{ route('settings.address.add', 3) }}" class="btn btn-success font-weight-bolder" style="margin-right: 10px"><i class="flaticon2-plus"></i>{{ trans('admin_klikbud/settings/address.add-button-town') }}</a>
                <a href="{{ route('settings.address.add', 2) }}" class="btn btn-success font-weight-bolder" style="margin-right: 10px"><i class="flaticon2-plus"></i>{{ trans('admin_klikbud/settings/address.add-button-state') }}</a>
            </div>
        </div>
            <div class="card-body">
                <div class="form-group col-xl-6 float-left">
                    <label>{{ trans('admin_klikbud/settings/address.search') }}</label>
                    <input wire:model="searchQuery" class="form-control" />
                </div>
                <div class="form-group col-xl-6 float-left">
                    <label>{{ trans('admin_klikbud/settings/address.type') }}</label>
                    <select wire:model="searchType" class="form-control">
                        <option value="{{ NULL }}">-----------</option>
                        @forelse($types as $type)
                            <option value="{{ $type['value'] }}">{{ $type['title'] }} -
                              {{ $count_types[(int)$type['value'] - 1] }}
                            </option>
                            @empty
                        @endforelse
                    </select>
                </div>
                <div class="mb-7"></div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">{{ trans('admin_klikbud/settings/address.id') }}</th>
                        <th scope="col">{{ trans('admin_klikbud/settings/address.title') }}</th>
                        <th scope="col">{{ trans('admin_klikbud/settings/address.type') }}</th>
                        <th scope="col">{{ trans('admin_klikbud/settings/address.address') }}</th>
                        <th scope="col">{{ trans('admin_klikbud/settings/address.info') }}</th>
                        <th scope="col">{{ trans('admin_klikbud/settings/address.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($address as $add)
                        <tr>
                            <th scope="row">{{ $add->id }}</th>
                            <td>{{ $add->title }}</td>
                            <td>
                                @foreach($types as $type)
                                    @if($type['value'] == $add->type_id)
                                        <span class = "{{ $type['class'] }}">{{ $type['title'] }}</span>
                                        @break
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if($add->type_id !== 1)
                                @if($add->type_id === 2 || 3 || 4)
                                    {{ $add->country->title }}
                                @endif

                                @if($add->type_id === 3 || 4 and $add->type_id !== 2)
                                        /
                                    {{ $add->state->title }}
                                @endif

                                @if($add->type_id === 4)
                                        /
                                    {{ $add->city->title }}
                                @endif
                                @endif
                            </td>
                            <td>
                                {{ $add->user->name }} {{ $add->user->surname }}
                                <br>
                                {{ date("H:i:s d/m/Y", strtotime($add->created_at)) }}
                            </td>
                            <td>
                                <a href="{{ route('settings.address.edit', $add->id) }}" class="btn btn-icon btn-warning"><i class="flaticon2-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $address->links('vendor.livewire.bootstrap') }}
            </div>
    </div>
    {{--<!--end::Card-->--}}
</div>
