<div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        {{--<!--begin::Subheader-->--}}
        @include('livewire.objects.block.one.subheader')
        {{--<!--end::Subheader-->--}}
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid">
                {{--<!--begin::Info-->--}}
                @include('livewire.objects.block.one.info')
                {{--<!--end::Info-->--}}
                <div class="row">
                    <div class="col-lg-8">
                        @include('livewire.objects.block.one.fakture')
                    </div>
                    <div class="col-lg-4">
                        @include('livewire.objects.block.one.delivery')
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        @include('livewire.objects.block.one.tools')
                    </div>
                    <div class="col-lg-4">
                       @include('livewire.objects.block.one.employee')
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        @include('livewire.objects.block.one.task')
                    </div>
                    <div class="col-lg-6">
                        @include('livewire.objects.block.one.comments')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
