<div>
    @if(session()->has('message'))
        <div class="col-xl-12">
        <div class="alert alert-custom alert-{{ session('alert-type') }} fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">{{ session('message') }}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
        </div>
    @endif

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">

                @if($count > 0)
                    <div class="col-12">
                        <div class="form-group col-3 float-left">
                            <label>Search</label>
                            <input wire:model="searchQuery" class="form-control"/>
                        </div>

                        <div class="form-group col-3 float-right">
                            <label>Status w galerii na stronie</label>
                            <select wire:model="searchStatus" class="form-control ">
                                <option value="">ALL</option>
                                <option value="1">Aktywny</option>
                                <option value="0">Ukryty</option>
                            </select>
                        </div>

                        <div class="form-group col-3 float-right">
                            <label>Status na głownej stronie</label>
                            <select wire:model="searchStatusToMainPage" class="form-control ">
                                <option value="">ALL</option>
                                <option value="1">Aktywny</option>
                                <option value="0">Ukryty</option>
                            </select>
                        </div>

                        <div class="form-group col-3 float-right">
                            <label>Kategoria</label>
                            <select wire:model="searchCategory" class="form-control ">
                                <option value="">ALL</option>
                                @forelse($categories as $category)
                                    <option value="{{ $category['value'] }}">{{ $category['title'] }}</option>
                                    @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                @endif
                @forelse($gallery as $item)
                    <div class="col-xl-4 col-sm-4">
                        <!--begin::Forms Widget 4-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Top-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40 symbol-light-success mr-5">

                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-column flex-grow-1">

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
                                                @if($item->status_to_main_page_id === 0 )
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link" wire:click="changeStatusInMainPage({{ $item->id }}, {{ 1 }})"><span class="navi-text"><span class="label label-xl label-inline label-light-success">Aktywny</span></span></a>
                                                    </li>
                                                @endif
                                                @if($item->status_to_main_page_id === 1 )
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link" wire:click="changeStatusInMainPage({{ $item->id}}, {{ 0 }})"><span class="navi-text"><span class="label label-xl label-inline label-light-danger">Ukryty</span></span></a>
                                                    </li>
                                                @endif
                                                <hr>
                                                <li class="navi-header font-weight-bold py-4">
                                                    <span class="font-size-lg">Zmiana statusu dla galerii:</span>
                                                </li>
                                                <li class="navi-separator mb-3 opacity-70"></li>
                                                @if($item->status_gallery_id === 0 )
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link" wire:click="changeStatusToGallery({{ $item->id }}, {{ 1 }})"><span class="navi-text"><span class="label label-xl label-inline label-light-success">Aktywny</span></span></a>
                                                    </li>
                                                @endif
                                                @if($item->status_gallery_id === 1 )
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link" wire:click="changeStatusToGallery({{ $item->id}}, {{ 0 }})"><span class="navi-text"><span class="label label-xl label-inline label-light-danger">Ukryty</span></span></a>
                                                    </li>
                                                @endif
                                                <hr>
                                                <li class="navi-header font-weight-bold py-4">
                                                    <span class="font-size-lg">Inne:</span>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="{{ route('settings.klikbud.gallery.show', $item->id) }}"  class="navi-link"><span class="navi-text"><span class="label label-xl label-inline label-light-success">Otwóż</span></span></a>
                                                </li>

                                                <li class="navi-item">
                                                    <a href="{{ route('settings.klikbud.gallery.edit', $item->id) }}"  class="navi-link"><span class="navi-text"><span class="label label-xl label-inline label-light-primary">Edytować</span></span></a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="{{ route('download', $item->image_id) }}" class="navi-link"><span class="navi-text">
                                                        <span class="label label-xl label-inline label-light-dark">Pobrać zdjecie</span></span></a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                    <!--end::Dropdown-->
                                </div>
                                <!--end::Top-->
                                <!--begin::Bottom-->
                                <div class="pt-4" wire:load.remove>
                                    <!--begin::Image-->
                                    <a href="{{ route('settings.klikbud.gallery.show', $item->id) }}"><div class="bgi-no-repeat bgi-size-cover rounded min-h-265px"
                                                                                                                     style="background-image: url({{ asset(Storage::url($item->image->file_view)) }})"></div>
                                    </a>
                                    <!--end::Image-->
                                    <!--begin::Text-->
                                    <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2">

                                    </p>
                                    <!--end::Text-->
                                    <!--begin::Action-->
                                    <div class="d-flex align-items-center">
                                        <p>Status na głównej stronie:
                                            @if($item->status_to_main_page_id === 1)
                                                <span class="label label-inline label-success">Aktywny</span>
                                            @elseif($item->status_to_main_page_id === 0)
                                                <span class="label label-inline label-danger ">Ukryty</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p>Kategoria:
                                            <b>
                                                @foreach($categories as $category)
                                                    @if($category['value'] == $item->category_id)
                                                        {{ $category['title'] }}
                                                        @break
                                                    @endif
                                                @endforeach
                                            </b>
                                        </p>
                                    </div>
                                    <!--end::Action-->
                                </div>
                                <!--end::Bottom-->
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
                    {{ $gallery->links('vendor.livewire.bootstrap') }}
                </div>
            </div>
            <!--end:: Pagination-->
        </div>
    </div>
</div>
