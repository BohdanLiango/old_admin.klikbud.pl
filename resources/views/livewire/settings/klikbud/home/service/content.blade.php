<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            @include('livewire.settings.klikbud.home.service.widget')
            @if($count > 0)
                <div class="form-group col-xl-6">
                    <label>{{ trans('admin_klikbud/settings/klikbud/service.show.search') }}</label>
                    <input wire:model="searchQuery" class="form-control"/>
                </div>
                <div class="form-group col-xl-6">
                    <label>{{ trans('admin_klikbud/settings/klikbud/service.show.status') }}</label>
                    <select wire:model="searchStatus" class="form-control ">
                        @forelse($status_to_main_page as $status)
                        <option value="{{ $status['value'] }}">{{ $status['title'] }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            @endif
            @forelse($services as $service)
                <div class="col-xl-4 col-sm-4">
{{--                    <!--begin::Forms Widget 4-->--}}
                    <div class="card card-custom gutter-b">
{{--                        <!--begin::Body-->--}}
                        <div class="card-body">
{{--                            <!--begin::Top-->--}}
                            <div class="d-flex align-items-center">
{{--                                <!--begin::Symbol-->--}}
                                <div class="symbol symbol-40 symbol-light-success mr-5">
                                    <span class="symbol-label"><img src="" class="h-75 align-self-end" alt=""/></span>
                                </div>
{{--                                <!--end::Symbol-->--}}
{{--                                <!--begin::Info-->--}}
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#"
                                       class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $service->user_details->name }}
                                        {{ $service->user_details->surname }}</a>
                                    <span class="text-muted font-weight-bold">{{ $service->created_at }}</span>
                                </div>
{{--                                <!--end::Info-->--}}
{{--                                <!--begin::Dropdown-->--}}
                                <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions"
                                     data-placement="left">
                                    <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
{{--                                        <!--begin::Navigation-->--}}
                                        <ul class="navi navi-hover">
                                            <li class="navi-header font-weight-bold py-4">
                                                <span class="font-size-lg">{{ trans('admin_klikbud/settings/klikbud/service.show.dropdown.status') }}:</span>
                                            </li>
                                            <li class="navi-separator mb-3 opacity-70"></li>
                                            @if($service->status_to_main_page_id === config('klikbud.klikbud.status_to_main_page.not_visible'))
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link"
                                                       wire:click="changeStatusToMainPage({{ $service->id }}, {{ config('klikbud.klikbud.status_to_main_page.visible') }})">
                                                        <span class="navi-text"><span
                                                                class="label label-xl label-inline label-light-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</span></span></a>
                                                </li>
                                            @endif
                                            @if($service->status_to_main_page_id === config('klikbud.klikbud.status_to_main_page.visible'))
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link"
                                                       wire:click="changeStatusToMainPage({{ $service->id}}, {{ config('klikbud.klikbud.status_to_main_page.not_visible') }})">
                                                        <span class="navi-text"><span
                                                                class="label label-xl label-inline label-light-danger">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</span></span></a>
                                                </li>
                                            @endif
                                            <hr>
                                            <li class="navi-header font-weight-bold py-4">
                                                <span class="font-size-lg">{{ trans('admin_klikbud/settings/klikbud/service.show.dropdown.other') }}:</span>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('settings.klikbud.home.service.show', $service->id) }}"  class="navi-link"><span class="navi-text"><span class="label label-xl label-inline label-light-success">
                                                            {{ trans('admin_klikbud/settings/klikbud/service.show.dropdown.open') }}
                                                        </span></span></a>
                                            </li>

                                            <li class="navi-item">
                                                <a href="{{ route('settings.klikbud.home.service.edit', $service->id) }}"  class="navi-link"><span class="navi-text"><span class="label label-xl label-inline label-light-primary">
                                                            {{ trans('admin_klikbud/settings/klikbud/service.show.dropdown.edit') }}
                                                        </span></span></a>
                                            </li>
                                            @if($service->image !== NULL)
                                            <li class="navi-item">
                                                <a href="{{ route('download', $service->image_id) }}" class="navi-link"><span class="navi-text">
                                                        <span class="label label-xl label-inline label-light-dark">{{ trans('admin_klikbud/settings/klikbud/service.show.dropdown.download_image') }}</span></span></a>
                                            </li>
                                            @endif
                                        </ul>
{{--                                        <!--end::Navigation-->--}}
                                    </div>
                                </div>
{{--                                <!--end::Dropdown-->--}}
                            </div>
{{--                            <!--end::Top-->--}}
{{--                            <!--begin::Bottom-->--}}
                            <div class="pt-4">
{{--                                <!--begin::Image-->--}}
                                <a href="{{ route('settings.klikbud.home.service.show', [$service->id]) }}">
                                    @if($service->image !== NULL)
                                    <div class="bgi-no-repeat bgi-size-cover rounded min-h-225px"
                                     style="background-image: url({{ asset(Storage::url($service->image->path)) }})">
                                    </div>
                                    @else
                                        <div class="bgi-no-repeat bgi-size-cover rounded min-h-225px"
                                             style="background-image: url({{ asset('media/static/service.jpg') }})">
                                        </div>
                                    @endif
                                </a>
{{--                                <!--end::Image-->--}}
{{--                                <!--begin::Text-->--}}
                                <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2">

                                </p>
{{--                                <!--end::Text-->--}}
{{--                                <!--begin::Action-->--}}
                                <div class="d-flex align-items-center">
                                    <p>{{ trans('admin_klikbud/settings/klikbud/service.show.status') }}:
                                        @forelse($status_to_main_page as $item)
                                            @if($service->status_to_main_page_id === $item['value'])
                                                <span
                                                    class="label label-inline  mb-1 label-{{ $item['class'] }} ">{{ $item['title'] }}</span>
                                                @break
                                            @endif
                                        @empty
                                        @endforelse
                                    </p>
                                </div>
{{--                                <!--end::Action-->--}}
                            </div>
{{--                            <!--end::Bottom-->--}}
{{--                            <!--begin::Separator-->--}}
                            <div class="separator separator-solid mt-2 mb-4"></div>
{{--                            <!--end::Separator-->--}}
                            <a href="{{ route('settings.klikbud.home.service.show', $service->id) }}"><p><b>PL:</b> {{ $service->title['pl'] }}</p></a>
                        </div>
{{--                        <!--end::Body-->--}}
                    </div>
{{--                    <!--end::Forms Widget 4-->--}}
                </div>
            @empty
                <div class="col-xl-4 col-sm-4" wire:loading.remove>
                   {{ trans('admin_klikbud/settings/klikbud/service.show.dont_anything_information') }}
                </div>
            @endforelse
        </div>
        {{--<!--begin::Pagination-->--}}
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap py-2 mr-3">
                {{ $services->links('vendor.livewire.bootstrap') }}
            </div>
        </div>
        {{--<!--end:: Pagination-->--}}
    </div>
</div>
