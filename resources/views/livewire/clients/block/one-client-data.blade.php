<div class="card card-custom">
    <div class="card-header h-auto py-4">
        <div class="card-title">
            <h3 class="card-label">Info</h3>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-default btn-sm font-weight-bold" data-toggle="dropdown">
                <i class="flaticon2-gear"></i>Add</a>
            <div class="dropdown-menu dropdown-menu-right p-0 m-0 dropdown-menu-md">
                <ul class="navi navi-hover py-5">
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-email"></i>
                            </span>
                            <span class="navi-text">New Email</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-phone"></i>
                            </span>
                            <span class="navi-text">New Phone</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-plus"></i>
                            </span>
                            <span class="navi-text">New Language</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body py-4">

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Mobile:</label>
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
            <label class="col-4 col-form-label">E-mail:</label>
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
            <label class="col-4 col-form-label">TimeZone:</label>
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
            <label class="col-4 col-form-label">Site:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                    <a href="{{ $site }}" target="_blank">{{ $site }}</a>
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Languages:</label>
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
            <label class="col-4 col-form-label">Kraj:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                   {{ $country_title }}
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Wojew:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                   {{ $state_title }}
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Town:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                   {{ $town_title }}
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Street:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                   {{ $street_title }} @empty($number_house) @else  {{ $number_house }} @endempty @empty($number_flat) @else / {{ $number_flat }} @endempty
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Zip Code:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                   {{ $zip_code }}
                </span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Dodatkowe Info:</label>
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
