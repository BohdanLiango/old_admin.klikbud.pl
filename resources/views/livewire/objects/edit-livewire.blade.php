<div>
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div wire:ignore class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    {{ trans('admin_klikbud/objects.add_page.h3_title') }}
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('objects.all') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                    <i class="ki ki-long-arrow-back icon-sm"></i>
                    {{ trans('admin_klikbud/objects.add_page.buttons.back') }}
                </a>
                <div class="btn-group">
                    <button type="button" wire:click="update()" class="btn btn-primary font-weight-bolder">
                        <i class="ki ki-check icon-sm"></i>
                        {{ trans('admin_klikbud/clients.buttons.save_form') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="form" id="kt_form">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="my-5">
                            <h3 class=" text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/objects.add_page.object_info') }}:</h3>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/objects.add_page.title') }}</label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid  @error('title') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/objects.add_page.title') }}" wire:model.lazy="title"/>
                                    @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleTextarea"  class="col-3">Example textarea <span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="exampleTextarea" rows="5" wire:model="description"></textarea>
                                    @error('description')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">Cena</label>
                                <div class="input-group col-9">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">ZŁ</span>
                                        <span class="input-group-text">0.00</span>
                                    </div>
                                    <input type="text" class="form-control @error('price_start') is-invalid @enderror" aria-label="Amount (to the nearest dollar)" wire:model="price_start"/>
                                    @error('price_start')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">M2</label>
                                <div class="input-group col-9">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">m2</span>
                                    </div>
                                    <input type="text" class="form-control @error('m2') is-invalid @enderror" aria-label="Amount (to the nearest dollar)" wire:model="m2"/>
                                    @error('m2')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-3">Date start<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <div class="input-group date" >
                                        <input wire:model.defer="date_start" type="text"  class="form-control" readonly  value="" id="kt_datepicker_3"
                                               data-date-format="dd/mm/yyyy"  data-date-locale="pl" onchange="this.dispatchEvent(new InputEvent('input'))"/>
                                        <div class="input-group-append">
                                           <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                           </span>
                                        </div>
                                    </div>
                                    <span class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/opinion.form.date_desc') }}</span>
                                    @error('date_start')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-3">Date end<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <div class="input-group date" >
                                        <input wire:model.defer="date_end" type="text"  class="form-control" readonly  value="" id="kt_datepicker_3"
                                               data-date-format="dd/mm/yyyy"  data-date-locale="pl" onchange="this.dispatchEvent(new InputEvent('input'))"/>
                                        <div class="input-group-append">
                                           <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                           </span>
                                        </div>
                                    </div>
                                    <span class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/opinion.form.date_desc') }}</span>
                                    @error('date_end')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">Adresa</label>
                                <div class="col-9">
                                    <div wire:ignore>
                                        <select  class="form-control selectpicker form-control-solid  @error('street_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="street_id">
                                            <option value="">{{ trans('admin_klikbud/clients.select') }}...</option>
                                            @forelse($object_address as $street)
                                                <option value="{{ $street->id }}">ul.{{ $street->title }} (m.{{ $street->city->title }} / woj.{{ $street->state->title }} / {{ $street->country->title }})</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    @error('street_id') <span style="color: red"> {{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">Dodatkowe4 ino o adresie</label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid @error('address_add_info') is-invalid @enderror" placeholder="{{ trans('admin_klikbud/clients.add_info_placeholder') }}" type="text" wire:model.lazy="address_add_info"/>
                                    @error('address_add_info')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-3">number_house</label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid @error('number') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/clients.number_house_placeholder') }}" wire:model.lazy="number"/>
                                    @error('number')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">number_flat</label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid @error('apartment_number') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/clients.number_flat_placeholder') }}" wire:model.lazy="apartment_number"/>
                                    @error('apartment_number')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">zip_code</label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid @error('zip_code') is-invalid @enderror" type="text" placeholder="{{ trans('admin_klikbud/clients.zip_code_placeholder') }}" wire:model.lazy="zip_code"/>
                                    @error('zip_code')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">client_id</label>
                                <div class="col-9">
                                    <div wire:ignore>
                                        <select  class="form-control selectpicker form-control-solid  @error('client_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="client_id">
                                            <option value="">{{ trans('admin_klikbud/clients.select') }}...</option>
                                            @forelse($clients_object as $client)
                                                <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    @error('client_id') <span style="color: red"> {{ $message }}</span>@enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('scripts')
        <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
    @endsection
</div>
