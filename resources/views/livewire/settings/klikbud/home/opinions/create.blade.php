<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-toolbar float-left">
                    <a href="{{ route('settings.klikbud.home.opinion.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-xs"></i>{{ trans('admin_klikbud/settings/klikbud/opinion.form.back') }}</a>
                    @if($errors->any())
                        <a href="#" class="btn btn-light-danger font-weight-bolder mr-2">
                            <i class="la la-warning icon-xs"></i> {{ trans('admin_klikbud/settings/klikbud/main-slider.create.error') }}
                        </a>
                    @endif
                </div>

            </div>
            <div class="card-body">
                <form class="form" id="kt_form" method="POST" wire:submit.prevent="save" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-8">
                            <div class="my-5">
                                <h3 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/settings/klikbud/opinion.form.back') }}:</h3>

                                <div class="form-group row">
                                    <label for="name" class="col-3">{{ trans('admin_klikbud/settings/klikbud/opinion.form.name') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input  id="name" class="form-control @error('name') is-invalid @enderror" type="text" wire:model.defer="name"/>
                                        @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="exampleSelectd" class="col-3">{{ trans('admin_klikbud/settings/klikbud/opinion.form.serwis') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select class="form-control @error('service_id') is-invalid @enderror" id="exampleSelectd" wire:model.defer="service_id">
                                            <option value="{{ NULL }}" selected>----------</option>
                                            @forelse($services as $id => $title)
                                            <option value="{{ $id }}">{{ $title['pl'] }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('service_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label">{{ trans('admin_klikbud/settings/klikbud/opinion.form.rating') }}</label>
                                    <div class="col-9 col-form-label">
                                        <div class="radio-inline">
                                            @foreach(\App\Models\KLIKBUD\Opinion::STARS as $star)
                                                <label class="radio">
                                                    <input wire:model.defer="stars" value="{{ $star }}"  type="radio" name="radios6"/>
                                                    <span></span>
                                                    @for($i = 0; $i < $star; $i++)
                                                        <i class="fa fa-star text-black"></i>
                                                    @endfor
                                                </label>
                                            @endforeach
                                        </div>
                                        <span class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/opinion.form.rating_desc') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleSelectd" class="col-3">{{ trans('admin_klikbud/settings/klikbud/opinion.form.portal') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select class="form-control @error('portal_opinion_id') is-invalid @enderror" id="exampleSelectd" wire:model.defer="portal_opinion_id">
                                            <option value="{{ NULL }}" selected>----------</option>
                                            @forelse($portals as $id => $title)
                                            <option value="{{ $id }}">{{ $title }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <span class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/opinion.form.portal_desc') }}</span>
                                        @error('portal_opinion_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-3">{{ trans('admin_klikbud/settings/klikbud/opinion.form.date') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="input-group date" >
                                            <input wire:model.defer="date_add" type="text"  class="form-control" readonly  value="" id="kt_datepicker_3"
                                                   data-date-format="dd/mm/yyyy"  data-date-locale="pl" onchange="this.dispatchEvent(new InputEvent('input'))"
                                            />
                                            <div class="input-group-append">
                                           <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                           </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/opinion.form.date_desc') }}</span>
                                        @error('date_add')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleTextarea1" class="col-3">{{ trans('admin_klikbud/settings/klikbud/opinion.form.opinion') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('opinion') is-invalid @enderror " id="exampleTextarea1" rows="2" wire:model.defer="opinion"></textarea>
                                        @error('opinion') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success"><i class="ki ki-check icon-xs"></i>{{ trans('admin_klikbud/settings/klikbud/opinion.form.save') }}</button>
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
