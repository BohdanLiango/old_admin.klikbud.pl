<div>
    <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">{{ trans('data/address/add.add') }} : {{ $typeTitle }}</span>
                    <span class="text-muted mt-1 fw-bold fs-7"></span>
                </h3>
                <div class="card-toolbar">
                    <div class="me-4">
                        <a href="{{ url()->previous() }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-xs"></i>{{ trans('data/address/add.button-back') }}
                        </a>
                        @if($errors->any())
                            <a href="#" class="btn btn-light-danger font-weight-bolder mr-2">
                                <i class="la la-warning icon-xs"></i> {{ trans('admin_klikbud/settings/address.error-validation') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body py-3">
                <form class="form" id="kt_form" method="POST"  enctype="multipart/form-data" wire:submit.prevent="save">
                    @csrf
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="py-5">

                                <div class="form-group row mb-10">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{ trans('data/address/add.title') }}</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model.lazy="title" />
                                        @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-10">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{ trans('data/address/add.country') }}</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12" wire:ignore>
                                        <select id="select2-dropdown country-select2" class="form-select @error('selectCountryId') is-invalid @enderror kl-select2" data-control="select2" data-placeholder="{{ trans('data/address/add.select_option') }}" wire:model="selectCountryId">
                                            <option value="{{NULL}}"></option>
                                            @forelse($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->title }}</option>
                                                @empty
                                                <option value="{{NULL}}"></option>
                                            @endforelse
                                        </select>
                                        @error('selectCountryId')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                @if(((int)$typeId === 3 || (int)$typeId === 4) && !is_null($selectCountryId))
                                HUJ
                                <div class="form-group row mb-10" wire:ignore>
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{ trans('data/address/add.state') }}</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <select id="select2-dropdown" class="form-select @error('selectStateId') is-invalid @enderror kl-select2" data-control="select2" data-placeholder="{{ trans('data/address/add.select_option') }}" wire:model="selectStateId">
                                            <option value="{{ NULL }}"></option>
                                            @forelse($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->title }}</option>
                                                    @empty
                                                <option value="{{ NULL }}"></option>
                                            @endforelse
                                        </select>
                                        @error('selectStateId')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                @endif

                                @if((int)$typeId === 4 && !is_null($selectStateId))
                                <div class="form-group row mb-10">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{ trans('data/address/add.town') }}</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <select class="form-select @error('selectTownId') is-invalid @enderror kl-select2" data-control="select2" data-placeholder="{{ trans('data/address/add.select_option') }}" wire:model="selectTownId">
                                            <option value="{{ NULL }}"></option>
                                            @forelse($towns as $town)
                                                <option value="{{ $town->id }}">{{ $town->title }}</option>
                                                @empty
                                                <option value="{{ NULL }}"></option>
                                            @endforelse
                                        </select>
                                        @error('selectTownId')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="ki ki-check icon-xs"></i>{{ trans('data/address/add.save') }}</button>
                </form>

            </div>
        </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.country-select2').select2();
            });
        </script>
    @endpush
</div>

