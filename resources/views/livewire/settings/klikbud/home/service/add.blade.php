<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-toolbar float-left">
                    <a href="{{ route('settings.klikbud.home.service.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-xs"></i>Powrót</a>
                    <div class="btn-group">
                    </div>
                </div>

                @if($errors->all())
                    <div class="card-toolbar alert alert-custom alert-outline-danger fade show mb-5 float-right" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                        @foreach($errors->all() as $message)
                            <div class="alert-text">{{ $message }}</div>
                        @endforeach
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                            </button>
                        </div>
                    </div>
                @endif
            </div>

            <div class="card-body">
                <form class="form" id="kt_form" method="POST" wire:submit.prevent="save" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-8">
                            <div class="my-5">
                                <h3 class="text-dark font-weight-bold mb-10">Obowiązkowe dane:</h3>

                                @if($photo)
                                    <div class="form-group row" wire:loading.remowe wire:targe="photo">
                                        <label for="image" class="col-3"></label>
                                        <div class="col-9">
                                            <img src="{{ $photo->temporaryUrl() }}" style="width: 300px">
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <label for="image" class="col-3">Obraz<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input type="file" class="custom-file-input form-control @error('photo') is-invalid @enderror " wire:model.defer="photo" name="photo" id="customFile" accept=".png, .jpg, .jpeg"/>
                                        <label class="custom-file-label" for="customFile" >Choose file</label>
                                        @error('photo') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3" for="alt_pl">CEO<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_pl" class="form-control @error('service.alt_pl') is-invalid @enderror" type="text" name="alt_pl" wire:model.lazy="service.alt_pl"/>
                                        @error('service.alt_pl') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">Do 10 kluczowych słów</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title_pl" class="col-3">Nazwa<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input  id="title_pl" class="form-control @error('service.title_pl') is-invalid @enderror" type="text" wire:model.lazy="service.title_pl"/>
                                        @error('slider.title_pl')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description_pl" class="col-3">Krótki opis <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('service.description_pl') is-invalid @enderror " id="description_pl" rows="2" wire:model.lazy="service.description_pl"></textarea>
                                        @error('service.description_pl') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>
                            <div class="my-5">
                                <h3 class="text-dark font-weight-bold mb-10">W innych językach:</h3>


                                <h4 class="text-dark font-weight-bold mb-10">English</h4>
                                <div class="separator separator-dashed my-10"></div>


                                <div class="form-group row">
                                    <label class="col-3" for="alt_en">CEO<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_en" class="form-control @error('service.alt_en') is-invalid @enderror" type="text" wire:model.lazy="service.alt_en"/>
                                        @error('service.alt_en') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">Do 10 kluczowych słów</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title_en" class="col-3">Title<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input  id="title_en" class="form-control @error('service.title_en') is-invalid @enderror" type="text" wire:model.lazy="service.title_en"/>
                                        @error('slider.title_en')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleTextarea1" class="col-3">Short description<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('service.description_en') is-invalid @enderror " id="exampleTextarea1" rows="2" wire:model.lazy="service.description_en"></textarea>
                                        @error('service.description_en') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>


                                <h4 class="text-dark font-weight-bold mb-10">Українська</h4>
                                <div class="separator separator-dashed my-10"></div>

                                <div class="form-group row">
                                    <label class="col-3" for="alt_ua">CEO<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_ua" class="form-control @error('service.alt_ua') is-invalid @enderror" type="text" name="alt_ua" wire:model.lazy="service.alt_ua"/>
                                        @error('service.alt_ua') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">Do 10 kluczowych słów</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title_ua" class="col-3">Назва<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input  id="title_ua" class="form-control @error('service.title_ua') is-invalid @enderror" type="text" wire:model.lazy="service.title_ua"/>
                                        @error('slider.title_ua')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description_ua" class="col-3">Короткий опис<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('service.description_ua') is-invalid @enderror " id="description_ua" rows="2" wire:model.lazy="service.description_ua"></textarea>
                                        @error('service.description_ua') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>


                                <h4 class="text-dark font-weight-bold mb-10">Русский</h4>
                                <div class="separator separator-dashed my-10"></div>

                                <div class="form-group row">
                                    <label class="col-3" for="alt_ru">CEO<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input id="alt_ru" class="form-control @error('service.alt_ru') is-invalid @enderror" type="text" wire:model.lazy="service.alt_ru"/>
                                        @error('service.alt_ru') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <span class="form-text text-muted">Do 10 kluczowych słów</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title_ru" class="col-3">Название<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input  id="title_ru" class="form-control @error('service.title_ru') is-invalid @enderror" type="text" wire:model.lazy="service.title_ru"/>
                                        @error('slider.title_ru')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description_ru" class="col-3">Краткое описание<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('service.description_ru') is-invalid @enderror " id="description_ru" rows="2" wire:model.lazy="service.description_ru"></textarea>
                                        @error('service.description_ru') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">  <i class="ki ki-check icon-xs"></i>Zapisać</button>
                        </div>

                        <div class="col-xl-2"></div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
