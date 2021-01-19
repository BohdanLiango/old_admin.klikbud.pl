<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-toolbar">
                    <a href="#" class="btn btn-light-primary font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary font-weight-bolder">
                            <i class="ki ki-check icon-xs"></i>Save Form</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="nav nav-hover flex-column">
                                <li class="nav-item">
{{--                                    <a href="#" class="nav-link" onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('kt_form').submit();">--}}
{{--                                        <i class="nav-icon flaticon2-reload"></i>--}}
{{--                                        <span class="nav-text">Save &amp; continue</span>--}}
{{--                                    </a>--}}
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon flaticon2-add-1"></i>
                                        <span class="nav-text">Save &amp; add new</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon flaticon2-power"></i>
                                        <span class="nav-text">Save &amp; exit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="form" id="kt_form" method="POST" wire:submit.prevent="saveSlider" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-8">
                            <div class="my-5">
                                <h3 class="text-dark font-weight-bold mb-10">Obowiązkowe dane:</h3>

                                <div class="form-group row">
                                    <label for="yellow_text_pl" class="col-3">Żółty napis<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input  id="yellow_text_pl" class="form-control @error('slider.yellow_text_pl') is-invalid @enderror" type="text" wire:model.lazy="slider.yellow_text_pl"/>
                                        @error('slider.yellow_text_pl')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-3" for="black_text_pl">Czarny napis<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="black_text_pl" class="form-control @error('slider.black_text_pl') is-invalid @enderror" type="text" wire:model.lazy="slider.black_text_pl"/>
                                        @error('slider.black_text_pl') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3" for="number_show">Numer suwaka<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="number_show" class="form-control @error('slider.number_show') is-invalid @enderror" type="number" wire:model.lazy="slider.number_show"/>
                                        @error('slider.number_show') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleTextarea" class="col-3">Krótki opis <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                    <textarea class="form-control @error('slider.description_pl') is-invalid @enderror " id="exampleTextarea" rows="2" wire:model.lazy="slider.description_pl"></textarea>
                                    @error('slider.description_pl') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3">Zdjecie<span class="text-danger">*</span></label>
                                <div class="image-input image-input-outline" id="kt_image_1">
                                    @if($image)
                                    <div class="image-input-wrapper" style="background-image: url({{ $image->temporaryUrl() }})"></div>
                                    @else
                                        <div class="image-input-wrapper" style="background-image: url({{ NULL }})"></div>
                                    @endif
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input class=" @error('image') is-invalid @enderror" type="file" wire:model.defer="image" name="slider.image" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="profile_avatar_remove"/>
                                        @error('image') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </label>

                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-3" for="alt_pl">CEO<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_pl" class="form-control @error('slider.alt_pl') is-invalid @enderror" type="text" name="alt_pl" wire:model.lazy="slider.alt_pl"/>
                                        @error('slider.alt_pl') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">Do 10 kluczowych słów</span>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-10"></div>
                            <div class="my-5">
                                <h3 class="text-dark font-weight-bold mb-10">W innych językach:</h3>


                                <h4 class="text-dark font-weight-bold mb-10">English</h4>
                                <div class="separator separator-dashed my-10"></div>

                                <div class="form-group row">
                                    <label class="col-3" for="yellow_text_en">Text yellow<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="yellow_text_en" class="form-control @error('slider.yellow_text_en') is-invalid @enderror" type="text" wire:model.lazy="slider.yellow_text_en" />
                                        @error('slider.yellow_text_en') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                @error('yellow_text_en') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                <div class="form-group row">
                                    <label class="col-3" for="black_text_en">Text black<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="black_text_en" class="form-control @error('slider.black_text_en') is-invalid @enderror" type="text" wire:model.lazy="slider.black_text_en" />
                                        @error('slider.black_text_en') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleTextarea" class="col-3">Short description <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                    <textarea class="form-control @error('slider.description_en') is-invalid @enderror" id="exampleTextarea" rows="2" wire:model.lazy="slider.description_en"></textarea>
                                    @error('slider.description_en') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3" for="alt_en">CEO<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_en" class="form-control  @error('slider.alt_en') is-invalid @enderror" type="text"  wire:model.lazy="slider.alt_en"/>
                                        @error('slider.alt_en') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">Max 10 keywords</span>
                                    </div>
                                </div>

                                <h4 class="text-dark font-weight-bold mb-10">Українська</h4>
                                <div class="separator separator-dashed my-10"></div>

                                <div class="form-group row">
                                    <label class="col-3" for="yellow_text_ua">Жовтий текст<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="yellow_text_ua" class="form-control @error('slider.yellow_text_ua') is-invalid @enderror" type="text" wire:model.lazy="slider.yellow_text_ua"/>
                                        @error('slider.yellow_text_ua') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3" for="black_text_ua">Чорний текст<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="black_text_ua" class="form-control @error('slider.black_text_ua') is-invalid @enderror" wire:model.lazy="slider.black_text_ua" />
                                        @error('slider.black_text_ua') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleTextarea" class="col-3">Короткий опис <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                    <textarea class="form-control  @error('slider.description_ua') is-invalid @enderror" id="exampleTextarea" rows="2"  wire:model.lazy="slider.description_ua"></textarea>
                                    @error('slider.description_ua') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3" for="alt_ua">CEO<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_ua" class="form-control @error('slider.alt_ua') is-invalid @enderror" type="text" wire:model.lazy="slider.alt_ua"/>
                                        @error('slider.alt_ua') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">Максимально 10 ключових слів</span>
                                    </div>
                                </div>

                                <h4 class="text-dark font-weight-bold mb-10">Русский</h4>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <label class="col-3" for="yellow_text_ru">Жёлтый текст<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="yellow_text_ru" class="form-control @error('slider.yellow_text_ru') is-invalid @enderror" type="text" wire:model.lazy="slider.yellow_text_ru"/>
                                        @error('slider.yellow_text_ru') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3" for="black_text_ru">Чёрный текст<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="black_text_ru" class="form-control @error('slider.black_text_ru') is-invalid @enderror" type="text" wire:model.lazy="slider.black_text_ru" />
                                        @error('slider.black_text_ru') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleTextarea" class="col-3">Крaткое описание <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                    <textarea class="form-control @error('slider.description_ru') is-invalid @enderror" id="exampleTextarea" rows="2" wire:model.lazy="slider.description_ru"></textarea>
                                    @error('slider.description_ru') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3" for="alt_ru">CEO<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_ru" class="form-control @error('slider.alt_ru') is-invalid @enderror" type="text" wire:model.lazy="slider.alt_ru"/>
                                        @error('slider.alt_ru') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">Максимально 10 слов ключевых</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-2"></div>

                    </div>                    <button type="submit">SAVE KURWA</button>
                </form>
            </div>
        </div>
    </div>
</div>
