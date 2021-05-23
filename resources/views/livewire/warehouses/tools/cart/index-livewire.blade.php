<div>
    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Section-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h3 text-dark">My Shopping Cart</span>
                </h3>
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline">
                        <a href="{{ route('warehouses.tools.show') }}" class="btn btn-primary font-weight-bolder font-size-sm">Powrót</a>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <div class="card-body">
                <!--begin::Shopping Cart-->
                <div class="table-responsive">
                    <table class="table">
                        <!--begin::Cart Header-->
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Qty</th>
                            <th class="text-right">Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <!--end::Cart Header-->
                        <tbody>
                        <!--begin::Cart Content-->
                        @forelse($tools as $tool)
                            <tr>
                                <td class="d-flex align-items-center font-weight-bolder">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                        @empty($tool->image_id)
                                            <div class="symbol-label" style="background-image: url({{ asset('media/static/no-image.jpg') }})"></div>
                                                @else
                                            <div class="symbol-label" style="background-image: url({{ Storage::disk(config('klikbud.disk_store'))->url($tool->image->path) }})"></div>
                                        @endempty
                                    </div>
                                    <!--end::Symbol-->
                                    <a href="{{ route('warehouses.tools.one', $tool->slug) }}" class="text-dark text-hover-primary" target="_blank">{{ $tool->title }}</a>
                                </td>
                                <td class="text-center align-middle">
                                    <span class="mr-2 font-weight-bolder">1</span>
                                </td>
                                <td class="text-right align-middle">
                                    <a href="#" class="btn btn-danger font-weight-bolder font-size-sm">Remove</a>
                                </td>
                            </tr>
                            @empty
                        @endforelse
                        <!--end::Cart Content-->
                        <!--begin::Cart Footer-->
                        <tr>
                            <td colspan="2"></td>
                            <td class="font-weight-bolder font-size-h4 text-right">Subtotal</td>
                            <td class="font-weight-bolder font-size-h4 text-right">$1538.00</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0 text-muted text-right pt-0">Excludes Delivery. GST Included</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0 pt-10">
                                <form>
                                    <div class="form-group row">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <label class="font-weight-bolder">Apply Voucher</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="input-group w-100">
                                                <input type="text" class="form-control" placeholder="Voucher Code" />
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary" type="button">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td colspan="2" class="border-0 text-right pt-10">
                                <a href="#" class="btn btn-success font-weight-bolder px-8">Proceed to Checkout</a>
                            </td>
                        </tr>
                        <!--end::Cart Footer-->
                        </tbody>
                    </table>
                </div>
                <!--end::Shopping Cart-->
            </div>
        </div>
        <!--end::Section-->
        <!--begin::Section-->
        <div class="card card-custom">
            <div class="card-body">
                <!--begin::Heading-->
                <div class="d-flex justify-content-between align-items-center mb-7">
                    <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Related Products</h2>
                    <a href="#" class="btn btn-light-primary btn-sm font-weight-bolder">View All</a>
                </div>
                <!--end::Heading-->
                <!--begin::Products-->
                <div class="row">
                    <!--begin::Product-->
                    <div class="col-md-4 col-xxl-4 col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless">
                            <div class="card-body p-0">
                                <!--begin::Image-->
                                <div class="overlay">
                                    <div class="overlay-wrapper rounded bg-light text-center">
                                        <img src="assets/media/products/1.png" alt="" class="mw-100 w-200px" />
                                    </div>
                                    <div class="overlay-layer">
                                        <a href="#" class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick View</a>
                                        <a href="#" class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                                    </div>
                                </div>
                                <!--end::Image-->
                                <!--begin::Details-->
                                <div class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                    <a href="#" class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">Smart Watches</a>
                                    <span class="font-size-lg">Outlines keep poorly thought</span>
                                </div>
                                <!--end::Details-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Product-->
                    <!--begin::Product-->
                    <div class="col-md-4 col-lg-12 col-xxl-4">
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless">
                            <div class="card-body p-0">
                                <!--begin::Image-->
                                <div class="overlay">
                                    <div class="overlay-wrapper rounded bg-light text-center">
                                        <img src="assets/media/products/2.png" alt="" class="mw-100 w-200px" />
                                    </div>
                                    <div class="overlay-layer">
                                        <a href="#" class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick View</a>
                                        <a href="#" class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                                    </div>
                                </div>
                                <!--end::Image-->
                                <!--begin::Details-->
                                <div class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                    <a href="#" class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">Headphones</a>
                                    <span class="font-size-lg">Outlines keep poorly thought</span>
                                </div>
                                <!--end::Details-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Product-->
                    <!--begin::Product-->
                    <div class="col-md-4 col-lg-12 col-xxl-4">
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless">
                            <div class="card-body p-0">
                                <!--begin::Image-->
                                <div class="overlay">
                                    <div class="overlay-wrapper rounded bg-light text-center">
                                        <img src="assets/media/products/3.png" alt="" class="mw-100 w-200px" />
                                    </div>
                                    <div class="overlay-layer">
                                        <a href="#" class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick View</a>
                                        <a href="#" class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a>
                                    </div>
                                </div>
                                <!--end::Image-->
                                <!--begin::Details-->
                                <div class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                    <a href="#" class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">Smart Drones</a>
                                    <span class="font-size-lg">Outlines keep poorly thought</span>
                                </div>
                                <!--end::Details-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Product-->
                </div>
                <!--end::Products-->
            </div>
        </div>
        <!--end::Section-->
    </div>
</div>
