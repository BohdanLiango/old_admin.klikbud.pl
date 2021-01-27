<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">

        <div class="form-group row">
            <label for="storeOpinion.name" class="col-3">Imię lub nazwa autora<span class="text-danger">*</span></label>
            <div class="col-9">
                <input  id="storeOpinion.name" class="form-control @error('storeOpinion.name') is-invalid @enderror" type="text" wire:model.defer="storeOpinion.name"/>
                @error('storeOpinion.name')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="exampleSelectd" class="col-3">Usługa<span class="text-danger">*</span></label>
            <div class="col-9">
                <select class="form-control @error('storeOpinion.service_id') is-invalid @enderror" id="exampleSelectd" wire:model.defer="storeOpinion.service_id">
                    <option value="{{ NULL }}" selected>----------</option>
                    @forelse($services as $id => $title)}
                    <option value="{{ $id }}">{{ $title['pl'] }}</option>
                    @empty
                    @endforelse
                </select>
                @error('storeOpinion.service_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3 col-form-label">Ocena</label>
            <div class="col-9 col-form-label">
                <div class="radio-inline">
                    @foreach(\App\Models\KLIKBUD\Opinion::STARS as $star)
                        <label class="radio">
                            <input wire:model.defer="storeOpinion.stars" value="{{ $star }}"  type="radio" name="radios6"/>
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
                <select class="form-control @error('storeOpinion.portal_opinion_id') is-invalid @enderror" id="exampleSelectd" wire:model.defer="storeOpinion.portal_opinion_id">
                    <option value="{{ NULL }}" selected>----------</option>
                    <option value="1">1</option>
                </select>
                <span class="form-text text-muted">Na którym zostawiona opinia</span>
                @error('storeOpinion.portal_opinion_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-3">Data<span class="text-danger">*</span></label>
            <div class="col-9">
                <div class="input-group date" >
                    <input wire:model.defer="storeOpinion.date_add" type="text"  class="form-control" readonly  value="" id="kt_datepicker_3"
                           data-date-format="dd/mm/yyyy"  data-date-locale="pl" onchange="this.dispatchEvent(new InputEvent('input'))"
                    />
                    <div class="input-group-append">
                               <span class="input-group-text">
                                <i class="la la-calendar"></i>
                               </span>
                    </div>
                </div>
                <span class="form-text text-muted">Kiedy wystawione na stronie portalu?</span>
                @error('storeOpinion.date_add')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="exampleTextarea1" class="col-3">Opinia<span class="text-danger">*</span></label>
            <div class="col-9">
                <textarea class="form-control @error('storeOpinion.opinion') is-invalid @enderror " id="exampleTextarea1" rows="2" wire:model.defer="storeOpinion.opinion"></textarea>
                @error('storeOpinion.opinion') <div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <a href="{{ route('settings.klikbud.home.opinion.index') }}" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Powrót</a>
        <button  wire:click="save" type="button" class="btn btn-primary font-weight-bold">Zapisz</button>
    </div>
</form>
