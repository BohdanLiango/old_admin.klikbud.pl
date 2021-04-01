<div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        @include('livewire.warehouses.tools.block.index.subheader')
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="d-flex flex-row">
                    <div class="flex-column offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">
                      @include('livewire.warehouses.tools.block.index.aside-widgets')
                    </div>
                    <div class="flex-row-fluid ml-lg-8">
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-body">
                                <div class="mb-11">
                                    <div class="d-flex justify-content-between align-items-center mb-7">
                                        <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Smart Devices</h2>
                                        <a href="#" class="btn btn-light-primary btn-sm font-weight-bolder">View All</a>
                                    </div>
                                    <div class="row">
                                      @include('livewire.warehouses.tools.block.index.tools')
                                    </div>
                                    {{ $tools->links('vendor.livewire.bootstrap') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
