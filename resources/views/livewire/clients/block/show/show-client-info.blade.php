<div class="card card-custom gutter-b">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-shrink-0 mr-7">
                <div class="symbol symbol-50 symbol-lg-120">
                   <span class="symbol symbol-35 symbol-light-success">
                       <span class="symbol-label font-size-h5 font-weight-bold">{{ Str::title($first_name[0]) }}.{{ Str::title($last_name[0]) }}.</span>
                   </span>
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="mr-3">
                        <div class="d-flex align-items-center mr-3">
                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $first_name }} {{ $last_name }}</a>
                            @forelse($client_status as $status)
                                @if($status['value'] === $status_id)
                                        <span class="{{ $status['class'] }} label-inline font-weight-bolder mr-1">{{ $status['title'] }}</span>
                                    @break
                                @endif
                                @empty
                            @endforelse
                            <div class="dropdown dropdown-inline" data-toggle="tooltip"  data-placement="left">
                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                    <ul class="navi navi-hover">
                                        <li class="navi-header font-weight-bold py-4">
                                            <span class="font-size-lg">{{ trans('admin_klikbud/clients.one.choose_label') }}:</span>
                                        </li>
                                        <li class="navi-separator mb-3 opacity-70"></li>
                                        <li class="navi-item">
                                            @forelse($client_status as $status)
                                                @if($status['value'] === $status_id)
                                                    @else
                                                    <a href="#" wire:click="changeStatus({{ $status['value'] }})" class="navi-link">
                                                        <span class="navi-text">
                                                            <span class="{{ $status['class'] }}">{{ $status['title'] }}</span>
                                                        </span>
                                                    </a>
                                                @endif
                                                @empty
                                            @endforelse
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap my-2">
                            @empty($email)
                            @else
                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" /><circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" /></g></svg>
                                </span>
                            @forelse($email as $item)
                                @if($loop->first)
                                    {{ $item }}
                                @break
                                @endif
                            @empty
                            @endforelse
                            </a>
                            @endempty
                            @empty($gender_id)
                            @else
                            <a href="#" class="text-muted text-hover-primary font-weight-bold" style="margin-right: 20px">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1" ><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M12,3 C16.418278,3 20,6.581722 20,11 L20,21 C20,21.5522847 19.5522847,22 19,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,11 C4,6.581722 7.581722,3 12,3 Z M9,10 C7.34314575,10 6,11.3431458 6,13 C6,14.6568542 7.34314575,16 9,16 L15,16 C16.6568542,16 18,14.6568542 18,13 C18,11.3431458 16.6568542,10 15,10 L9,10 Z" fill="#000000"/><path d="M15,14 C14.4477153,14 14,13.5522847 14,13 C14,12.4477153 14.4477153,12 15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 Z M9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 C9.55228475,12 10,12.4477153 10,13 C10,13.5522847 9.55228475,14 9,14 Z" fill="#000000" opacity="0.3"/></g></svg>
                                </span>
                                @forelse($client_gender as $item)
                                    @if((int)$item['value'] === (int)$gender_id)
                                        {{ $item['title'] }}
                                    @endif
                                    @empty
                                @endforelse
                            </a>
                            @endempty
                            @empty($country_title)
                            @else
                            <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" /></g></svg>
                                </span>{{ $country_title }}
                            </a>
                            @endempty
                        </div>
                    </div>
                    <div class="mb-10">
                        <a href="{{ route('clients.edit', $client_slug) }}" class="btn btn-sm btn-light-warning font-weight-bolder text-uppercase mr-2">{{ trans('admin_klikbud/clients.one.buttons.edit') }}</a>
                        <a href="#" class="btn btn-sm btn-light-danger font-weight-bolder text-uppercase mr-2" wire:click="opensModals('delete')">{{ trans('admin_klikbud/clients.one.buttons.delete') }}</a>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-wrap justify-content-between">

                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                        @empty($client_communication)
                        @else
                        @forelse($communication as $item_1)
                            @foreach($client_communication as $item_2)
                                @if((int)$item_1 === (int)$item_2['value'])
                                    <i class="flaticon2-check-mark"></i> {{ $item_2['title'] }}
                                @endif
                            @endforeach
                            @empty
                        @endforelse
                        @endempty
                            <hr>
                        @empty($description) <p style="color: red">{{ trans('admin_klikbud/clients.one.dont_description') }}</p> @else{{ $description }}@endempty
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
