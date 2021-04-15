<div class="row">
    @forelse($clients as $client)
    <div class="col-xl-4">
        <div class="card card-custom gutter-b card-stretch">
            <div class="card-body pt-4 d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center mb-7">
                    <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                        <div class="symbol symbol-lg-75">
                            <span class="symbol symbol-35 symbol-light-success">
                                <span class="symbol-label font-size-h5 font-weight-bold">{{ Str::title($client->first_name[0]) }}.{{ Str::title($client->last_name[0]) }}.</span>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="{{ route('clients.one', $client->slug) }}" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ Str::title($client->first_name) }} {{ Str::title($client->last_name) }}</a>
{{--                        <span class="text-muted font-weight-bold">Head of Development</span>--}}
                        @forelse($client_status as $status)
                            @if($status['value'] === $client->status_id)
                                <span class="font-weight-bold {{ $status['class'] }}">{{ $status['title'] }}</span>
                                @break
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="mb-7">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('admin_klikbud/clients.index.email') }}:</span>
                        @forelse($client->email as $email)
                        <a href="#" class="text-muted text-hover-primary">
                            @if($loop->last)
                                {{ $email }}
                                @break
                            @endif
                        </a>
                        @empty
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-between align-items-cente my-1">
                        <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('admin_klikbud/clients.index.phone') }}:</span>
                        @forelse($client->mobile as $mobile)
                            <a href="#" class="text-muted text-hover-primary">
                                @if($loop->last)
                                    {{ $mobile }}
                                    @break
                                @endif
                            </a>
                        @empty
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('admin_klikbud/clients.index.location') }}:</span>
                        <span class="text-muted font-weight-bold">
                            @empty($client->country_id)
                            @else
                            {{ $client->country->title }}
                            @endempty
                        </span>
                    </div>
                </div>
                <a href="{{ route('clients.one', $client->slug) }}" class="btn btn-block btn-sm btn-light-primary font-weight-bolder text-uppercase py-4">{{ trans('admin_klikbud/clients.index.details') }}</a>
            </div>
        </div>
    </div>
    @empty
    @endforelse
</div>
