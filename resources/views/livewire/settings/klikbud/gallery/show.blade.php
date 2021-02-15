<div>
    <div class="row">
        <div class="col-xl-11"></div>
        <div class="col-xl-1">
            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="First group">
                    <a href="{{ route('settings.klikbud.gallery.edit', $gallery->id) }}" class="btn btn-warning  btn-icon"><i class="la la-edit"></i></a>
                    <a class="btn btn-danger  btn-icon" data-toggle="modal" data-target="#staticBackdrop"><i class="la la-close"></i></a>
                </div>
            </div>
            <hr>
        </div>
        {{--<!-- Delete Modal-->--}}
        @include('livewire.settings.klikbud.gallery.delete-modal')
        <div class="col-xl-6">
            {{--<!--begin::Card-->--}}
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label float-left">{{ trans('admin_klikbud/settings/klikbud/gallery.show_one.image') }}</h3>
                        <a href="{{ route('download', $gallery->image_id) }}" class="btn btn-icon btn-primary float-right">
                            <i class="flaticon2-download-2"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                {{--<!--begin::Example-->--}}
                    <div class="example mb-10">
                        @if($gallery->image !== NULL)
                            <a href="{{ asset(Storage::url($gallery->image->path)) }}" target="_blank">
                                <img src="{{ asset(Storage::url($gallery->image->path)) }}" class="img-fluid" alt="">
                            </a>
                        @else
                            <a href="#" target="_blank">
                                <img src="{{ asset('media/static/service.jpg') }}" class="img-fluid" alt="">
                            </a>
                        @endif
                    </div>
                {{--<!--end::Example-->--}}
                    <hr>
                    @if($gallery->image !== NULL)
                    <div>
                        <h5>{{ trans('admin_klikbud/settings/klikbud/gallery.show_one.status_to_gallery') }}:
                            @if($status_gallery_id == config('klikbud.klikbud.status_to_gallery.visible'))
                                <span class="badge badge-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</span>
                            @endif
                            @if($status_to_main_page === config('klikbud.klikbud.status_to_gallery.not_visible'))
                                <span class="badge badge-warning">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</span>
                            @endif
                            | {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.change_to') }}:
                            @if($status_gallery_id == config('klikbud.klikbud.status_to_gallery.not_visible'))
                                <a wire:click.lazy="changeStatusToGallery({{ config('klikbud.klikbud.status_to_gallery.visible')}})"
                                   class="btn badge badge-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</a>
                            @endif
                            @if($status_gallery_id == config('klikbud.klikbud.status_to_gallery.visible'))
                                <a wire:click.lazy="changeStatusToGallery({{ config('klikbud.klikbud.status_to_gallery.not_visible') }})"
                                   class="btn badge badge-danger">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</a>
                            @endif
                        </h5>
                    </div>
                    <hr>
                    <div>
                        <h5>{{ trans('admin_klikbud/settings/klikbud/gallery.show_one.status_to_main_page') }}:
                            @if($status_to_main_page === config('klikbud.klikbud.status_to_main_page.visible'))
                                <span
                                    class="badge badge-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</span>
                            @endif
                            @if($status_to_main_page === config('klikbud.klikbud.status_to_main_page.not_visible'))
                                <span
                                    class="badge badge-warning">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</span>
                            @endif
                            | {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.change_to') }}:
                            @if($status_to_main_page == config('klikbud.klikbud.status_to_main_page.not_visible'))
                                <a wire:click.lazy="changeStatusInMainPage({{ config('klikbud.klikbud.status_to_main_page.visible') }})"
                                   class="btn badge badge-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</a>
                            @endif
                            @if($status_to_main_page == config('klikbud.klikbud.status_to_main_page.visible'))
                                <a wire:click.lazy="changeStatusInMainPage({{ config('klikbud.klikbud.status_to_main_page.not_visible') }})"
                                   class="btn badge badge-warning">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</a>
                            @endif
                        </h5>
                    </div>
                    @endif
                </div>
            </div>
            {{--<!--end::Card-->--}}
            {{--<!--begin::Card-->--}}
            @if($gallery->image !== NULL)
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/gallery.show_one.image_information') }}</h3>
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
                                        <th scope="col"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.position') }}</th>
                                        <th scope="col"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.data') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.id') }}</th>
                                        <td>{{ $gallery->image_id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.full_path') }}</th>
                                        <td>{{ $gallery->image_additional_information->path }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.name') }}</th>
                                        <td>{{ $gallery->image_additional_information->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.folder') }}</th>
                                        <td>{{ $gallery->image_additional_information->folder }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.size') }}</th>
                                        <td>{{ number_format($gallery->image_additional_information->size /  1048576,2 )}} mb</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.mime') }}</th>
                                        <td>{{ $gallery->image_additional_information->mime }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.date_add') }}</th>
                                        <td>{{ $gallery->image_additional_information->created_at }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                {{--<!--end::Example-->--}}
                </div>
            </div>
            @endif
        {{--<!--end::Card-->--}}
        </div>
        <div class="col-xl-6">
            {{--<!--begin::Card-->--}}
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.title') }}</h3>
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
                                        <th scope="col"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.language') }}</th>
                                        <th scope="col"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.title') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gallery->title as $key => $value)
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
                        <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/gallery.show_one.description') }}</h3>
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
                                        <th scope="col"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.language') }}</th>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/gallery.show_one.description') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gallery->description as $key => $value)
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
                        <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/gallery.show_one.alt') }}</h3>
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
                                        <th scope="col"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.language') }}</th>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/gallery.show_one.alt') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gallery->alt as $key => $value)
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
                        <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/gallery.show_one.slug') }}</h3>
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
                                        <th scope="col"> {{ trans('admin_klikbud/settings/klikbud/gallery.show_one.language') }}</th>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/gallery.show_one.slug') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gallery->slug as $key => $value)
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
</div>
