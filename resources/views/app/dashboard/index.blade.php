@extends('layouts.layout')
@section('content')
@endsection
@section('scripts')
{{--    <!--begin::Page Vendors Javascript(used by this page)-->--}}
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
{{--    <!--end::Page Vendors Javascript-->--}}
{{--    <!--begin::Page Custom Javascript(used by this page)-->--}}
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
{{--    <!--end::Page Custom Javascript-->--}}
@endsection
