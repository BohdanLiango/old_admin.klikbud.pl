<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-toolbar float-left">
                    <a href="{{ route('settings.klikbud.home.service.show', $service->id) }}" class="btn btn-light-primary font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-xs"></i>{{ trans('admin_klikbud/settings/klikbud/service.create.back') }}</a>
                    @if($errors->any())
                        <a href="#" class="btn btn-light-danger font-weight-bolder mr-2">
                            <i class="la la-warning icon-xs"></i> {{ trans('admin_klikbud/settings/klikbud/service.create.error') }}
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
                                <h3 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/settings/klikbud/service.create.form.h3_1') }}:</h3>

                                @if($photo)
                                    <div class="form-group row" wire:loading.remowe wire:targe="photo">
                                        <label for="image" class="col-3"></label>
                                        <div class="col-9">
                                            <img src="{{ $photo->temporaryUrl() }}" style="width: 300px">
                                        </div>
                                    </div>
                                @elseif(isset($service->image_id) and $service->image !== NULL)
                                    <div class="form-group row">
                                        <label for="image" class="col-3"></label>
                                        <div class="col-9">
                                            <img src="{{ Storage::disk('s3')->url($service->image->path) }}" style="width: 300px">
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <label for="image" class="col-3">{{ trans('admin_klikbud/settings/klikbud/service.create.form.image') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input type="file" class="custom-file-input form-control @error('photo') is-invalid @enderror " wire:model.defer="photo" name="photo" id="customFile" accept=".png, .jpg, .jpeg"/>
                                        <label class="custom-file-label" for="customFile" >{{ trans('admin_klikbud/settings/klikbud/service.create.form.choose_image') }}</label>
                                        @error('photo') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/service.create.form.short_info_image') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3" for="alt_pl">{{ trans('admin_klikbud/settings/klikbud/service.create.form.alt') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_pl" class="form-control @error('alt_pl') is-invalid @enderror" type="text" name="alt_pl" wire:model.lazy="alt_pl"/>
                                        @error('alt_pl') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/service.create.form.keywords') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title_pl" class="col-3">{{ trans('admin_klikbud/settings/klikbud/service.create.form.title') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input  id="title_pl" class="form-control @error('title_pl') is-invalid @enderror" type="text" wire:model.lazy="title_pl"/>
                                        @error('title_pl')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description_pl" class="col-3">{{ trans('admin_klikbud/settings/klikbud/service.create.form.short_description') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('description_pl') is-invalid @enderror " id="description_pl" rows="2" wire:model.lazy="description_pl"></textarea>
                                        @error('description_pl') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>
                            <div class="my-5">
                                <h3 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/settings/klikbud/service.create.form.other_lang') }}:</h3>
                                <h4 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/settings/klikbud/service.create.form.english') }}</h4>
                                <div class="separator separator-dashed my-10"></div>

                                <div class="form-group row">
                                    <label class="col-3" for="alt_en">{{ trans('admin_klikbud/settings/klikbud/service.create.form.alt_en') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_en" class="form-control @error('alt_en') is-invalid @enderror" type="text" wire:model.lazy="alt_en"/>
                                        @error('alt_en') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/service.create.form.keywords_en') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title_en" class="col-3">{{ trans('admin_klikbud/settings/klikbud/service.create.form.title_en') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input  id="title_en" class="form-control @error('title_en') is-invalid @enderror" type="text" wire:model.lazy="title_en"/>
                                        @error('title_en')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleTextarea1" class="col-3">{{ trans('admin_klikbud/settings/klikbud/service.create.form.short_description_en') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('description_en') is-invalid @enderror " id="exampleTextarea1" rows="2" wire:model.lazy="description_en"></textarea>
                                        @error('description_en') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <h4 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/settings/klikbud/service.create.form.ukraine') }}</h4>
                                <div class="separator separator-dashed my-10"></div>

                                <div class="form-group row">
                                    <label class="col-3" for="alt_ua">{{ trans('admin_klikbud/settings/klikbud/service.create.form.alt_ua') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_ua" class="form-control @error('alt_ua') is-invalid @enderror" type="text" name="alt_ua" wire:model.lazy="alt_ua"/>
                                        @error('alt_ua') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/service.create.form.keywords_ua') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title_ua" class="col-3">{{ trans('admin_klikbud/settings/klikbud/service.create.form.title_ua') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input  id="title_ua" class="form-control @error('title_ua') is-invalid @enderror" type="text" wire:model.lazy="title_ua"/>
                                        @error('title_ua')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description_ua" class="col-3">{{ trans('admin_klikbud/settings/klikbud/service.create.form.short_description_ua') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('description_ua') is-invalid @enderror " id="description_ua" rows="2" wire:model.lazy="description_ua"></textarea>
                                        @error('description_ua') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <h4 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/settings/klikbud/service.create.form.russian') }}</h4>
                                <div class="separator separator-dashed my-10"></div>

                                <div class="form-group row">
                                    <label class="col-3" for="alt_ru">{{ trans('admin_klikbud/settings/klikbud/service.create.form.alt_ru') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_ru" class="form-control @error('alt_ru') is-invalid @enderror" type="text" wire:model.lazy="alt_ru"/>
                                        @error('alt_ru') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/service.create.form.keywords_ru') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title_ru" class="col-3">{{ trans('admin_klikbud/settings/klikbud/service.create.form.title_ru') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input  id="title_ru" class="form-control @error('title_ru') is-invalid @enderror" type="text" wire:model.lazy="title_ru"/>
                                        @error('title_ru')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description_ru" class="col-3">{{ trans('admin_klikbud/settings/klikbud/service.create.form.short_description_ru') }}<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('description_ru') is-invalid @enderror " id="description_ru" rows="2" wire:model.lazy="description_ru"></textarea>
                                        @error('description_ru') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">  <i class="ki ki-check icon-xs"></i>{{ trans('admin_klikbud/settings/klikbud/service.create.save') }}</button>
                        </div>

                        <div class="col-xl-2"></div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
