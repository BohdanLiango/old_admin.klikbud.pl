@extends('layouts.layout')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        {{--<!--begin::Toolbar-->--}}
        @include('app.klikbud.home.slider.components.toolbar_slider')
        {{--<!--end::Toolbar-->--}}
        <div class="post d-flex flex-column-fluid" id="kt_post">

        </div>
    </div>
@endsection
