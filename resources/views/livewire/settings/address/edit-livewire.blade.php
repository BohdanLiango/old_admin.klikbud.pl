<div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-toolbar float-left">
                        <a href="{{ route('settings.address.show') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-xs"></i>{{ trans('admin_klikbud/settings/address.button-back') }}
                        </a>
                        @if($errors->any())
                            <a href="#" class="btn btn-light-danger font-weight-bolder mr-2">
                                <i class="la la-warning icon-xs"></i>  {{ trans('admin_klikbud/settings/address.error-validation') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <form class="form" id="kt_form" method="POST" wire:submit.prevent="edit" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="my-5">

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">{{ trans('admin_klikbud/settings/address.title') }}</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model.lazy="title" />
                                            @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">{{ trans('admin_klikbud/settings/address.country') }}</label>
                                        <div wire:ignore class="col-lg-9 col-md-9 col-sm-12">
                                            <select  class="form-control selectpicker @error('selectCountryId') is-invalid @enderror" data-size="5" data-live-search="true" wire:model="selectCountryId">
                                                <option value="{{ NULL }}"></option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('selectCountryId')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    @if(((int)$typeId === 3 || (int)$typeId === 4) && !is_null($selectCountryId))
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{ trans('admin_klikbud/settings/address.add-button-state') }}</label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <select class="form-control  @error('selectStateId') is-invalid @enderror" data-size="5" data-live-search="true" wire:model="selectStateId">
                                                    <option value="{{ NULL }}"></option>
                                                    @if(!empty($states))
                                                        @foreach($states as $state)
                                                            <option value="{{ $state->id }}">{{ $state->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('selectStateId')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                    @endif

                                    @if((int)$typeId === 4 && !is_null($selectStateId))
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{ trans('admin_klikbud/settings/address.add-button-town') }}</label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <select class="form-control  @error('selectTownId') is-invalid @enderror" data-size="5" data-live-search="true" wire:model="selectTownId">
                                                    <option value="{{ NULL }}"></option>
                                                    @if(!empty($towns))
                                                        @foreach($towns as $town)
                                                            <option value="{{ $town->id }}">{{ $town->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('selectTownId')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <button type="submit" class="btn btn-warning">  <i class="ki ki-check icon-xs"></i>{{ trans('admin_klikbud/settings/address.edit') }}</button>
                            </div>
                            <div class="col-xl-2"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts_p')
        <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-select.js') }}"></script>
    @endpush
</div>
