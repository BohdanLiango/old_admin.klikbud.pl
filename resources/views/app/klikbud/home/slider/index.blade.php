@extends('layouts.layout')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            {{--<!--begin::Toolbar-->--}}
                @include('app.klikbud.home.slider.components.toolbar_slider')
            {{--<!--end::Toolbar-->--}}
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                {{--<!--begin::Stats-->--}}
                    @include('app.klikbud.home.slider.components.stats')
                    {{--<!--end::Stats-->--}}
                {{--<!--begin::Toolbar-->--}}
               @include('app.klikbud.home.slider.components.toolbar_by_status')
                {{--<!--end::Toolbar-->--}}

                <div class="row g-6 g-xl-9">
                    <div class="col-md-6 col-xl-4">
                        <a href="{{ route('global_settings.klikbud.mainSlider.one') }}" class="card border-hover-primary">
                            <div class="card-header border-0 pt-9">
                                <div class="card-toolbar">
                                    <div class="fs-3 fw-bolder text-dark">Fitnes App <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In Progress</span></div>
                                </div>
                            </div>
                            <div class="card-body p-9">
                                <div class="card-title m-0">
                                        <img src="{{ asset('assets/media/demos/demo1.png') }}" alt="image" class="p-3 img-fluid" />
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!--begin::Pagination-->
                <div class="d-flex flex-stack flex-wrap pt-10">
                    <div class="fs-6 fw-bold text-gray-700">Showing 1 to 10 of 50 entries</div>
                    <!--begin::Pages-->
                    <ul class="pagination">
                        <li class="page-item previous">
                            <a href="#" class="page-link">
                                <i class="previous"></i>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">4</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">5</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">6</a>
                        </li>
                        <li class="page-item next">
                            <a href="#" class="page-link">
                                <i class="next"></i>
                            </a>
                        </li>
                    </ul>
                    <!--end::Pages-->
                </div>
                <!--end::Pagination-->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/custom/pages/projects/list/list.js') }}"></script>
@endsection
