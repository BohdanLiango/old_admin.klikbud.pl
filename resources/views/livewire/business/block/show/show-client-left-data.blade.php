<div class="card card-custom">
    <div class="card-header h-auto py-4">
        <div class="card-title">
            <h3 class="card-label">{{ trans('admin_klikbud/clients.one.info') }}</h3>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-default btn-sm font-weight-bold" data-toggle="dropdown">
                <i class="flaticon2-gear"></i>{{ trans('admin_klikbud/clients.one.add') }}</a>
            <div class="dropdown-menu dropdown-menu-right p-0 m-0 dropdown-menu-md">
                <ul class="navi navi-hover py-5">
                    <li class="navi-item">
                        <a href="#" class="navi-link" wire:click="openAddModal('email')">
                            <span class="navi-icon">
                                <i class="flaticon2-email"></i>
                            </span>
                            <span class="navi-text">{{ trans('admin_klikbud/clients.one.buttons.new_email') }}</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link" wire:click="openAddModal('number')">
                            <span class="navi-icon">
                                <i class="flaticon2-phone"></i>
                            </span>
                            <span class="navi-text">{{ trans('admin_klikbud/clients.one.buttons.new_phone') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body py-4">

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">{{ trans('admin_klikbud/clients.one.mobile') }}:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                   @forelse($mobile as $item)
                       {{ $item }} <br>
                   @empty
                   @endforelse
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">{{ trans('admin_klikbud/clients.one.email') }}:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                    @forelse($email as $item)
                        {{ $item }} <br>
                        @empty
                    @endforelse
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">{{ trans('admin_klikbud/clients.one.time_zone') }}:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                    @empty($timezone)
                    @else
                    @forelse($client_time_zone as $zone)
                        @if($zone['value'] == $timezone)
                            {{ $zone['title'] }}
                            @break
                        @endif
                    @empty
                    @endforelse
                    @endempty
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">{{ trans('admin_klikbud/clients.one.site') }}:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                    <a href="{{ $site }}" target="_blank">{{ $site }}</a>
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">{{ trans('admin_klikbud/clients.one.language') }}:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                    @empty($language)
                    @else
                        @forelse($client_languages as $item)
                            @foreach($language as $lang)
                                @if($item['value'] == $lang)
                                    {{ $item['title'] }} <br>
                                @endif
                            @endforeach
                        @empty
                        @endforelse
                    @endempty
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">{{ trans('admin_klikbud/clients.one.country') }}:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                   {{ $country_title }}
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">{{ trans('admin_klikbud/clients.one.state') }}:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                   {{ $state_title }}
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">{{ trans('admin_klikbud/clients.one.town') }}:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                   {{ $town_title }}
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">{{ trans('admin_klikbud/clients.one.street') }}:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                   {{ $street_title }} @empty($number_house) @else  {{ $number_house }} @endempty @empty($number_flat) @else / {{ $number_flat }} @endempty
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">{{ trans('admin_klikbud/clients.one.zip_code') }}:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                   {{ $zip_code }}
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">{{ trans('admin_klikbud/clients.one.additional_info') }}:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                   {{ $add_info_address }}
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Suma z obiektów:</label>
            <div class="col-8">
                coming soon...
                {{--														<span class="form-control-plaintext">--}}
                {{--														<span class="font-weight-bolder">345,000M</span>&#160;--}}
                {{--														<span class="label label-inline label-danger label-bold">Q4, 2019</span></span>--}}
            </div>
        </div>
    </div>
</div>
