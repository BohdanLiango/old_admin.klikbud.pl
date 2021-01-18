<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="form-group col-6 float-left">
                    <label>Search</label>
                    <input wire:model="searchQuery" class="form-control"/>
                </div>

                <div class="form-group col-6 float-right">
                    <label>Status</label>
                        <select wire:model="searchStatus" class="form-control ">
                            <option value="">ALL</option>
                            <option value="1">Active</option>
                            <option value="2">Disable</option>
                        </select>
                </div>
            </div>


            <div class="d-flex align-items-center col-12"  wire:loading >
                <div class="mr-2 text-muted" wire:loading >Loading...</div>
                <div class="spinner mr-10" wire:loading ></div>
            </div>


            @foreach($sliders as $slider)
            <div class="col-xl-4 col-sm-4">
                <!--begin::Forms Widget 4-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Top-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40 symbol-light-success mr-5">
                                                            <span class="symbol-label">
                                                                <img src="assets/media/svg/avatars/047-girl-25.svg"
                                                                     class="h-75 align-self-end" alt=""/>
                                                            </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#"
                                       class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Ruby
                                        Liam</a>
                                    <span class="text-muted font-weight-bold">Yestarday at 5:06 PM</span>
                                </div>
                                <!--end::Info-->
                                <!--begin::Dropdown-->
                                <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions"
                                     data-placement="left">
                                    <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover">
                                            <li class="navi-header font-weight-bold py-4">
                                                <span class="font-size-lg">Zmiana statusu dla głównej strony:</span>
                                            </li>
                                            <li class="navi-separator mb-3 opacity-70"></li>
                                            <li class="navi-item">
                                                <a onclick="return confirm('Are you sure? ') || event.stopImmediatePropagation()" href="#" class="navi-link" wire:click="changeStatusInMainPage({{ $slider->id }}, {{ 1 }})"><span class="navi-text"><span class="label label-xl label-inline label-light-success">Aktywny</span></span></a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link" wire:click="changeStatusInMainPage({{ $slider->id}}, {{ 2 }})"><span class="navi-text"><span class="label label-xl label-inline label-light-danger">Ukryty</span></span></a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('settings.klikbud.home.slider.edit', $slider) }}" class="navi-link"><span class="navi-text"><span class="label label-xl label-inline label-light-danger">Ukryty</span></span></a>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                                <!--end::Dropdown-->
                            </div>
                            <!--end::Top-->
                            <!--begin::Bottom-->
                            <div class="pt-4">
                                <!--begin::Image-->
                                <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px"
                                     style="background-image: url({{ asset('media/stock-900x600/3.jpg') }})"></div>
                                <!--end::Image-->
                                <!--begin::Text-->
                                <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2">

                                </p>
                                <!--end::Text-->
                                <!--begin::Action-->
                                <div class="d-flex align-items-center">
                                    @if($slider->status_to_main_page_id === 1)
                                    <span class="label label-inline label-success ">Aktywny</span>
                                    @elseif($slider->status_to_main_page_id === 2)
                                    <span class="label label-inline label-danger ">Ukryty</span>
                                    @endif
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Bottom-->
                            <!--begin::Separator-->
                            <div class="separator separator-solid mt-2 mb-4"></div>
                            <!--end::Separator-->
                            <p>{{ $slider->textYellow['pl'] }} {{ $slider->textBlack['pl'] }}</p>
                        </div>
                        <!--end::Body-->
                    </div>
                <!--end::Forms Widget 4-->
            </div>
            @endforeach
        </div>
        <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap py-2 mr-3">
                {{ $sliders->links('vendor.livewire.bootstrap') }}
            </div>
        </div>
        <!--end:: Pagination-->
    </div>
</div>
