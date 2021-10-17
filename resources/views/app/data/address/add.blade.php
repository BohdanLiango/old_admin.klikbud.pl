@extends('layouts.layout')
@section('styles')
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @livewire('data.address.add-livewire', ['type' => $type])
@endsection
@section('scripts')
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/documentation/documentation.js') }}"></script>
    <script src="{{ asset('assets/js/custom/documentation/search.js') }}"></script>
    <script src="{{ asset('assets/js/custom/documentation/forms/select2.js') }}"></script>
@endsection
