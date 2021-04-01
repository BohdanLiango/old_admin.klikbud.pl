<div class="card card-custom gutter-b">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-shrink-0 mr-7">
                <div class="symbol symbol-50 symbol-lg-120">
                    @empty($business['image_id'])
                        <span class="symbol symbol-35 symbol-light-success">
                       <span
                           class="symbol-label font-size-h5 font-weight-bold">{{ Str::title($business['title'][0]) }}</span>
                    </span>
                    @else
                        <img alt="Pic"
                             src="{{ Storage::disk(config('klikbud.disk_store'))->url($get_data->image->path) }}"/>
                    @endempty
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="mr-3">
                        <div class="d-flex align-items-center mr-3">
                            <a href="#"
                               class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $business['title'] }}
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
                                <span><i class="flaticon2-settings text-success  ml-2"></i> {{ trans('admin_klikbud/business.show.manufacturer') }}</span>
                            @endempty
                        </div>
                        <div class="d-flex flex-wrap my-4">
                            @empty($business['email'])
                            @else
                                <a href="#"
                                   class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none"
                                                                                                         stroke-width="1"
                                                                                                         fill="none"
                                                                                                         fill-rule="evenodd"><rect
                                                x="0" y="0" width="24" height="24"/><path
                                                d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                fill="#000000"/><circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5"
                                                                        r="2.5"/></g></svg>
                                </span>
                                    {{ $business['email'] }}
                                </a>
                            @endempty
                            @empty($business['phone'])
                            @else
                                <a href="#"
                                   class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-30-161050/theme/html/demo1/dist/../src/media/svg/icons/Devices/iPhone-X.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z"
            fill="#000000" opacity="0.3"/>
        <path
            d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z M8,1 L16,1 C17.5187831,1 18.75,2.23121694 18.75,3.75 L18.75,20.25 C18.75,21.7687831 17.5187831,23 16,23 L8,23 C6.48121694,23 5.25,21.7687831 5.25,20.25 L5.25,3.75 C5.25,2.23121694 6.48121694,1 8,1 Z M9.5,1.75 L14.5,1.75 C14.7761424,1.75 15,1.97385763 15,2.25 L15,3.25 C15,3.52614237 14.7761424,3.75 14.5,3.75 L9.5,3.75 C9.22385763,3.75 9,3.52614237 9,3.25 L9,2.25 C9,1.97385763 9.22385763,1.75 9.5,1.75 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                    {{ $business['phone'] }}
                                </a>
                            @endempty
                            @empty($business['site'])
                            @else
                                <a href="#"
                                   class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-30-161050/theme/html/demo1/dist/../src/media/svg/icons/Home/Earth.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="9"/>
        <path
            d="M11.7357634,20.9961946 C6.88740052,20.8563914 3,16.8821712 3,12 C3,11.9168367 3.00112797,11.8339369 3.00336944,11.751315 C3.66233009,11.8143341 4.85636818,11.9573854 4.91262842,12.4204038 C4.9904938,13.0609191 4.91262842,13.8615942 5.45804656,14.101772 C6.00346469,14.3419498 6.15931561,13.1409372 6.6267482,13.4612567 C7.09418079,13.7815761 8.34086797,14.0899175 8.34086797,14.6562185 C8.34086797,15.222396 8.10715168,16.1034596 8.34086797,16.2636193 C8.57458427,16.423779 9.5089688,17.54465 9.50920913,17.7048097 C9.50956962,17.8649694 9.83857487,18.6793513 9.74040201,18.9906563 C9.65905192,19.2487394 9.24857641,20.0501554 8.85059781,20.4145589 C9.75315358,20.7620621 10.7235846,20.9657742 11.7357634,20.9960544 L11.7357634,20.9961946 Z M8.28272988,3.80112099 C9.4158415,3.28656421 10.6744554,3 12,3 C15.5114513,3 18.5532143,5.01097452 20.0364482,7.94408274 C20.069657,8.72412177 20.0638332,9.39135321 20.2361262,9.6327358 C21.1131932,10.8600506 18.0995147,11.7043158 18.5573343,13.5605384 C18.7589671,14.3794892 16.5527814,14.1196773 16.0139722,14.886394 C15.4748026,15.6527403 14.1574598,15.137809 13.8520064,14.9904917 C13.546553,14.8431744 12.3766497,15.3341497 12.4789081,14.4995164 C12.5805657,13.664636 13.2922889,13.6156126 14.0555619,13.2719546 C14.8184743,12.928667 15.9189236,11.7871741 15.3781918,11.6380045 C12.8323064,10.9362407 11.963771,8.47852395 11.963771,8.47852395 C11.8110443,8.44901109 11.8493762,6.74109366 11.1883616,6.69207022 C10.5267462,6.64279981 10.170464,6.88841096 9.20435656,6.69207022 C8.23764828,6.49572949 8.44144409,5.85743687 8.2887174,4.48255778 C8.25453994,4.17415686 8.25619136,3.95717082 8.28272988,3.80112099 Z M20.9991771,11.8770357 C20.9997251,11.9179585 21,11.9589471 21,12 C21,16.9406923 17.0188468,20.9515364 12.0895088,20.9995641 C16.970233,20.9503326 20.9337111,16.888438 20.9991771,11.8770357 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                    {{ $business['site'] }}
                                </a>
                            @endempty

                            @empty($business['street_id'])
                            @else
                                <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none"
                                                                                                        stroke-width="1"
                                                                                                        fill="none"
                                                                                                        fill-rule="evenodd"><rect
                                                x="0" y="0" width="24" height="24"/><path
                                                d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z"
                                                fill="#000000"/></g></svg>
                                </span>{{ $get_data->country->title }} {{ trans('admin_klikbud/business.show.address.state') }}{{ $get_data->state->title }} {{ trans('admin_klikbud/business.show.address.town') }}{{ $get_data->town->title }} {{ trans('admin_klikbud/business.show.address.street') }}{{ $get_data->street->title }} {{ $business['number'] }} @empty($business['apartment_number']) @else
                                        / {{ $business['apartment_number'] }} @endempty {{ $business['zip_code'] }}
                                </a>
                            @endempty
                        </div>
                    </div>
                    <div class="mb-9">
                        <a href="{{ route('business.edit', $business['slug']) }}" class="mr-2"><i
                                class="flaticon2-edit text-warning mr-2"></i></a>
                        @if(count($get_data->departments) == 0)
                            <a href="#" class="mr-2" wire:click="opensModals('delete', {{ $business['id'] }})"><i
                                    class="flaticon2-delete text-danger"></i></a>
                        @endif
                    </div>
                </div>
                <div class="d-flex align-items-center flex-wrap justify-content-between">
                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                        @empty($business['nip']) @else <i
                            class="flaticon2-check-mark text-success"></i> {{ trans('admin_klikbud/business.show.nip') }}
                        : {{ $business['nip'] }} @endempty
                        @empty($business['regon']) @else <i
                            class="flaticon2-check-mark text-success"></i> {{ trans('admin_klikbud/business.show.regon') }}
                        : {{ $business['regon'] }} @endempty
                        @empty($business['bdo']) @else <i
                            class="flaticon2-check-mark text-success"></i> {{ trans('admin_klikbud/business.show.bdo') }}
                        : {{ $business['bdo'] }} @endempty
                        <hr>
                        @empty($business['description'])  @else{{ $business['description'] }}@endempty
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
