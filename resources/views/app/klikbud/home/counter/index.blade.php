@extends('layouts.layout')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        {{--<!--begin::Toolbar-->--}}
        @include('app.klikbud.home.slider.components.toolbar_slider')
        {{--<!--end::Toolbar-->--}}
            <div class="card card-flush mt-12 mt-xl-12">
                <div class="card-header mt-5">
                    <div class="card-title flex-column">
                        <h3 class="fw-bolder mb-1">Liczniki</h3>
                    </div>
                </div>
                <div class="separator separator-dashed my-10"></div>
                <div class="card-body pt-0">
                    <div class="input-group mb-5">
                        <span class="input-group-text" id="inputGroup-sizing-default">Ilośc SKOŃCZONYCH PROJEKTÓW</span>
                        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                    </div>
                    <div class="input-group mb-5">
                        <span class="input-group-text" id="inputGroup-sizing-default">Ilośc ZADOWOLONYCH KLIENTÓW</span>
                        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                    </div>
                    <div class="input-group mb-5">
                        <span class="input-group-text" id="inputGroup-sizing-default">Ilośc ZATRUDNIONYCH SPECJALISTÓW</span>
                        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                    </div>
                    <div class="input-group mb-5">
                        <span class="input-group-text" id="inputGroup-sizing-default">Ilośc OPINII</span>
                        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <a href="#" class="btn btn-light-success">Success</a>
                    <a href="#" class="btn btn-light-dark">Dark</a>
                </div>
            </div>
    </div>
@endsection

