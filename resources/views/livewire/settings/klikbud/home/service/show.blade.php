<div class="row">
    <div class="col-xl-12">
        @if(session()->has('message'))
            <div class="alert alert-custom alert-{{ session('alert-type') }} fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text">{{ session('message') }}</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
        @endif
    </div>

    <div class="col-xl-11">
        <h3>Status na głównej stroenie:
        @if($status_to_main_page == NULL)
            <span class="badge badge-info">NULL</span>
        @endif
            @if($status_to_main_page == 1)
                <span class="badge badge-success">Aktywny</span>
            @endif
            @if($status_to_main_page == 2)
                <span class="badge badge-danger" >Ukryty</span>
            @endif
            | Zmienić status na:
            @if($status_to_main_page == 2 || $status_to_main_page === null)
                <a wire:click.lazy="changeStatusInMainPage({{1}})" class="btn btn-success">Aktywny</a>
            @endif
            @if($status_to_main_page == 1 || $status_to_main_page === null)
                <a wire:click.lazy="changeStatusInMainPage({{2}})"  class="btn btn-danger">Ukryty</a>
            @endif
        </h3>
    </div>
<div class="col-xl-1">
    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group" role="group" aria-label="First group">
            <a href="{{ route('settings.klikbud.home.service.edit', $service->id) }}" class="btn btn-warning  btn-icon"><i class="la la-edit"></i></a>
            <a class="btn btn-danger  btn-icon" data-toggle="modal" data-target="#staticBackdrop"><i class="la la-close"></i></a>
        </div>
    </div>
    <hr>
</div>
    <!-- Modal-->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Czy napełno chcesz usunąć?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Nie</button>
                    <button wire:click="delete" type="button" class="btn btn-primary font-weight-bold">Tak</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label float-left">Zdjęcie</h3>
                    <a href="{{ route('download', $service->image_id) }}" class="btn btn-icon btn-primary float-right">
                        <i class="flaticon2-download-2"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!--begin::Example-->
                <div class="example mb-10">
                    <a href="{{ asset(Storage::url($service->image->file_view)) }}" target="_blank"><img src="{{ asset(Storage::url($service->image->file_view)) }}"  class="img-fluid"></a>
                </div>
                <!--end::Example-->
            </div>
        </div>
        <!--end::Card-->
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Informacja o zdjęciu</h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin::Example-->
                <div class="example mb-10">
                    <div class="example-preview">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Pozycja</th>
                                    <th scope="col">Dane</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">ID</th>
                                        <td>{{ $service->image_id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pełna ścieżka</th>
                                        <td>{{ $service->image_additional_information->path }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nazwa</th>
                                        <td>{{ $service->image_additional_information->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Skoroszyt</th>
                                        <td>{{ $service->image_additional_information->folder }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Rozmiar</th>
                                        <td>{{ number_format($service->image_additional_information->size /  1048576,2 )}} mb</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mime</th>
                                        <td>{{ $service->image_additional_information->mime }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Data dodania</th>
                                        <td>{{ $service->image_additional_information->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Example-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <div class="col-xl-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Nazwa</h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin::Example-->
                <div class="example mb-10">
                    <div class="example-preview">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">LANGUAGE</th>
                                    <th scope="col">Nazwa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($service->title as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $value}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Example-->
            </div>
        </div>
        <!--end::Card-->
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Opis</h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin::Example-->
                <div class="example mb-10">
                    <div class="example-preview">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">LANGUAGE</th>
                                    <th scope="col">Opis</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($service->description as $key => $value)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td>{{ $value}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Example-->
            </div>
        </div>
        <!--end::Card-->
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">SEO</h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin::Example-->
                <div class="example mb-10">
                    <div class="example-preview">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">LANGUAGE</th>
                                    <th scope="col">SEO</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($service->alt as $key => $value)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td>{{ $value}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Example-->
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>
