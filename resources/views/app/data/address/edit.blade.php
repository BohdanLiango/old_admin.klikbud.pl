@extends('layouts.layout')
@section('content')
    @livewire('data.address.edit-livewire', ['type' => $type])
@endsection
