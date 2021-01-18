{{-- Extends layout --}}
@extends('layout.default')
{{-- Content --}}
@section('content')

    <br>
    <livewire:counter />



    <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
        </div>
        <button type="submit">GO TEST</button>
    </form>
















    {{-- Dashboard 1 --}}

{{--    <div class="row">--}}
{{--        <div class="col-lg-6 col-xxl-4">--}}
{{--            @include('pages.widgets._widget-1', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-lg-6 col-xxl-4">--}}
{{--            @include('pages.widgets._widget-2', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-lg-6 col-xxl-4">--}}
{{--            @include('pages.widgets._widget-3', ['class' => 'card-stretch card-stretch-half gutter-b'])--}}
{{--            @include('pages.widgets._widget-4', ['class' => 'card-stretch card-stretch-half gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-lg-6 col-xxl-4 order-1 order-xxl-1">--}}
{{--            @include('pages.widgets._widget-5', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-xxl-8 order-2 order-xxl-1">--}}
{{--            @include('pages.widgets._widget-6', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">--}}
{{--            @include('pages.widgets._widget-7', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">--}}
{{--            @include('pages.widgets._widget-8', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-lg-12 col-xxl-4 order-1 order-xxl-2">--}}
{{--            @include('pages.widgets._widget-9', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
