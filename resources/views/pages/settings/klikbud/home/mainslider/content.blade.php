{{-- Extends layout --}}
@extends('layout.default')
{{-- Content --}}
@section('content')
  @livewire('settings.klikbud.home.main-slider.show')
@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}"></script>
@endsection
