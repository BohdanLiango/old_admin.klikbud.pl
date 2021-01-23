{{-- Extends layout --}}
@extends('layout.default')
{{-- Content --}}
@section('content')
    @livewire('settings.klikbud.home.main-slider.edit', ['id' => $id])
@endsection

