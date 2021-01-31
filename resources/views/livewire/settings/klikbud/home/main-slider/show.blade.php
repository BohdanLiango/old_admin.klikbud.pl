<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            @include('livewire.settings.klikbud.home.main-slider.widget')
            @include('livewire.settings.klikbud.session-flash-alert')
            @if($count > 0)
                    <div class="form-group col-xl-6">
                        <label>{{ trans('admin_klikbud/settings/klikbud/main-slider.show.search') }}</label>
                        <input wire:model="searchQuery" class="form-control"/>
                    </div>

                    <div class="form-group col-xl-6">
                        <label>{{ trans('admin_klikbud/settings/klikbud/main-slider.show.status') }}</label>
                        <select wire:model="searchStatus" class="form-control ">
                            @forelse($status_to_main_page as $item)
                                <option value="{{ $item['value'] }}">{{ $item['title'] }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
            @endif
            @forelse($sliders as $slider)
                <div class="col-xl-4 col-sm-4">
                    {{--<!--begin::Forms Widget 4-->--}}
                    <div class="card card-custom gutter-b">
                        {{--                        <!--begin::Body-->--}}
                        <div class="card-body">
                            {{--                            <!--begin::Top-->--}}
                            <div class="d-flex align-items-center">
                                {{--                                <!--begin::Symbol-->--}}
                                <div class="symbol symbol-40 symbol-light-success mr-5">
                                                            <span class="symbol-label">
                                                                <img src=""
                                                                     class="h-75 align-self-end" alt=""/>
                                                            </span>
                                </div>
                                {{--                                <!--end::Symbol-->--}}
                                {{--                                <!--begin::Info-->--}}
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#"
                                       class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $slider->user_details->name }}
                                        {{ $slider->user_details->surname }}</a>
                                    <span
                                        class="text-muted font-weight-bold">{{ date("H:i:s d/m/Y", strtotime($slider->created_at)) }}</span>
                                </div>
                                {{--                                <!--end::Info-->--}}
                                {{--                                <!--begin::Dropdown-->--}}
                                <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip"
                                     title="{{ trans('admin_klikbud/settings/klikbud/main-slider.show.dropdown.title') }}"
                                     data-placement="left">
                                    <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                        {{--                                        <!--begin::Navigation-->--}}
                                        <ul class="navi navi-hover">
                                            <li class="navi-header font-weight-bold py-4">
                                                <span class="font-size-lg">{{ trans('admin_klikbud/settings/klikbud/main-slider.show.dropdown.status') }}:</span>
                                            </li>
                                            <li class="navi-separator mb-3 opacity-70"></li>

                                            @if($slider->status_to_main_page_id === config('klikbud.klikbud.status_to_main_page.not_visible'))
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link"
                                                       wire:click="changeStatusInMainPage({{ $slider->id }}, {{ config('klikbud.klikbud.status_to_main_page.visible') }})">
                                                        <span class="navi-text"><span
                                                                class="label label-xl label-inline label-light-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</span></span></a>
                                                </li>
                                            @endif
                                            @if($slider->status_to_main_page_id === config('klikbud.klikbud.status_to_main_page.visible'))
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link"
                                                       wire:click="changeStatusInMainPage({{ $slider->id}}, {{ config('klikbud.klikbud.status_to_main_page.not_visible') }})">
                                                        <span class="navi-text"><span
                                                                class="label label-xl label-inline label-light-danger">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</span></span></a>
                                                </li>
                                            @endif
                                            <li class="navi-header font-weight-bold py-4">
                                                <span class="font-size-lg">{{ trans('admin_klikbud/settings/klikbud/main-slider.show.dropdown.other') }}:</span>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('settings.klikbud.home.slider.edit', [$slider->id]) }}"
                                                   class="navi-link">
                                                    <span class="navi-text"><span
                                                            class="label label-xl label-inline label-light-primary">{{ trans('admin_klikbud/settings/klikbud/main-slider.show.dropdown.edit') }}</span></span>
                                                </a>
                                            </li>
                                            @if(empty($slider->image_id))
                                            @else
                                                <li class="navi-item">
                                                    <a href="{{ route('download', $slider->image_id) }}"
                                                       class="navi-link"><span class="navi-text">
                                                        <span
                                                            class="label label-xl label-inline label-light-dark">{{ trans('admin_klikbud/settings/klikbud/main-slider.show.dropdown.download_image') }}</span></span>
                                                    </a>
                                                </li>
                                            @endif
                                            <li class="navi-item">
                                                <a wire:click="selectItem({{ $slider->id }}, 'delete')" href="#"
                                                   class="navi-link">
                                                    <span class="navi-text"><span
                                                            class="label label-xl label-inline label-danger">{{ trans('admin_klikbud/settings/klikbud/main-slider.show.dropdown.delete') }}</span></span>
                                                </a>
                                            </li>
                                        </ul>
                                        {{--                                        <!--end::Navigation-->--}}
                                    </div>
                                </div>
                                {{--                                <!--end::Dropdown-->--}}
                            </div>
                            {{--                            <!--end::Top-->--}}
                            {{--                            <!--begin::Bottom-->--}}
                            <div class="pt-4">

                                @if(empty($slider->image_id))
                                @else
                                    {{--                                    <!--begin::Image-->--}}
                                    <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px"
                                         style="background-image: url({{ asset(Storage::url($slider->image->path)) }})"></div>
                                    {{--                                <!--end::Image-->--}}
                                @endif
                                {{--                                <!--begin::Text-->--}}
                                <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2">

                                </p>
                                {{--                                <!--end::Text-->--}}
                                {{--                                <!--begin::Action-->--}}
                                <div class="d-flex align-items-center">
                                    @forelse($status_to_main_page as $item)
                                        @if($slider->status_to_main_page_id === $item['value'])
                                            <span
                                                class="label label-inline label-{{ $item['class'] }} ">{{ $item['title'] }}</span>
                                            @break
                                        @endif
                                    @empty
                                    @endforelse
                                </div>
                                {{--                                <!--end::Action-->--}}
                            </div>
                            {{--                            <!--end::Bottom-->--}}
                            {{--                            <!--begin::Separator-->--}}
                            <div class="separator separator-solid mt-2 mb-4"></div>
                            {{--                            <!--end::Separator-->--}}
                            <p><b>PL:</b> {{ $slider->textYellow['pl'] }} {{ $slider->textBlack['pl'] }}</p>
                            <p><b>UA:</b> {{ $slider->textYellow['ua'] }} {{ $slider->textBlack['ua'] }}</p>
                            <p><b>RU:</b> {{ $slider->textYellow['ru'] }} {{ $slider->textBlack['ru'] }}</p>
                            <p><b>EN:</b> {{ $slider->textYellow['en'] }} {{ $slider->textBlack['en'] }}</p>
                        </div>
                        {{--<!--end::Body-->--}}
                    </div>
                    {{--<!--end::Forms Widget 4-->--}}
                </div>
            @empty
                <div class="col-xl-4 col-sm-4" wire:loading.remove>
                    {{ trans('admin_klikbud/settings/klikbud/main-slider.show.dont_anything_information') }}
                </div>
            @endforelse
        </div>
        {{--        <!--begin::Pagination-->--}}
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap py-2 mr-3">
                {{ $sliders->links('vendor.livewire.bootstrap') }}
            </div>
        </div>
        {{--        <!--end:: Pagination-->--}}
        {{--        <!-- DeleteModal-->--}}
        @include('livewire.settings.klikbud.home.main-slider.delete-modal')
    </div>
</div>
<script>
    window.addEventListener('openDeleteModal', event => {
        $("#deleteModalForm").modal('show')
    })
    window.addEventListener('closeDeleteModal', event => {
        $("#deleteModalForm").modal('hide')
    })
</script>
