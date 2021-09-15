@isset($breadcrumbs)
<div class="toolbar" id="kt_toolbar">
{{--    <!--begin::Container-->--}}
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
{{--        <!--begin::Page title-->--}}
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ $page_title ?? '' }}</h1>
            @if(count($breadcrumbs) !== 1)
            {{--<!--end::Title-->--}}
            {{--<!--begin::Separator-->--}}
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            {{--<!--end::Separator-->--}}
            {{--<!--begin::Breadcrumb-->--}}
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                @foreach($breadcrumbs as $breadcrumb)
                    @if($breadcrumb > $loop->last)
                        <li class="breadcrumb-item text-muted"><a href="{{ $breadcrumb['link'] }}" class="text-muted text-hover-primary">{{ $breadcrumb['title'] }}</a></li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
                    @else
                        <li class="breadcrumb-item text-muted"><a href="{{ $breadcrumb['link'] }}" class="text-muted text-hover-primary">{{ $breadcrumb['title'] }}</a></li>
                    @endif
                @endforeach
            </ul>
            {{--<!--end::Breadcrumb-->--}}
            @endif
        </div>
{{--        <!--end::Page title-->--}}
{{--        <!--begin::Actions-->--}}
        @if(isset($filter_button) || isset($add_button))
        <div class="d-flex align-items-center py-1">
                @includeWhen($filter_button, $filter_button_view)
            @if($add_button === true)
{{--            <!--begin::Button-->--}}
            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Create</a>
{{--            <!--end::Button-->--}}
            @endif
        </div>
        @endif
{{--        <!--end::Actions-->--}}
    </div>
{{--    <!--end::Container-->--}}
</div>
@endisset
