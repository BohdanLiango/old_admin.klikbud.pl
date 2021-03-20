<div class="row">
    <div class="col-xl-6">
        <div class="card card-custom gutter-b" style="height: 200px;">
            <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center justify-content-between flex-grow-1">
                    <div class="mr-2">
                        <h3 class="font-weight-bolder">{{ trans('admin_klikbud/clients.widget.all_client') }}</h3>
                        <div class="text-muted font-size-lg mt-2"></div>
                    </div>
                    <div class="font-weight-boldest font-size-h1 text-success">{{ $count_all }}</div>
                </div>
                <div class="pt-8">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="text-muted font-weight-bold mr-2"></div>
                        <div class="text-muted font-weight-bold">100%</div>
                    </div>
                    <div class="progress bg-light-success progress-xs">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-custom card-stretch gutter-b">
            <div class="card-body d-flex p-0">
                <div class="flex-grow-1 bg-danger p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url({{ asset('media/svg/humans/custom-3.svg') }})">
                    <h4 class="text-inverse-danger mt-2 font-weight-bolder">{{ trans('admin_klikbud/clients.widget.form_add_title') }}</h4>
                    <p class="text-inverse-danger my-6">{{ trans('admin_klikbud/clients.widget.add_info') }}</p>
                    <a href="{{ route('clients.add') }}" class="btn btn-primary font-weight-bold py-2 px-6">{{ trans('admin_klikbud/clients.widget.add_new') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-custom card-stretch gutter-b">
            <div class="card-body d-flex p-0 card-rounded">
                <div class="flex-grow-1 p-10 card-rounded flex-grow-1 bgi-no-repeat" style="background-color: #663259; background-position: calc(100% + 0.5rem) bottom; background-size: auto 75%; background-image: url({{ asset('media/svg/humans/custom-4.svg') }})">
                    <h4 class="text-inverse-danger mt-2 font-weight-bolder"><a href="#" wire:click="searchStatusNull()">{{ trans('admin_klikbud/clients.widget.status_title') }}</a></h4>
                    <div class="mt-5">
                        @forelse($client_status as $status)
                        <div class="d-flex">
                            <span class="svg-icon svg-icon-md svg-icon-white flex-shrink-0 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                    </g>
                                </svg>
                            </span>
                            <span class="text-white"><a href="#" wire:click="searchStatusData({{ $status['value'] }})">{{ $status['title'] }} ({{ $count_status[$status['value'] - 1] }})</a></span>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
