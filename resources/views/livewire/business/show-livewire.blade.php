<div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ trans('admin_klikbud/clients.one.view_contakt') }}</h5>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $business['title_short'] }}</span>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{ route('business.show') }}" class="btn btn-default font-weight-bold mr-2">{{ trans('admin_klikbud/clients.one.buttons.back') }}</a>
                    <a href="{{ route('business.add', 'department') }}" class="btn btn-success font-weight-bold">{{ trans('admin_klikbud/clients.one.buttons.edit') }}</a>
                </div>
            </div>
        </div>
        @include('livewire.business.block.show.show-delete-modal')
        @include('livewire.business.block.show.show-delete-department-modal')
        <div class="d-flex flex-column-fluid">
            <div class="container">
                @include('livewire.business.block.show.show-info')
                <div class="row">
                        @include('livewire.business.block.show.show-departments')
                    <div class="col-xl-4">
                        {{--@include('livewire.clients.block.one-notice')--}}
{{--                        @include('livewire.clients.block.show.show-client-left-data')--}}
                    </div>
                    <div class="col-xl-8">
                        <div class="card card-custom gutter-b">
{{--                            @include('livewire.clients.block.show.show-menu-toolbar')--}}
{{--                            <div class="card-body px-0">--}}
{{--                                <div class="tab-content pt-5">--}}
{{--                                    @include('livewire.clients.block.show.show-menu-one')--}}
{{--                                    @include('livewire.clients.block.show.show-menu-four')--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.addEventListener('openDeleteModal', event => {
            $("#deleteModal").modal('show')
        })
        window.addEventListener('closeDeleteModal', event => {
            $("#deleteModal").modal('hide')
        })
        window.addEventListener('openDeleteDepartmentModal', event => {
            $("#deleteDepartmentModal").modal('show')
        })
        window.addEventListener('closeDeleteDepartmentModal', event => {
            $("#deleteDepartmentModal").modal('hide')
        })
    </script>
</div>
