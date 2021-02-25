<div class="col-xl-4">
    {{--<!--begin::Mixed Widget 19-->--}}
    <div class="card card-custom gutter-b" style="height: 200px;">
        {{--<!--begin::Body-->--}}
        <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between flex-grow-1">
                <div class="mr-2">
                    <h3 class="font-weight-bolder">{{ trans('admin_klikbud/settings/klikbud/opinion.widget.widget_1') }}</h3>
                    <div class="text-muted font-size-lg mt-2">
                        <b>{{ trans('admin_klikbud/settings/klikbud/opinion.widget.count_opinion') }}</b>  - {{ $count_all }}
                    </div>
                </div>
                <div class="font-weight-boldest font-size-h1 text-info">{{ $ocena_half }}</div>
            </div>
            <div class="pt-8">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div
                        class="text-muted font-weight-bold mr-2">{{ trans('admin_klikbud/settings/klikbud/opinion.widget.percent') }}</div>
                    <div class="text-muted font-weight-bold">100%</div>
                </div>
                <div class="progress bg-light-info progress-xs">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%;" aria-valuenow="60"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        {{--<!--end::Body-->--}}
    </div>
    {{--<!--end::Mixed Widget 19-->--}}
</div>
<div class="col-xl-4">
    {{--<!--begin::Mixed Widget 19-->--}}
    <div class="card card-custom gutter-b" style="height: 200px;">
        {{--<!--begin::Body-->--}}
        <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between flex-grow-1">
                <div class="mr-2">
                    <h3 class="font-weight-bolder">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</h3>
                    <div class="text-muted font-size-lg mt-2"></div>
                </div>
                <div class="font-weight-boldest font-size-h1 text-success">{{ $status_active }}</div>
            </div>
            <div class="pt-8">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div
                        class="text-muted font-weight-bold mr-2">{{ trans('admin_klikbud/settings/klikbud/opinion.widget.percent') }}</div>
                    <div class="text-muted font-weight-bold">{{ $percent_active }}%</div>
                </div>
                <div class="progress bg-light-success progress-xs">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percent_active }}%;" aria-valuenow="60"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        {{--<!--end::Body-->--}}
    </div>
    {{--<!--end::Mixed Widget 19-->--}}
</div>
<div class="col-xl-4">
    {{--<!--begin::Mixed Widget 19-->--}}
    <div class="card card-custom gutter-b" style="height: 200px;">
        {{--<!--begin::Body-->--}}
        <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between flex-grow-1">
                <div class="mr-2">
                    <h3 class="font-weight-bolder">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</h3>
                    <div class="text-muted font-size-lg mt-2"></div>
                </div>
                <div class="font-weight-boldest font-size-h1 text-warning">{{ $status_disable }}</div>
            </div>
            <div class="pt-8">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div
                        class="text-muted font-weight-bold mr-2">{{ trans('admin_klikbud/settings/klikbud/opinion.widget.percent') }}</div>
                    <div class="text-muted font-weight-bold">{{ $percent_disable }}%</div>
                </div>
                <div class="progress bg-light-warning progress-xs">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $percent_disable }}%;" aria-valuenow="60"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        {{--<!--end::Body-->--}}
    </div>
    {{--<!--end::Mixed Widget 19-->--}}
</div>
