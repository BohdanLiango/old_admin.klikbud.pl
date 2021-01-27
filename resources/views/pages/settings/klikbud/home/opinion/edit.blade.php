{{-- Extends layout --}}
@extends('layout.default')
{{-- Content --}}
@section('content')
    @livewire('settings.klikbud.home.opinion.edit-form', ['id' => $id])
@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
@endsection
