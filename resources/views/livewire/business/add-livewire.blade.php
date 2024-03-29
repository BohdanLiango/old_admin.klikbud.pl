<div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-toolbar float-left">
                        <a href="{{ route('business.show') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-xs"></i>{{ trans('admin_klikbud/business.add_edit_form.buttons.back') }}
                        </a>
                        @if($errors->any())
                            <a href="#" class="btn btn-light-danger font-weight-bolder mr-2">
                                <i class="la la-warning icon-xs"></i> {{ trans('admin_klikbud/business.add_edit_form.error') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" id="kt_form" method="POST" wire:submit.prevent="store"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="my-5">
                                    <h3 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/business.add_edit_form.information') }}:</h3>

                                    <div class="form-group row">
                                        <label for="business.title" class="col-3">{{ trans('admin_klikbud/business.add_edit_form.title') }}<span class="text-danger">*</span></label>
                                        <div class="col-9">
                                            <input id="business.title" class="form-control @error('business.title') is-invalid @enderror" type="text" wire:model.lazy="business.title"/>
                                            @error('business.title')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row" >
                                        <label for="business.title_short" class="col-3">{{ trans('admin_klikbud/business.add_edit_form.title_short') }}<span class="text-danger">*</span></label>
                                        <div class="col-9">
                                            <input id="business.title_short" class="form-control @error('business.title_short') is-invalid @enderror" type="text" wire:model.lazy="business.title_short"/>
                                            @error('business.title_short')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>


                                    @if($type_id == 'business')

                                        <div class="form-group row">
                                            <label class="col-3">{{ trans('admin_klikbud/business.add_edit_form.type') }}</label>
                                            <div class="col-{{ $business_form_class }}  ">
                                                <select class="form-control form-control-solid  @error('business.business_form_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="business.business_form_id">
                                                    <option value="">{{ trans('admin_klikbud/business.add_edit_form.select') }}...</option>
                                                    @forelse($business_form as $form)
                                                        <option value="{{ $form['value'] }}">{{ $form['title'] }}</option>
                                                    @empty
                                                        <option value="">NULL</option>
                                                    @endforelse
                                                </select>
                                                @error('business.business_form_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>

                                            @if(!empty($business['business_form_id']) && (int)$business['business_form_id'] === 99)
                                            <div class="col-5">
                                                <input  class="form-control @error('business.business_form_other') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/business.add_edit_form.other') }}" wire:model.lazy="business.business_form_other"/>
                                                @error('business.business_form_other')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                            @endif

                                        </div>
                                    @endif

                                    @if($type_id == 'business')
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">{{ trans('admin_klikbud/business.add_edit_form.is_manufacturer') }}</label>
                                            <div class="col-9">
                                            <span class="switch switch-icon">
                                                <label><input wire:model="business.is_manufacturer" type="checkbox" checked="checked" name="select"/><span></span></label></span>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group row">
                                        <label for="exampleTextarea" class="col-3">{{ trans('admin_klikbud/business.add_edit_form.description') }}</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="exampleTextarea" rows="3" wire:model="business.description"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3" for="business.category_id">{{ trans('admin_klikbud/business.add_edit_form.category') }}<span class="text-danger">*</span></label>
                                        <div class="col-9">
                                            <div wire:ignore>
                                            <select  id="business.category_id" class="form-control selectpicker form-control-solid" data-live-search="true" data-size="5" wire:model.lazy="business.category_id">
                                                <option value="">{{ trans('admin_klikbud/business.add_edit_form.select') }}...</option>
                                                @forelse($categories as $category)
                                                    <option value="{{ $category['value'] }}">{{ $category['title'] }}</option>
                                                @empty
                                                    <option value="">NULL</option>
                                                @endforelse
                                            </select>
                                            </div>
                                            @error('business.category_id') <span style="color: red"> {{ $message }} </span> @enderror
                                        </div>
                                    </div>

                                    @if($type_id == 'department')
                                        <div class="form-group row">
                                            <label class="col-3">{{ trans('admin_klikbud/business.add_edit_form.business') }}<span class="text-danger">*</span></label>
                                            <div  class="col-9">
                                                <div wire:ignore>
                                                <select class="form-control selectpicker form-control-solid  @error('business.business_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="business.business_id">
                                                    <option value="">{{ trans('admin_klikbud/business.add_edit_form.select') }}...</option>
                                                    @forelse($business_data as $data)
                                                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                    @empty
                                                        <option value="">NULL</option>
                                                    @endforelse
                                                </select>
                                                </div>
                                                @error('business.business_id') <span style="color: red"> {{ $message }} </span> @enderror
                                            </div>
                                        </div>
                                    @endif

                                    @if($type_id == 'business')
                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="my-5">
                                        <h3 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/business.add_edit_form.logo') }}:</h3>
                                    </div>

                                    @if($image)
                                        <div class="form-group row" wire:loading.remowe wire:targe="image">
                                            <label for="image" class="col-3"></label>
                                            <div class="col-9">
                                                <img src="{{ $image->temporaryUrl() }}" style="width: 300px">
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group row">
                                        <label for="image" class="col-3">{{ trans('admin_klikbud/business.add_edit_form.image') }}</label>
                                        <div class="col-9">
                                            <input type="file" class="custom-file-input form-control @error('image') is-invalid @enderror " wire:model.defer="image" name="image" id="customFile" accept=".png, .jpg, .jpeg"/>
                                            <label class="custom-file-label" for="customFile">{{ trans('admin_klikbud/business.add_edit_form.choose_image') }}</label>
                                            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            <span class="form-text text-muted">{{ trans('admin_klikbud/business.add_edit_form.short_info_image') }}</span>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="my-5">
                                        <h3 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/business.add_edit_form.address') }}:</h3>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3">{{ trans('admin_klikbud/business.add_edit_form.address_select') }}<span class="text-danger">*</span></label>
                                        <div class="col-9">
                                            <div wire:ignore>
                                            <select class="form-control selectpicker form-control-solid  @error('business.street_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="business.street_id">
                                                <option value="">{{ trans('admin_klikbud/business.add_edit_form.select') }}...</option>
                                                @forelse($address_street as $street)
                                                    <option value="{{ $street->id }}">ul.{{ $street->title }}
                                                        (m.{{ $street->city->title }} / woj.{{ $street->state->title }}
                                                        / {{ $street->country->title }})
                                                    </option>
                                                @empty
                                                @endforelse
                                            </select>
                                            </div>
                                            @error('business.street_id') <span style="color: red"> {{ $message }} </span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3">{{ trans('admin_klikbud/business.add_edit_form.number') }}</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('business.number') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/clients.number_house_placeholder') }}" wire:model.lazy="business.number"/>
                                            @error('business.number')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3">{{ trans('admin_klikbud/business.add_edit_form.apartments_number') }}</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('apartment_number') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/clients.number_flat_placeholder') }}" wire:model.lazy="business.apartment_number"/>
                                            @error('apartment_number')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3">{{ trans('admin_klikbud/business.add_edit_form.zip_code') }}</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid @error('business.zip_code') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/clients.zip_code_placeholder') }}" wire:model.lazy="business.zip_code"/>
                                            @error('business.zip_code')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>


                                    @if($type_id == 'business')
                                        <div class="separator separator-dashed my-10"></div>
                                        <div class="my-5">
                                            <h3 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/business.add_edit_form.title_nip_regon_bdo') }}:</h3>
                                        </div>
                                        <div class="form-group row">
                                            <label for="title" class="col-3">{{ trans('admin_klikbud/business.add_edit_form.nip') }}<span class="text-danger">*</span></label>
                                            <div class="col-9">
                                                <input id="title" class="form-control @error('business.nip') is-invalid @enderror" type="text" wire:model.lazy="business.nip"/>
                                                @error('business.nip')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="title" class="col-3">{{ trans('admin_klikbud/business.add_edit_form.regon') }}</label>
                                            <div class="col-9">
                                                <input id="title" class="form-control @error('business.regon') is-invalid @enderror" type="text" wire:model.lazy="business.regon"/>
                                                @error('business.regon')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="title" class="col-3">{{ trans('admin_klikbud/business.add_edit_form.bdo') }}</label>
                                            <div class="col-9">
                                                <input id="title" class="form-control @error('business.bdo') is-invalid @enderror" type="text" wire:model.lazy="business.bdo"/>
                                                @error('business.bdo')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                    @endif

                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="my-5">
                                        <h3 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/business.add_edit_form.contacts') }}:</h3>

                                        <div class="form-group row">
                                            <label for="title" class="col-3">{{ trans('admin_klikbud/business.add_edit_form.email') }}</label>
                                            <div class="col-9"><input id="title" class="form-control @error('business.email') is-invalid @enderror" type="text" wire:model.lazy="business.email"/>
                                                @error('business.email')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="title" class="col-3">{{ trans('admin_klikbud/business.add_edit_form.phone') }}</label>
                                            <div class="col-9"><input id="title" class="form-control @error('business.phone') is-invalid @enderror" type="text" wire:model.lazy="business.phone"/>
                                                @error('business.phone')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="title" class="col-3">{{ trans('admin_klikbud/business.add_edit_form.site') }}</label>
                                            <div class="col-9">
                                                <input id="title" class="form-control @error('business.site') is-invalid @enderror" type="text" wire:model.lazy="business.site"/>
                                                @error('business.site')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success"><i
                                            class="ki ki-check icon-xs"></i>{{ trans('admin_klikbud/business.add_edit_form.buttons.save') }}
                                    </button>
                                </div>
                                <div class="col-xl-2"></div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
