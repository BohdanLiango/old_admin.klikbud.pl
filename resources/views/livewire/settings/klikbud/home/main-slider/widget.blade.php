<div class="col-xl-4">
    {{--<!--begin::Mixed Widget 19-->--}}
    <div class="card card-custom gutter-b" style="height: 200px;">
        {{--<!--begin::Body-->--}}
        <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between flex-grow-1">
                <div class="mr-2">
                    <h3 class="font-weight-bolder">{{ trans('admin_klikbud/settings/klikbud/main-slider.show.widget.count_sliders') }}</h3>
                    <div class="text-muted font-size-lg mt-2">
                        {{ trans('admin_klikbud/settings/klikbud/main-slider.show.widget.active') }}
                        <b>{{ $count }} </b> - ({{ $percent_all_active }}%)
                        <br>
                        {{ trans('admin_klikbud/settings/klikbud/main-slider.show.widget.deleted') }}
                        <b>{{ $count_deleted }}</b> - ({{ $percent_all_deleted }}%)
                    </div>
                </div>
                <div class="font-weight-boldest font-size-h1 text-info">{{ $count }}</div>
            </div>
            <div class="pt-8">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div
                        class="text-muted font-weight-bold mr-2">{{ trans('admin_klikbud/settings/klikbud/main-slider.show.widget.percent') }}</div>
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
                    <h3 class="font-weight-bolder">{{ trans('admin_klikbud/settings/klikbud/main-slider.show.widget.active') }}</h3>
                    <div class="text-muted font-size-lg mt-2"></div>
                </div>
                <div class="font-weight-boldest font-size-h1 text-success">{{ $count_active_status }}</div>
            </div>
            <div class="pt-8">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div
                        class="text-muted font-weight-bold mr-2">{{ trans('admin_klikbud/settings/klikbud/main-slider.show.widget.percent') }}</div>
                    <div class="text-muted font-weight-bold">{{ $percent_to_active_all }}%</div>
                </div>
                <div class="progress bg-light-success progress-xs">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percent_to_active_all }}%;" aria-valuenow="60"
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
                    <h3 class="font-weight-bolder">{{ trans('admin_klikbud/settings/klikbud/main-slider.show.widget.hidden') }}</h3>
                    <div class="text-muted font-size-lg mt-2"></div>
                </div>
                <div class="font-weight-boldest font-size-h1 text-warning">{{ $count_hidden_status }}</div>
            </div>
            <div class="pt-8">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div
                        class="text-muted font-weight-bold mr-2">{{ trans('admin_klikbud/settings/klikbud/main-slider.show.widget.percent') }}</div>
                    <div class="text-muted font-weight-bold">{{ $percent_to_hidden_all }}%</div>
                </div>
                <div class="progress bg-light-warning progress-xs">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $percent_to_hidden_all }}%;" aria-valuenow="60"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        {{--<!--end::Body-->--}}
    </div>
    {{--<!--end::Mixed Widget 19-->--}}
</div>
