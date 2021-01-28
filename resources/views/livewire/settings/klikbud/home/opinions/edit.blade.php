<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-toolbar float-left">
                    <a href="{{ route('settings.klikbud.home.opinion.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
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
                <form class="form" id="kt_form" method="POST" wire:submit.prevent="edit" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-8">
                            <div class="my-5">
                                <h3 class="text-dark font-weight-bold mb-10">Obowiązkowe dane:</h3>

                                <div class="form-group row">
                                    <label for="name" class="col-3">Imię lub nazwa autora<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input  id="name" class="form-control @error('name') is-invalid @enderror" type="text" wire:model.defer="name"/>
                                        @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="exampleSelectd" class="col-3">Usługa<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select class="form-control @error('service_id') is-invalid @enderror" id="exampleSelectd" wire:model.defer="service_id">
                                            <option value="{{ NULL }}" selected>----------</option>
                                            @forelse($services as $id => $title)}
                                            <option value="{{ $id }}">{{ $title['pl'] }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('service_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Ocena</label>
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
                                        <span class="form-text text-muted">Za opinie</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleSelectd" class="col-3">Portal <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select class="form-control @error('portal_opinion_id') is-invalid @enderror" id="exampleSelectd" wire:model.defer="portal_opinion_id">
                                            <option value="{{ NULL }}" selected>----------</option>
                                            <option value="1">1</option>
                                        </select>
                                        <span class="form-text text-muted">Na którym zostawiona opinia</span>
                                        @error('portal_opinion_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-3">Data<span class="text-danger">*</span></label>
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
                                        <span class="form-text text-muted">Kiedy wystawione na stronie portalu?</span>
                                        @error('date_add')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleTextarea1" class="col-3">Opinia<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('opinion') is-invalid @enderror " id="exampleTextarea1" rows="2" wire:model.defer="opinion"></textarea>
                                        @error('opinion') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success"><i class="ki ki-check icon-xs"></i>Zapisać</button>
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
