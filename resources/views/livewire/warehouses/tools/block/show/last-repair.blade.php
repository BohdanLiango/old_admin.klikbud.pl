<div class="card card-custom card-stretch card-stretch-half gutter-b">
    {{--                                    <!--begin::Header-->--}}
    <div class="card-header border-0 pt-6 mb-2">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bold font-size-h4 text-dark-75 mb-3">Ostatnie naprawy</span>
            <span class="text-muted font-weight-bold font-size-sm">0.00 zł</span>
        </h3>
        <div class="card-toolbar">
            <a href="#" class="btn btn-light-info btn-sm font-weight-bolder font-size-sm py-3 px-6">Dodaj</a>
        </div>
    </div>
{{--    <!--end::Header-->--}}
{{--    <!--begin::Body-->--}}
    <div class="card-body pt-2">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-borderless mb-0">
                <tbody>
                <!--begin::Item-->
                <tr>
                    <td class="w-40px align-middle pb-6 pl-0 pr-2">

                        <div class="symbol symbol-40 symbol-light-success">
                            <span class="symbol-label">
                                    <span class="svg-icon svg-icon-lg svg-icon-success">
                                       {{ dd($random_icons->random(1)[0]) }}
                                    </span>
                            </span>
                        </div>

                    </td>
                    <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">Top Authors</td>
                    <td class="font-weight-bold text-muted text-right align-middle pb-6">4600 Users</td>
                    <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-6">5.4MB</td>
                </tr>
                <!--end::Item-->
                </tbody>
            </table>
        </div>
{{--        <!--end::Table-->--}}
    </div>
{{--    <!--end::Body-->--}}
</div>
