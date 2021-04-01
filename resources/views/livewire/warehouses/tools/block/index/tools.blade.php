@if(count($tools) !== 0)
    @foreach($tools as $tool)
    <div class="col-md-4 col-xxl-4 col-lg-12">
        <div class="card card-custom card-shadowless">
            <div class="card-body p-0">
                <div class="overlay">
                    <div class="overlay-wrapper rounded bg-light text-center">
                        @empty($tool->image_id)
                            <img src="{{ asset('media/static/no-image.jpg') }}" alt="" class="w-100 rounded" />
                        @else
                            <img src="{{ Storage::disk(config('klikbud.disk_store'))->url($tool->image->path) }}" alt="" class="w-100 rounded" />
                        @endempty
                    </div>
                    <div class="overlay-layer">
                        <a href="{{ route('warehouses.tools.one', $tool->slug) }}" class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick View</a>
                        <a href="#" class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                    </div>
                </div>
                <div class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                    <a href="#" class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">{{ $tool->title }}</a>
                    <span class="font-size-lg">Outlines keep poorly thought</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif
