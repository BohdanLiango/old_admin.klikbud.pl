<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            @if(session()->has('message'))
            <div class="col-12 alert alert-custom alert-{{ session('alert-type') }} fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text">{{ session('message') }}</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
            @endif

                @if(session()->has('message-update-slider'))
                    <div class="col-12 alert alert-custom alert-warning fade show" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                        <div class="alert-text">{{ session('message-update-slider') }}</div>
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                            </button>
                        </div>
                    </div>
                @endif

             @if($count > 0)
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
            @endif

            @forelse($sliders as $slider)
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
                                                                <img src=""
                                                                     class="h-75 align-self-end" alt=""/>
                                                            </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#"
                                       class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $slider->user_details->name }}
                                        {{ $slider->user_details->surname }}</a>
                                    <span class="text-muted font-weight-bold">{{ $slider->created_at }}</span>
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

                                            @if($slider->status_to_main_page_id === 2)
                                            <li class="navi-item">
                                                <a href="#" class="navi-link" wire:click="changeStatusInMainPage({{ $slider->id }}, {{ 1 }})"><span class="navi-text"><span class="label label-xl label-inline label-light-success">Aktywny</span></span></a>
                                            </li>
                                            @endif
                                            @if($slider->status_to_main_page_id === 1)
                                            <li class="navi-item">
                                                <a href="#" class="navi-link" wire:click="changeStatusInMainPage({{ $slider->id}}, {{ 2 }})"><span class="navi-text"><span class="label label-xl label-inline label-light-danger">Ukryty</span></span></a>
                                            </li>
                                            @endif
                                            <hr>
                                            <li class="navi-header font-weight-bold py-4">
                                                <span class="font-size-lg">Inne:</span>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('settings.klikbud.home.slider.edit', [$slider->id]) }}"  class="navi-link"><span class="navi-text"><span class="label label-xl label-inline label-light-primary">Edytować</span></span></a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('download', $slider->image_id) }}" class="navi-link"><span class="navi-text">
                                                        <span class="label label-xl label-inline label-light-dark">Pobrać zdjecie</span></span></a>
                                            </li>
                                            <li class="navi-item">
                                                <a wire:click="selectItem({{ $slider->id }}, 'delete')" href="#" class="navi-link">
                                                    <span class="navi-text"><span class="label label-xl label-inline label-danger">Usunąć</span></span>
                                                </a>
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
                                     style="background-image: url({{ asset(Storage::url($slider->image->file_view)) }})"></div>
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
                            <p><b>PL:</b> {{ $slider->textYellow['pl'] }} {{ $slider->textBlack['pl'] }}</p>
                            <p><b>UA:</b> {{ $slider->textYellow['ua'] }} {{ $slider->textBlack['ua'] }}</p>
                            <p><b>RU:</b> {{ $slider->textYellow['ru'] }} {{ $slider->textBlack['ru'] }}</p>
                            <p><b>EN:</b> {{ $slider->textYellow['en'] }} {{ $slider->textBlack['en'] }}</p>
                        </div>
                        <!--end::Body-->
                    </div>
                <!--end::Forms Widget 4-->
            </div>
                @empty
                <div class="col-xl-4 col-sm-4" wire:loading.remove>
                    Niema żadnej informacji.
                </div>
            @endforelse
        </div>
        <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap py-2 mr-3">
                {{ $sliders->links('vendor.livewire.bootstrap') }}
            </div>
        </div>
        <!--end:: Pagination-->
        <!-- Modal-->
        <div class="modal fade" id="deleteModalForm" tabindex="-1" role="dialog" aria-labelledby="deleteModalForm" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Czy napełno chcesz usunąć?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                       <h3>Suwak: {{ $textYellow_data }} {{ $textBlack_data }}</h3>
                        <br>
                        <hr>
                        <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px"
                             style="background-image: url({{ asset(Storage::url($image_data)) }})"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click.prevent="cancel" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Zamknąć</button>
                        <button type="button" wire:click.prevent="delete" class="btn btn-primary font-weight-bold">Zapisz zmiany</button>
                    </div>
                </div>
            </div>
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
