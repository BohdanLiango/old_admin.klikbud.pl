<div>
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div wire:ignore class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    {{ trans('admin_klikbud/clients.title') }}
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('clients.show') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                    <i class="ki ki-long-arrow-back icon-sm"></i>
                    {{ trans('admin_klikbud/clients.buttons.back') }}
                </a>
                <div class="btn-group">
                    <button type="button" wire:click="store({{ 1 }})" class="btn btn-primary font-weight-bolder">
                        <i class="ki ki-check icon-sm"></i>
                        {{ trans('admin_klikbud/clients.buttons.save_form') }}
                    </button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </button>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="nav nav-hover flex-column">
                            <li class="nav-item">
                                <a href="#" wire:click="store({{2}})"class="nav-link">
                                    <i class="nav-icon flaticon2-reload"></i>
                                    <span class="nav-text">{{ trans('admin_klikbud/clients.buttons.button_save') }} & {{ trans('admin_klikbud/clients.buttons.button_continue') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" wire:click="store({{3}})"class="nav-link">
                                    <i class="nav-icon flaticon2-add-1"></i>
                                    <span class="nav-text">{{ trans('admin_klikbud/clients.buttons.button_save') }} & {{ trans('admin_klikbud/clients.buttons.button_add_new') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" wire:click="store({{1}})" class="nav-link">
                                    <i class="nav-icon flaticon2-power"></i>
                                    <span class="nav-text">{{ trans('admin_klikbud/clients.buttons.button_save') }} & {{ trans('admin_klikbud/clients.buttons.button_exit') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="form" id="kt_form">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="my-5">
                            <h3 class=" text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/clients.info') }}:</h3>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.first_name') }}</label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid  @error('first_name') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/clients.first_name') }}" wire:model.lazy="first_name"/>
                                    @error('first_name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.last_name') }}</label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid @error('last_name') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/clients.last_name') }}" wire:model.lazy="last_name"/>
                                    @error('first_name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.gender') }}</label>
                                <div class="col-9">
                                    <select wire:ignore class="form-control form-control-solid" wire:model="gender">
                                        <option value="">{{ trans('admin_klikbud/clients.select') }}...</option>
                                        @forelse($client_gender as $item)
                                            <option value="{{ $item['value'] }}">{{ $item['title'] }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.mobile') }}</label>
                                <div class="col-9">
                                    <div class="input-group input-group-solid">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                        <input type="text" class="form-control form-control-solid  @error('mobile') is-invalid @enderror"  placeholder="{{ trans('admin_klikbud/clients.mobile_placeholder') }}"  wire:model.lazy="mobile" />
                                        @error('mobile')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.email') }}</label>
                                <div class="col-9">
                                    <div class="input-group input-group-solid">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                        <input type="text" class="form-control form-control-solid @error('email') is-invalid @enderror"  placeholder="{{ trans('admin_klikbud/clients.email_placeholder') }}" wire:model.lazy="email"/>
                                        @error('email')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.site') }}</label>
                                <div class="col-9">
                                    <div class="input-group input-group-solid">
                                        <input type="text" class="form-control form-control-solid @error('site') is-invalid @enderror" placeholder="{{ trans('admin_klikbud/clients.site_placeholder') }}" wire:model.lazy="site"/>
                                        @error('site')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="my-5">
                            <h3 class=" text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/clients.address_detail') }}:</h3>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.address') }}</label>
                                <div wire:ignore class="col-9">
                                    <select  class="form-control selectpicker form-control-solid  @error('street_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="street_id">
                                        <option value="">{{ trans('admin_klikbud/clients.select') }}...</option>
                                        @forelse($address_street as $street)
                                            <option value="{{ $street->id }}">ul.{{ $street->title }} (m.{{ $street->city->title }} / woj.{{ $street->state->title }} / {{ $street->country->title }})</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('street_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.add_info') }}</label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid @error('add_info') is-invalid @enderror" placeholder="{{ trans('admin_klikbud/clients.add_info_placeholder') }}" type="text" wire:model.lazy="add_info"/>
                                    @error('add_info')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.number_house') }}</label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid @error('number_house') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/clients.number_house_placeholder') }}" wire:model.lazy="number_house"/>
                                    @error('number_house')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.number_flat') }}</label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid @error('number_flat') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/clients.number_flat_placeholder') }}" wire:model.lazy="number_flat"/>
                                    @error('number_flat')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.zip_code') }}</label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid @error('zip_code') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/clients.zip_code_placeholder') }}" wire:model.lazy="zip_code"/>
                                    @error('zip_code')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>


                        <div class="separator separator-dashed my-10"></div>
                        <div class="my-52">
                            <h3 class=" text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/clients.other') }}:</h3>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.language') }}</label>
                                <div wire:ignore class="col-9">
                                    <select  class="form-control selectpicker form-control-solid  @error('language_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="language_id">
                                        <option value="">{{ trans('admin_klikbud/clients.select') }}...</option>
                                        @forelse($language as $lang)
                                            <option value="{{ $lang['value'] }}">{{ $lang['title'] }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('language_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/clients.time_zone') }}</label>
                                <div wire:ignore class="col-9">
                                    <select  class="form-control selectpicker form-control-solid  @error('timezone_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="timezone_id">
                                        <option value="">{{ trans('admin_klikbud/clients.select') }}...</option>
                                        @forelse($time_zone as $time)
                                            <option data-offset="{{ $time['data-offset'] }}" value="{{ $time['value'] }}">{{ $time['title'] }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('timezone_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{ trans('admin_klikbud/clients.communication') }}</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div wire:ignore class="checkbox-inline">
                                        @forelse($client_communication as $comm)
                                            <label class="checkbox">
                                                <input name="communication" type="checkbox"  value="{{ $comm['value'] }}" wire:model="{{$comm['check']}}_check"/>
                                                <span></span>{{ $comm['title'] }}</label>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2"></div>
                </div>
            </form>
{{--            <!--end::Form-->--}}
        </div>
    </div>
</div>
