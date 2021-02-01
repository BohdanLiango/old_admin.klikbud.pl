<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-toolbar float-left">
                    <a href="{{ route('settings.klikbud.home.slider.show', $slider->id) }}"
                       class="btn btn-light-primary font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-xs"></i>{{ trans('admin_klikbud/settings/klikbud/main-slider.create.back') }}
                    </a>
                    @if($errors->any())
                        <a href="#" class="btn btn-light-danger font-weight-bolder mr-2">
                            <i class="la la-warning icon-xs"></i> {{ trans('admin_klikbud/settings/klikbud/main-slider.create.error') }}
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
                                <h3 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.h3_1') }}
                                    :</h3>

                                <div class="form-group row">
                                    <label for="yellow_text_pl"
                                           class="col-3">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.yellow_string') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="yellow_text_pl"
                                               class="form-control @error('yellow_text_pl') is-invalid @enderror"
                                               type="text" wire:model.lazy="yellow_text_pl"/>
                                        @error('yellow_text_pl')
                                        <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3"
                                           for="black_text_pl">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.dark_string') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="black_text_pl"
                                               class="form-control @error('black_text_pl') is-invalid @enderror"
                                               type="text" wire:model.lazy="black_text_pl"/>
                                        @error('black_text_pl')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3"
                                           for="number_show">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.number_slider') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="number_show"
                                               class="form-control @error('number_show') is-invalid @enderror"
                                               type="number" wire:model.lazy="number_show"/>
                                        @error('number_show')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleTextarea1"
                                           class="col-3">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.short_description') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('description_pl') is-invalid @enderror "
                                                  id="exampleTextarea1" rows="2" wire:model.lazy="description_pl">
                                        </textarea>
                                        @error('description_pl')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                @if($photo)
                                    <div class="form-group row" wire:loading.remowe wire:targe="photo">
                                        <label for="image" class="col-3"></label>
                                        <div class="col-9">
                                            <img src="{{ $photo->temporaryUrl() }}" style="width: 300px" alt="">
                                        </div>
                                    </div>
                                @elseif(isset($slider->image_id) and $slider->image !== null)
                                    <div class="form-group row">
                                        <label for="image" class="col-3"></label>
                                        <div class="col-9">
                                            <img src="{{ asset(Storage::url($slider->image->path)) }}"
                                                 style="width: 300px" alt="">
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <label for="image"
                                           class="col-3">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.image') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input type="file"
                                               class="custom-file-input form-control @error('photo') is-invalid @enderror "
                                               wire:model.defer="photo" name="photo" id="customFile"
                                               accept=".png, .jpg, .jpeg"/>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        @error('photo')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span
                                            class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.short_info_image') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3"
                                           for="alt_pl">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.alt') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_pl" class="form-control @error('alt_pl') is-invalid @enderror"
                                               type="text" name="alt_pl" wire:model.lazy="alt_pl"/>
                                        @error('alt_pl')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span
                                            class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.keywords') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-10"></div>
                            <div class="my-5">
                                <h3 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.other_lang') }}
                                    :</h3>
                                <h4 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.english') }}</h4>
                                <div class="separator separator-dashed my-10"></div>

                                <div class="form-group row">
                                    <label class="col-3"
                                           for="yellow_text_en">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.yellow_string_en') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="yellow_text_en"
                                               class="form-control @error('yellow_text_en') is-invalid @enderror"
                                               type="text" wire:model.lazy="yellow_text_en"/>
                                        @error('yellow_text_en')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                @error('yellow_text_en')
                                <div class="invalid-feedback">{{ $message }}</div>@enderror

                                <div class="form-group row">
                                    <label class="col-3"
                                           for="black_text_en">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.dark_string_en') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="black_text_en"
                                               class="form-control @error('black_text_en') is-invalid @enderror"
                                               type="text" wire:model.lazy="black_text_en"/>
                                        @error('black_text_en')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleTextarea2"
                                           class="col-3">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.short_description_en') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('description_en') is-invalid @enderror"
                                                  id="exampleTextarea2" rows="2" wire:model.lazy="description_en">
                                        </textarea>
                                        @error('description_en')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3"
                                           for="alt_en">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.alt_en') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_en" class="form-control  @error('alt_en') is-invalid @enderror"
                                               type="text" wire:model.lazy="alt_en"/>
                                        @error('alt_en')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span
                                            class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.keywords_en') }}</span>
                                    </div>
                                </div>

                                <h4 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.ukraine') }}</h4>
                                <div class="separator separator-dashed my-10"></div>

                                <div class="form-group row">
                                    <label class="col-3"
                                           for="yellow_text_ua">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.yellow_string_ua') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="yellow_text_ua"
                                               class="form-control @error('yellow_text_ua') is-invalid @enderror"
                                               type="text" wire:model.lazy="yellow_text_ua"/>
                                        @error('yellow_text_ua')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3"
                                           for="black_text_ua">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.dark_string_ua') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="black_text_ua"
                                               class="form-control @error('black_text_ua') is-invalid @enderror"
                                               wire:model.lazy="black_text_ua"/>
                                        @error('black_text_ua')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleTextarea3"
                                           class="col-3">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.short_description_ua') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control  @error('description_ua') is-invalid @enderror"
                                                  id="exampleTextarea3" rows="2" wire:model.lazy="description_ua">
                                        </textarea>
                                        @error('description_ua')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3"
                                           for="alt_ua">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.alt_ua') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_ua" class="form-control @error('alt_ua') is-invalid @enderror"
                                               type="text" wire:model.lazy="alt_ua"/>
                                        @error('alt_ua')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span
                                            class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.keywords_ua') }}</span>
                                    </div>
                                </div>

                                <h4 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.russian') }}</h4>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <label class="col-3"
                                           for="yellow_text_ru">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.yellow_string_ru') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="yellow_text_ru"
                                               class="form-control @error('yellow_text_ru') is-invalid @enderror"
                                               type="text" wire:model.lazy="yellow_text_ru"/>
                                        @error('yellow_text_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3"
                                           for="black_text_ru">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.dark_string_ru') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="black_text_ru"
                                               class="form-control @error('black_text_ru') is-invalid @enderror"
                                               type="text" wire:model.lazy="black_text_ru"/>
                                        @error('black_text_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleTextarea4"
                                           class="col-3">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.short_description_ru') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('description_ru') is-invalid @enderror"
                                                  id="exampleTextarea4" rows="2" wire:model.lazy="description_ru">
                                        </textarea>
                                        @error('description_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3"
                                           for="alt_ru">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.alt_ru') }}
                                        <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_ru" class="form-control @error('alt_ru') is-invalid @enderror"
                                               type="text" wire:model.lazy="alt_ru"/>
                                        @error('alt_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span
                                            class="form-text text-muted">{{ trans('admin_klikbud/settings/klikbud/main-slider.create.form.keywords_ru') }}</span>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success"><i
                                    class="ki ki-check icon-xs"></i>{{ trans('admin_klikbud/settings/klikbud/main-slider.create.save') }}
                            </button>
                        </div>

                        <div class="col-xl-2"></div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
