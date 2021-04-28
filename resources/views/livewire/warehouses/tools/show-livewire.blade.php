<div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="d-flex flex-row">
                    <div class="flex-row-fluid">
                        <div class="row">
                            <div class="col-md-7 col-lg-12 col-xxl-7">
                                @include('livewire.warehouses.tools.block.show.tool-info')
                            </div>
                            <div class="col-md-5 col-lg-12 col-xxl-5">
                                @include('livewire.warehouses.tools.block.show.last-repair')
                                @include('livewire.warehouses.tools.block.show.last-buy-accessories')
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xxl-12">
                        @if($tool['is_box'] === 1)
                            @include('livewire.warehouses.tools.block.show.box-tools')
                        @endif
                        </div>
                        @include('livewire.warehouses.tools.block.show.last-global-status')
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
        window.addEventListener('openChangeStatusModal', event => {
            $("#changeStatusModal").modal('show')
        })
        window.addEventListener('closeChangeStatusModal', event => {
            $("#changeStatusModal").modal('hide')
        })
        window.addEventListener('openChangeBoxModal', event => {
            $("#changeBoxModal").modal('show')
        })
        window.addEventListener('closeChangeBoxModal', event => {
            $("#changeBoxModal").modal('hide')
        })
        window.addEventListener('openChangeGlobalStatusWarehouseModal', event => {
            $("#globalStatusWarehouse").modal('show')
        })
        window.addEventListener('closeChangeGlobalStatusWarehouseModal', event => {
            $("#globalStatusWarehouse").modal('hide')
        })
        window.addEventListener('openChangeGlobalStatusModalBusiness', event => {
            $("#globalStatusBusiness").modal('show')
        })
        window.addEventListener('closeChangeGlobalStatusModalBusiness', event => {
            $("#globalStatusBusiness").modal('hide')
        })
        window.addEventListener('openChangeGlobalStatusModalClients', event => {
            $("#globalStatusClients").modal('show')
        })
        window.addEventListener('closeChangeGlobalStatusModalClients', event => {
            $("#globalStatusClients").modal('hide')
        })
        window.addEventListener('openChangeGlobalStatusModalObjects', event => {
            $("#globalStatusObjects").modal('show')
        })
        window.addEventListener('closeChangeGlobalStatusModalObjects', event => {
            $("#globalStatusObjects").modal('hide')
        })
    </script>
</div>
