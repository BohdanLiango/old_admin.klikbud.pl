@extends('layouts.layout')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    @include('app.klikbud.home.slider.components.one.toolbar')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row g-6 g-xl-9">

                <div class="col-lg-6">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header mt-6">
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder mb-1">
                                    <a href="#" class="btn btn-primary"><i class="fas fa-download fs-4 me-2"></i> Slider</a>
                                    <a href="#" class="btn btn-primary"><i class="fas fa-download fs-4 me-2"></i> Original</a>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body p-9 pt-5">
                            <img src="{{ asset('assets/media/klikbud/welcome/logo-line-1920.jpg') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-flush h-lg-100">
                        <div class="card-body pt-10 pb-0 px-5">
                            <table class="table table-rounded table-row-bordered border gy-7 gs-7">
                                <thead>
                                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                    <th>Pozycje</th>
                                    <th>Dane</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Change Status</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>nr</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>Pełna ścieżka</td>
                                    <td>public/klikbud/Slider/1/1/1/1/0cd5eca904a5bc5c923f51debf1ea5ed</td>
                                </tr>
                                <tr>
                                    <td>Nazwa</td>
                                    <td>ULLs3voYPpg3X3uIbgjx6Bks1clD9lOIpGcLOVEi.jpg</td>
                                </tr>
                                <tr>
                                    <td>Skoroszyt</td>
                                    <td>0cd5eca904a5bc5c923f51debf1ea5ed</td>
                                </tr>
                                <tr>
                                    <td>Rozmiar</td>
                                    <td>0.17mb</td>
                                </tr>
                                <tr>
                                    <td>Mime</td>
                                    <td>image/jpeg</td>
                                </tr>
                                <tr>
                                    <td>Data dodania</td>
                                    <td>2021-02-28 01:09:19</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header mt-6">
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder mb-1">Tekst żółty</h3>
                            </div>
                        </div>
                        <div class="card-body p-9 pt-3">
                            <table class="table table-rounded table-row-bordered border gy-7 gs-7">
                                <thead>
                                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                    <th>Język</th>
                                    <th>Dane</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Change Status</td>
                                    <td>1</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header mt-6">
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder mb-1">Tekst Czarny</h3>
                            </div>
                        </div>
                        <div class="card-body p-9 pt-3">
                            <table class="table table-rounded table-row-bordered border gy-7 gs-7">
                                <thead>
                                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                    <th>Język</th>
                                    <th>Dane</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Change Status</td>
                                    <td>1</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header mt-6">
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder mb-1">Opis</h3>
                            </div>
                        </div>
                        <div class="card-body p-9 pt-3">
                            <table class="table table-rounded table-row-bordered border gy-7 gs-7">
                                <thead>
                                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                    <th>Język</th>
                                    <th>Dane</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Change Status</td>
                                    <td>1</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header mt-6">
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder mb-1">CEO</h3>
                            </div>
                        </div>
                        <div class="card-body p-9 pt-3">
                            <table class="table table-rounded table-row-bordered border gy-7 gs-7">
                                <thead>
                                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                    <th>Język</th>
                                    <th>Dane</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Change Status</td>
                                    <td>1</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-flush mt-6 mt-xl-9">
                <div class="card-header mt-5">
                    <div class="card-title flex-column">
                        <h3 class="fw-bolder mb-1">History</h3>
                        <div class="fs-6 text-gray-400">Total $260,300 sepnt so far</div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                            <!--begin::Head-->
                            <thead class="fs-7 text-gray-400 text-uppercase">
                            <tr>
                                <th class="min-w-250px">Manager</th>
                                <th class="min-w-150px">Date</th>
                                <th class="min-w-90px">Amount</th>
                                <th class="min-w-90px">Status</th>
                                <th class="min-w-50px text-end">Details</th>
                            </tr>
                            </thead>
                            <tbody class="fs-6">
                            <tr>
                                <td>
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Wrapper-->
                                        <div class="me-5 position-relative">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="assets/media/avatars/150-1.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column justify-content-center">
                                            <a href="" class="fs-6 text-gray-800 text-hover-primary">Emma Smith</a>
                                            <div class="fw-bold text-gray-400">e.smith@kpmg.com.au</div>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                </td>
                                <td>Aug 19, 2021</td>
                                <td>$473.00</td>
                                <td>
                                    <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-sm">View</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/custom/pages/projects/project/project.js') }}"></script>
@endsection
