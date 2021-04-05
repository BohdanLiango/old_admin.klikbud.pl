<div class="d-flex flex-column-fluid container row">
    <div class="col-xl-4">
        {{--<!--begin::Mixed Widget 19-->--}}
        <div class="card card-custom gutter-b" style="height: 200px;">
            {{--<!--begin::Body-->--}}
            <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center justify-content-between flex-grow-1">
                    <div class="mr-2">
                        <h3 class="font-weight-bolder">Tools all</h3>
                    </div>
                    <div class="font-weight-boldest font-size-h1 text-info">{{ $countAll }}</div>
                </div>
                <div class="pt-8">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="text-muted font-weight-bold mr-2">{{ trans('admin_klikbud/settings/klikbud/gallery.widget.percent') }}</div>
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
                        <h3 class="font-weight-bolder">Tools Active</h3>
                    </div>
                    <div class="font-weight-boldest font-size-h1 text-info">{{ $countActive }}</div>
                </div>
                <div class="pt-8">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="text-muted font-weight-bold mr-2">{{ trans('admin_klikbud/settings/klikbud/gallery.widget.percent') }}</div>
                        <div class="text-muted font-weight-bold">{{ $percentActive }}%</div>
                    </div>
                    <div class="progress bg-light-info progress-xs">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $percentActive }}%;" aria-valuenow="60"
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
                        <h3 class="font-weight-bolder">Count Deleted</h3>
                    </div>
                    <div class="font-weight-boldest font-size-h1 text-info">{{ $countDeleted }}</div>
                </div>
                <div class="pt-8">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="text-muted font-weight-bold mr-2">{{ trans('admin_klikbud/settings/klikbud/gallery.widget.percent') }}</div>
                        <div class="text-muted font-weight-bold">{{ $percentDeleted }}%</div>
                    </div>
                    <div class="progress bg-light-info progress-xs">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $percentDeleted }}%;" aria-valuenow="60"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            {{--<!--end::Body-->--}}
        </div>
        {{--<!--end::Mixed Widget 19-->--}}
    </div>
</div>
