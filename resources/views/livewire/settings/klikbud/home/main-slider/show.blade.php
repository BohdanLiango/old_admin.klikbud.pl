<div>
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            @include('livewire.settings.klikbud.home.main-slider.widget')
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
                <div class="card card-custom overlay">
                    <div class="card-body p-0">
                        <div class="overlay-wrapper">
                            @if($slider->image != NULL)
                            <img src="{{ Storage::disk('s3')->url($slider->image->path) }}" alt="" class="w-100 rounded"/>
                            @else
                                <img src="{{ asset('media/static/slide1.jpg') }}" alt="" class="w-100 rounded" />
                            @endif
                        </div>
                        <div class="overlay-layer m-5 rounded flex-center">
                            <div class="d-flex flex-column flex-center">
                                @forelse($status_to_main_page as $item)
                                    @if($slider->status_to_main_page_id === $item['value'])
                                        <span
                                            class="label label-inline label-xl  mb-1 label-{{ $item['class'] }} ">{{ $item['title'] }}</span>
                                        @break
                                    @endif
                                @empty
                                @endforelse
                                <a href="{{ route('settings.klikbud.home.slider.show', $slider->id) }}" class="font-size-h4 font-weight-bolder text-white text-hover-primary">
                                    <b style="color:orange">{{ $slider->textYellow['pl'] }} </b>
                                    <b style="color:black">{{ $slider->textBlack['pl'] }}</b></a>
                                    {{--<!--begin::Dropdown-->--}}
                                    <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip"
                                         data-placement="right">
                                        <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                            <!--begin::Navigation-->
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
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                    {{--<!--end::Dropdown-->--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-xl-4 col-sm-4" wire:loading.remove>
                    {{ trans('admin_klikbud/settings/klikbud/main-slider.show.dont_anything_information') }}
                </div>
            @endforelse

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
</div>
<script>
    window.addEventListener('openDeleteModal', event => {
        $("#deleteModalForm").modal('show')
    })
    window.addEventListener('closeDeleteModal', event => {
        $("#deleteModalForm").modal('hide')
    })
</script>
</div>
