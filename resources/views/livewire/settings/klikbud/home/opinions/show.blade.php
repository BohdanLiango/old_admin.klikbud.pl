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

            @if($count > 0)
                <div class="col-12">
                    <div class="form-group col-6 float-left">
                        <label>Search</label>
                        <input wire:model="searchQuery" class="form-control"/>
                    </div>

                    <div class="form-group col-6 float-right">
                        <label>Status</label>
                        <select wire:model="searchStars" class="form-control ">
                            <option value="">ALL ({{ $count }})</option>
                            <option value="1">1 - gwiazda({{$countOne}})</option>
                            <option value="2">2 - gwiazdy({{$countTwo}})</option>
                            <option value="3">3 - gwiazdy({{$countThree}})</option>
                            <option value="4">4 - gwiazdy({{$countFour}})</option>
                            <option value="5">5 - gwiazd({{$countFive}})</option>
                        </select>
                    </div>
                </div>
            @endif

            <!--begin::Pagination-->
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex flex-wrap py-2 mr-3">
                        {{ $opinions->links('vendor.livewire.bootstrap') }}
                    </div>
                </div>
                <!--end:: Pagination-->

            @forelse($opinions as $opinion)
                <div class="col-xl-12 col-sm-12">
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
                                       class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $opinion->user_details->name }}
                                        {{ $opinion->user_details->surname }}</a>
                                    <span class="text-muted font-weight-bold">{{ $opinion->created_at }}</span>
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

                                            @if($opinion->status_to_main_page_id === 2)
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link" wire:click="changeStatusInMainPage({{ $opinion->id }}, {{ 1 }})"><span class="navi-text"><span class="label label-xl label-inline label-light-success">Aktywny</span></span></a>
                                                </li>
                                            @endif
                                            @if($opinion->status_to_main_page_id === 1)
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link" wire:click="changeStatusInMainPage({{ $opinion->id}}, {{ 2 }})"><span class="navi-text"><span class="label label-xl label-inline label-light-danger">Ukryty</span></span></a>
                                                </li>
                                            @endif
                                            <hr>
                                            <li class="navi-header font-weight-bold py-4">
                                                <span class="font-size-lg">Inne:</span>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('settings.klikbud.home.opinion.edit', [$opinion->id]) }}"  class="navi-link"><span class="navi-text"><span class="label label-xl label-inline label-light-primary">Edytować</span></span></a>
                                            </li>
                                            <li class="navi-item">
                                                <a wire:click="selectItem({{ $opinion->id }}, 'delete')" href="#" class="navi-link">
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
                                <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2">
                                   <b>Od kogo:</b> {{ $opinion->name }}
                                    | <b>Serwis:</b> {{ $opinion->service->title['pl'] }}
                                    | <b>Portal:</b>
                                    @forelse($portals as $portal)
                                        @if($portal->id === $opinion->portal_opinion_id)
                                            <img src="{{ asset(Storage::url($portal->image->file_view)) }}" alt="" width="20px">
                                            <a href="{{ $portal->url }}">{{ $portal->title }}</a>
                                            @break
                                        @endif
                                    @empty
                                    @endforelse
                                    | <b>Data dodania:</b> {{ date("d/m/Y", strtotime($opinion->date_add)) }}

                                | <b>Status: </b>
                                    @if($opinion->status_to_main_page_id === 1)
                                        <span class="label label-inline label-success ">Aktywny</span>
                                    @elseif($opinion->status_to_main_page_id === 2)
                                        <span class="label label-inline label-danger ">Ukryty</span>
                                    @endif
                                    | <b>Ocena: </b>
                                    @for($i = 0; $i < $opinion->stars; $i++)
                                        <i class="fa fa-star text-black"></i>
                                    @endfor
                                </p>
                            </div>
                            <div class="separator separator-solid mt-2 mb-4"></div>
                            <!--end::Separator-->
                                <p> <b>Opinia:</b> {{ $opinion->opinion }}</p>
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
                        <h3>Twórca: {{ $data_name }}</h3>
                        <br>
                        <hr>
                        <p> {{ $data_opinion }}  </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Zamknąć</button>
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
