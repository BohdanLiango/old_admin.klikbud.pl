@extends('layouts.layout')
@section('content')
    @livewire('data.address.index-livewire', ['types' => $types, 'countAddress' => $countAddress])
@endsection
