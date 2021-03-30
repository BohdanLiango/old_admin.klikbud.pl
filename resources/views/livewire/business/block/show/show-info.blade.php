<div class="card card-custom gutter-b">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-shrink-0 mr-7">
                <div class="symbol symbol-50 symbol-lg-120">
                    @empty($business['image_id'])
                    <span class="symbol symbol-35 symbol-light-success">
                       <span class="symbol-label font-size-h5 font-weight-bold">{{ Str::title($business['title'][0]) }}</span>
                    </span>
                    @else
                        <img alt="Pic" src="{{ Storage::disk(config('klikbud.disk_store'))->url($get_data->image->path) }}" />
                    @endempty
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="mr-3">
                        <div class="d-flex align-items-center mr-3">
                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $business['title'] }}
                                @forelse($business_form as $form)
                                    @if((int)$form['value'] === (int)$business['business_form_id'])
                                        @if((int)$business['business_form_id'] === 99)
                                            {{ $business['business_form_other'] }}
                                        @else
                                            {{ $form['title'] }}
                                        @endif
                                        @break
                                    @endif
                                @empty
                                @endforelse
                            </a>
                            @forelse($types as $item)
                                @if((int)$business['type_id'] === (int)$item['value'])
                                        <span class="{{ $item['class'] }} mr-1">{{ $item['title'] }}</span>
                                    @break
                                @endif
                                @empty
                            @endforelse
                            @forelse($categories as $category)
                                @if($business['category_id'] === (int)$category['value'])
                                     <span class="{{ $category['class'] }} ml-2">{{ $category['title'] }}</span>
                                    @break
                                @endif
                                @empty
                            @endforelse
                            @empty($business['is_manufacturer'])
                            @else
                                <span><i class="flaticon2-settings text-success  ml-2"></i> Виробник</span>
                            @endempty
                        </div>
                        <div class="d-flex flex-wrap my-4">
                            @empty($business['email'])
                            @else
                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" /><circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" /></g></svg>
                                </span>
                                {{ $business['email'] }}
                            </a>
                            @endempty
                                @empty($business['phone'])
                                @else
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" /><circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" /></g></svg>
                                </span>
                                        {{ $business['phone'] }}
                                    </a>
                                @endempty
                                @empty($business['site'])
                                @else
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" /><circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" /></g></svg>
                                </span>
                                        {{ $business['site'] }}
                                    </a>
                                @endempty

                            @empty($business['street_id'])
                            @else
                            <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" /></g></svg>
                                </span>{{ $get_data->country->title }} woj.{{ $get_data->state->title }} m.{{ $get_data->town->title }} ul.{{ $get_data->street->title }} {{ $business['number'] }} @empty($business['apartment_number']) @else  / {{ $business['apartment_number'] }} @endempty {{ $business['zip_code'] }}
                            </a>
                            @endempty
                        </div>
                    </div>
                    <div class="mb-9">
                        <a href="{{ route('business.edit', $business['slug']) }}" class="btn btn-sm btn-light-warning font-weight-bolder text-uppercase mr-2">{{ trans('admin_klikbud/clients.one.buttons.edit') }}</a>
{{--                        @if(count($get_data->departments) == 0)--}}
                        <a href="#" class="btn btn-sm btn-light-danger font-weight-bolder text-uppercase mr-2" wire:click="opensModals('delete', {{ $business['id'] }})">{{ trans('admin_klikbud/clients.one.buttons.delete') }}</a>
{{--                        @endif--}}
                    </div>
                </div>
                <div class="d-flex align-items-center flex-wrap justify-content-between">
                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                        @empty($business['nip']) @else <i class="flaticon2-check-mark text-success"></i> NIP : {{ $business['nip'] }} @endempty
                            @empty($business['regon']) @else <i class="flaticon2-check-mark text-success"></i> REGON : {{ $business['regon'] }} @endempty
                            @empty($business['bdo']) @else <i class="flaticon2-check-mark text-success"></i> BDO : {{ $business['bdo'] }} @endempty
                            <hr>
                        @empty($business['description'])  @else{{ $business['description'] }}@endempty
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
