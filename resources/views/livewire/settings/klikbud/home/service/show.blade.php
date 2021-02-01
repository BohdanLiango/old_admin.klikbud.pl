<div class="row">
    <div class="col-xl-11"></div>
    <div class="col-xl-1">
        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group" role="group" aria-label="First group">
                <a href="{{ route('settings.klikbud.home.service.edit', $service->id) }}"
                   class="btn btn-warning  btn-icon"><i class="la la-edit"></i></a>
                <a class="btn btn-danger  btn-icon" data-toggle="modal" data-target="#staticBackdrop"><i
                        class="la la-close"></i></a>
            </div>
        </div>
        <hr>
    </div>
    @include('livewire.settings.klikbud.home.service.delete-modal')
    <div class="col-xl-6">
        {{--<!--begin::Card-->--}}
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label float-left">{{ trans('admin_klikbud/settings/klikbud/service.show_one.image') }}</h3>
                    @if($service->image !== NULL)
                        <a href="{{ route('download', $service->image_id) }}"
                           class="btn btn-icon btn-primary float-right">
                            <i class="flaticon2-download-2"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                {{--<!--begin::Example-->--}}
                <div class="example mb-10">
                    @if($service->image !== NULL)
                        <a href="{{ asset(Storage::url($service->image->path)) }}" target="_blank"><img
                                src="{{ asset(Storage::url($service->image->path)) }}" class="img-fluid"></a>
                    @else
                        <a href="#" target="_blank"><img src="{{ asset('media/static/service.jpg') }}"
                                                         class="img-fluid"></a>
                    @endif
                </div>
                <hr>
                <div>
                    @if($service->image != NULL)
                        <h5>{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.status_to_main_page') }}:
                            @if($status_to_main_page === config('klikbud.klikbud.status_to_main_page.visible'))
                                <span
                                    class="badge badge-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</span>
                            @endif
                            @if($status_to_main_page === config('klikbud.klikbud.status_to_main_page.not_visible'))
                                <span
                                    class="badge badge-warning">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</span>
                            @endif
                            | {{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.change_to') }}:
                            @if($status_to_main_page == config('klikbud.klikbud.status_to_main_page.not_visible'))
                                <a wire:click.lazy="changeStatusToMainPage({{ config('klikbud.klikbud.status_to_main_page.visible') }})"
                                   class="btn badge badge-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</a>
                            @endif
                            @if($status_to_main_page == config('klikbud.klikbud.status_to_main_page.visible'))
                                <a wire:click.lazy="changeStatusToMainPage({{ config('klikbud.klikbud.status_to_main_page.not_visible') }})"
                                   class="btn badge badge-warning">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</a>
                            @endif
                        </h5>
                    @endif
                </div>
                {{--<!--end::Example-->--}}
            </div>
        </div>
        {{--<!--end::Card-->--}}
        @if($service->image !== NULL)
            {{--<!--begin::Card-->--}}
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/service.show_one.image_information') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    {{--<!--begin::Example-->--}}
                    <div class="example mb-10">
                        <div class="example-preview">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/service.show_one.position') }}</th>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/service.show_one.data') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/service.show_one.id') }}</th>
                                        <td>{{ $service->image_id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/service.show_one.full_path') }}</th>
                                        <td>{{ $service->image_additional_information->path }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/service.show_one.name') }}</th>
                                        <td>{{ $service->image_additional_information->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/service.show_one.folder') }}</th>
                                        <td>{{ $service->image_additional_information->folder }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/service.show_one.size') }}</th>
                                        <td>{{ number_format($service->image_additional_information->size /  1048576,2 )}}
                                            mb
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/service.show_one.mime') }}</th>
                                        <td>{{ $service->image_additional_information->mime }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/service.show_one.date_add') }}</th>
                                        <td>{{ $service->image_additional_information->created_at }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{--<!--end::Example-->--}}
                </div>
            </div>
            {{--<!--end::Card-->--}}
        @endif
    </div>
    <div class="col-xl-6">
        {{--<!--begin::Card-->--}}
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/service.show_one.title') }}</h3>
                </div>
            </div>
            <div class="card-body">
                {{--<!--begin::Example-->--}}
                <div class="example mb-10">
                    <div class="example-preview">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">{{ trans('admin_klikbud/settings/klikbud/service.show_one.language') }}</th>
                                    <th scope="col">{{ trans('admin_klikbud/settings/klikbud/service.show_one.title') }}</th>
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
                {{--<!--end::Example-->--}}
            </div>
        </div>
        {{--<!--end::Card-->--}}
        {{--<!--begin::Card-->--}}
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/service.show_one.description') }}</h3>
                </div>
            </div>
            <div class="card-body">
                {{--<!--begin::Example-->--}}
                <div class="example mb-10">
                    <div class="example-preview">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">{{ trans('admin_klikbud/settings/klikbud/service.show_one.language') }}</th>
                                    <th scope="col">{{ trans('admin_klikbud/settings/klikbud/service.show_one.description') }}</th>
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
                {{--<!--end::Example-->--}}
            </div>
        </div>
        {{--<!--end::Card-->--}}
        {{--<!--begin::Card-->--}}
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/service.show_one.alt') }}</h3>
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
                                    <th scope="col">{{ trans('admin_klikbud/settings/klikbud/service.show_one.language') }}</th>
                                    <th scope="col">{{ trans('admin_klikbud/settings/klikbud/service.show_one.alt') }}</th>
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
                {{--<!--end::Example-->--}}
            </div>
        </div>
        {{--<!--end::Card-->--}}
    </div>
</div>
