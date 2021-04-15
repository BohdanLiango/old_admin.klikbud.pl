<div class="d-flex flex-column-fluid container row">
    <div class="col-xl-4">
        <div class="card card-custom gutter-b" style="height: 200px;">
            <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center justify-content-between flex-grow-1">
                    <div class="mr-2">
                        <h3 class="font-weight-bolder">{{ trans('admin_klikbud/warehouse/tools.index.widget.1.title') }}</h3>
                    </div>
                    <div class="font-weight-boldest font-size-h1 text-primary">{{ $countAll }}</div>
                </div>
                <div class="pt-8">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="text-muted font-weight-bold mr-2">{{ trans('admin_klikbud/warehouse/tools.index.widget.1.percent') }}</div>
                        <div class="text-muted font-weight-bold">100%</div>
                    </div>
                    <div class="progress bg-light-primary progress-xs">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="60"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card card-custom gutter-b" style="height: 200px;">
            <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center justify-content-between flex-grow-1">
                    <div class="mr-2">
                        <h3 class="font-weight-bolder">{{ trans('admin_klikbud/warehouse/tools.index.widget.2.title') }}</h3>
                    </div>
                    <div class="font-weight-boldest font-size-h1 text-success">{{ $countActive }}</div>
                </div>
                <div class="pt-8">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="text-muted font-weight-bold mr-2">{{ trans('admin_klikbud/warehouse/tools.index.widget.1.percent') }}</div>
                        <div class="text-muted font-weight-bold">{{ $percentActive }}%</div>
                    </div>
                    <div class="progress bg-light-success progress-xs">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentActive }}%;" aria-valuenow="60"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card card-custom gutter-b" style="height: 200px;">
            <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center justify-content-between flex-grow-1">
                    <div class="mr-2">
                        <h3 class="font-weight-bolder">{{ trans('admin_klikbud/warehouse/tools.index.widget.3.title') }}</h3>
                    </div>
                    <div class="font-weight-boldest font-size-h1 text-danger">{{ $countDeleted }}</div>
                </div>
                <div class="pt-8">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="text-muted font-weight-bold mr-2">{{ trans('admin_klikbud/warehouse/tools.index.widget.1.percent') }}</div>
                        <div class="text-muted font-weight-bold">{{ $percentDeleted }}%</div>
                    </div>
                    <div class="progress bg-light-danger progress-xs">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $percentDeleted }}%;" aria-valuenow="60"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
