@extends('layouts.layout')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
       @include('app.klikbud.home.slider.components.add.toolbar')
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                        <div class="card">
                            <div class="card-body p-12">
                                <form action="" id="kt_invoice_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex flex-column align-items-start flex-xxl-row">
                                        <div class="d-flex align-items-center flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Specify invoice date">
                                            <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Numer suwaka:</div>
                                            <div class="position-relative d-flex align-items-center w-150px">
                                                <input type="number" class="form-control form-control-flush fw-bolder text-muted fs-3 w-100px" value="" placehoder="..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="mb-0">
                                        <div class="row gx-10 mb-5">
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Obraz do slideer</label>
                                                <div class="mb-5">
                                                    <input type="file" class="form-control form-control-solid" />
                                                </div>
                                                <div class="mb-5">
                                                    <img src="{{ asset('assets/media/klikbud/welcome/logo-line-1920.jpg') }}" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Obraz oryginalny</label>
                                                <div class="mb-5">
                                                    <input type="file" class="form-control form-control-solid" />
                                                </div>
                                                <div class="mb-5">
                                                    <img src="{{ asset('assets/media/klikbud/welcome/logo-line-1920.jpg') }}" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="mb-0">
                                        <div class="row gx-10 mb-5">
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Polish</label>
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" placeholder="Żółty napis" />
                                                </div>
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Krótki opis"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tekst</label>
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" placeholder="Czarny napis" />
                                                </div>
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="CEO do obraza"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="mb-0">
                                        <div class="row gx-10 mb-5">
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">English</label>
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" placeholder="Żółty napis" />
                                                </div>
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Krótki opis"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tekst</label>
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" placeholder="Czarny napis" />
                                                </div>
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="CEO do obraza"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="mb-0">
                                        <div class="row gx-10 mb-5">
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Українська</label>
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" placeholder="Żółty napis" />
                                                </div>
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Krótki opis"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tekst</label>
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" placeholder="Czarny napis" />
                                                </div>
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="CEO do obraza"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="mb-0">
                                        <div class="row gx-10 mb-5">
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Русский</label>
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" placeholder="Żółty napis" />
                                                </div>
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Krótki opis"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tekst</label>
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" placeholder="Czarny napis" />
                                                </div>
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="CEO do obraza"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="mb-0">
                                        <label class="form-label fs-6 fw-bolder text-gray-700">Notes</label>
                                        <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Thanks for your business"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/custom/apps/invoices/create.js') }}"></script>
@endsection
