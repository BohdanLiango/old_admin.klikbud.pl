{{-- Extends layout --}}
@extends('layout.default')
{{-- Content --}}
@section('content')
    @livewire('settings.klikbud.contact.show-livewire',  ['id' => $id])
@endsection
