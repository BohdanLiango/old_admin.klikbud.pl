<div>
    <div class="row">
        <div class="col-xl-11"></h3>
        </div>
        <div class="col-xl-1">
            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="First group">
                    <a href="{{ route('settings.klikbud.home.slider.edit', $slider->id) }}"
                       class="btn btn-warning  btn-icon"><i class="la la-edit"></i></a>
                    <a class="btn btn-danger  btn-icon" data-toggle="modal" data-target="#staticBackdrop"><i
                            class="la la-close"></i></a>
                </div>
            </div>
            <hr>
        </div>
        {{--        <!-- Modal-->--}}
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
             aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel">{{ trans('admin_klikbud/settings/klikbud/main-slider.delete_modal.title_question') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                                data-dismiss="modal">{{ trans('admin_klikbud/settings/klikbud/main-slider.delete_modal.close') }}</button>
                        <button wire:click="delete" type="button"
                                class="btn btn-primary font-weight-bold">{{ trans('admin_klikbud/settings/klikbud/main-slider.delete_modal.delete') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            {{--            <!--begin::Card-->--}}
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label float-left">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.image') }}</h3>
                        @if($slider->image !== NULL)
                            <a href="{{ route('download', $slider->image_id) }}"
                               class="btn btn-icon btn-primary float-right">
                                <i class="flaticon2-download-2"></i>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    {{--                    <!--begin::Example-->--}}
                    @if($slider->image != NULL)
                        <div class="example mb-10">
                            <a href="{{ Storage::disk(config('klikbud.disk_store'))->url($slider->image->path) }}" target="_blank">
                                <img src="{{ Storage::disk(config('klikbud.disk_store'))->url($slider->image->path) }}" class="img-fluid"></a>
                        </div>
                        {{--                    <!--end::Example-->--}}
                    @else
                        <div class="example mb-10">
                        <img src="{{ asset('media/static/slide1.jpg') }}" alt="" class="img-fluid" />
                        </div>
                    @endif
                    <hr>
                    <div>
                        @if($slider->image != NULL)
                        <h5>{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.status_to_main_page') }}:
                            @if($status_to_main_page_slider === config('klikbud.klikbud.status_to_main_page.visible'))
                                <span
                                    class="badge badge-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</span>
                            @endif
                            @if($status_to_main_page_slider === config('klikbud.klikbud.status_to_main_page.not_visible'))
                                <span
                                    class="badge badge-warning">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</span>
                            @endif
                            | {{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.change_to') }}:
                            @if($status_to_main_page_slider == config('klikbud.klikbud.status_to_main_page.not_visible'))
                                <a wire:click.lazy="changeStatusToMainPage({{ config('klikbud.klikbud.status_to_main_page.visible') }})"
                                   class="btn badge badge-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</a>
                            @endif
                            @if($status_to_main_page_slider == config('klikbud.klikbud.status_to_main_page.visible'))
                                <a wire:click.lazy="changeStatusToMainPage({{ config('klikbud.klikbud.status_to_main_page.not_visible') }})"
                                   class="btn badge badge-warning">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</a>
                            @endif
                        </h5>
                        @endif
                    </div>
                </div>
            </div>
            {{--            <!--end::Card-->--}}
            @if($slider->image != NULL)
            {{--            <!--begin::Card-->--}}
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.image_information') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    {{--                    <!--begin::Example-->--}}
                    <div class="example mb-10">
                        <div class="example-preview">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.position') }}</th>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.data') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.id') }}</th>
                                        <td>{{ $slider->image_id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.full_path') }}</th>
                                        <td>{{ $slider->image_additional_information->path }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.name') }}</th>
                                        <td>{{ $slider->image_additional_information->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.folder') }}</th>
                                        <td>{{ $slider->image_additional_information->folder }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.size') }}</th>
                                        <td>{{ number_format($slider->image_additional_information->size /  1048576,2 )}}mb</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.mime') }}</th>
                                        <td>{{ $slider->image_additional_information->mime }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.date_add') }}</th>
                                        <td>{{ $slider->image_additional_information->created_at }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{--                    <!--end::Example-->--}}
                </div>
            </div>
            {{--            <!--end::Card-->--}}
            @endif
        </div>
        <div class="col-xl-6">
            {{--            <!--begin::Card-->--}}
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.yellow_text') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    {{--                    <!--begin::Example-->--}}
                    <div class="example mb-10">
                        <div class="example-preview">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.language') }}</th>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.yellow_text') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slider->textYellow as $key => $value)
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
                    {{--                    <!--end::Example-->--}}
                </div>
            </div>
            {{--            <!--end::Card-->--}}
            {{--            <!--begin::Card-->--}}
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.black_text') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    {{--                    <!--begin::Example-->--}}
                    <div class="example mb-10">
                        <div class="example-preview">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.language') }}</th>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.black_text') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slider->textBlack as $key => $value)
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
                    {{--                    <!--end::Example-->--}}
                </div>
            </div>
            {{--            <!--end::Card-->--}}
            {{--            <!--begin::Card-->--}}
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.description') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    {{--                    <!--begin::Example-->--}}
                    <div class="example mb-10">
                        <div class="example-preview">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.language') }}</th>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.description') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slider->description as $key => $value)
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
                    {{--                    <!--end::Example-->--}}
                </div>
            </div>
            {{--            <!--end::Card-->--}}
            {{--            <!--begin::Card-->--}}
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.alt') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    {{--                    <!--begin::Example-->--}}
                    <div class="example mb-10">
                        <div class="example-preview">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.language') }}</th>
                                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/main-slider.show_one.alt') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slider->alt as $key => $value)
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
                    {{--                    <!--end::Example-->--}}
                </div>
            </div>
            {{--            <!--end::Card-->--}}
        </div>
    </div>
</div>
