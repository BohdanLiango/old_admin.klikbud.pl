@extends('layouts.layout')
@section('content')
    @livewire('data.address.add-livewire', ['type' => $type])
@endsection
