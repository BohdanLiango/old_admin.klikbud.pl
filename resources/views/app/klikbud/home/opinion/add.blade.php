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
                                    <div class="mb-0">
                                        <div class="row gx-10 mb-5">

                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Imię lub nazwa autora</label>
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" placeholder="Żółty napis" />
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Usługa</label>
                                                    <select class="form-select form-select form-select-solid " data-control="select2" data-placeholder="Select an option">
                                                        <option></option>
                                                        <option value="1">Option 1</option>
                                                        <option value="2">Option 2</option>
                                                    </select>
                                            </div>

                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Ocena</label>


                                                <div class="rating">
                                                    <!--begin::Reset rating-->
                                                    <label class="btn btn-light fw-bolder btn-sm rating-label me-3" for="kt_rating_2_input_0">
                                                        Reset
                                                    </label>
                                                    <input class="rating-input" name="rating2" value="0" checked type="radio" id="kt_rating_2_input_0"/>
                                                    <!--end::Reset rating-->

                                                    <!--begin::Star 1-->
                                                    <label class="rating-label" for="kt_rating_2_input_1">
                                                        <span class="svg-icon svg-icon-1"><!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen029.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black"/>
</svg></span>
                                                            <!--end::Svg Icon--></span>
                                                    </label>
                                                    <input class="rating-input" name="rating2" value="1" type="radio" id="kt_rating_2_input_1"/>
                                                    <!--end::Star 1-->

                                                    <!--begin::Star 2-->
                                                    <label class="rating-label" for="kt_rating_2_input_2">
                                                        <span class="svg-icon svg-icon-1"><!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen029.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black"/>
</svg></span>
                                                            <!--end::Svg Icon--></span>
                                                    </label>
                                                    <input class="rating-input" name="rating2" value="2" type="radio" id="kt_rating_2_input_2"/>
                                                    <!--end::Star 2-->

                                                    <!--begin::Star 3-->
                                                    <label class="rating-label" for="kt_rating_2_input_3">
                                                        <span class="svg-icon svg-icon-1"><!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen029.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black"/>
</svg></span>
                                                            <!--end::Svg Icon--></span>
                                                    </label>
                                                    <input class="rating-input" name="rating2" value="3" type="radio" checked="checked" id="kt_rating_2_input_3"/>
                                                    <!--end::Star 3-->

                                                    <!--begin::Star 4-->
                                                    <label class="rating-label" for="kt_rating_2_input_4">
                                                        <span class="svg-icon svg-icon-1"><!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen029.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black"/>
</svg></span>
                                                            <!--end::Svg Icon--></span>
                                                    </label>
                                                    <input class="rating-input" name="rating2" value="4" type="radio" id="kt_rating_2_input_4"/>
                                                    <!--end::Star 4-->

                                                    <!--begin::Star 5-->
                                                    <label class="rating-label" for="kt_rating_2_input_5">
                                                        <span class="svg-icon svg-icon-1"><!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen029.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black"/>
</svg></span>
                                                            <!--end::Svg Icon--></span>
                                                    </label>
                                                    <input class="rating-input" name="rating2" value="5" type="radio" id="kt_rating_2_input_5"/>
                                                    <!--end::Star 5-->
                                                </div>



                                            </div>

                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Portal</label>
                                                <select class="form-select form-select form-select-solid " data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <option value="1">Option 1</option>
                                                    <option value="2">Option 2</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Data</label>
                                                <input class="form-control" placeholder="Pick a date" id="kt_datepicker_1"/>
                                            </div>

                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Opinia</label>
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Krótki opis" data-kt-autosize="true"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <a href="#" class="btn btn-success">Success</a>
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
