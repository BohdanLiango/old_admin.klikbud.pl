@extends('layouts.layout')
@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{ trans('data/address/index.title') }}</span>
                <span class="text-muted mt-1 fw-bold fs-7">{{trans('data/address/index.sub_t_1')}} {{ $countAddress }} {{trans('data/address/index.sub_t_2')}}</span>
            </h3>
            <div class="card-toolbar">
               @include('app.data.address.menu-button')
            </div>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                    <thead>
                    <tr class="fw-bolder text-muted">
                        <th class="min-w-150px">{{ trans('data/address/index.table.id') }}</th>
                        <th class="min-w-140px">{{ trans('data/address/index.table.title') }}</th>
                        <th class="min-w-120px">{{ trans('data/address/index.table.type') }}</th>
                        <th class="min-w-120px">{{ trans('data/address/index.table.address') }}</th>
                        <th class="min-w-120px">{{ trans('data/address/index.table.info') }}</th>
                        <th class="min-w-100px text-end">{{ trans('data/address/index.table.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @livewire('data.address.index-livewire', ['types' => $types])
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
