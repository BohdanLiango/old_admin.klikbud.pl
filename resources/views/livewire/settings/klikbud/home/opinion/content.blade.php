<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group" role="group" aria-label="First group">
        <button type="button" class="btn btn-success btn-icon" wire:click="openSaveModal('save')" ><i class="la la-plus"></i></button>
    </div>
    <div class="input-group">
        @if($count > 0)
        <div class="input-group-prepend"><span class="input-group-text" id="btnGroupAddon2"><i class="la la-search"></i></span></div>
        <input type="text" class="form-control" placeholder="Szukaj...." aria-describedby="btnGroupAddon2"/>
            <select  class="form-control ">
                <option value="">ALL</option>
                <option value="1">1 (gwiazda)</option>
                <option value="2">2 (gwiazdy)</option>
                <option value="2">3 (gwiazdy)</option>
                <option value="2">4 (gwiazdy)</option>
                <option value="2">5 (gwiazd)</option>
            </select>
        </div>
        @endif
</div>
<hr>
@forelse($opinions as $opinion)
<div class="card card-custom">
    <div class="card-header ribbon ribbon-top ribbon-ver">
        <div class="ribbon-target bg-success" style="top: -2px; right: 20px;">
            <i class="fa fa-star text-white"></i>
            <i class="fa fa-star text-white"></i>
            <i class="fa fa-star text-white"></i>
            <i class="fa fa-star text-white"></i>
            <i class="fa fa-star text-white"></i>
        </div>
        <h3 class="card-title">With Icon</h3>
    </div>
    <div class="card-body">TEXT</div>
    <hr>
    <div class="row">
        <div class="col-xl-11">
        </div>
        <div class="col-xl-1">
            <div class="btn-group" role="group" aria-label="First group">
                <button type="button" class="btn btn-warning btn-icon"><i class="la la-edit"></i></button>
                <button type="button" class="btn btn-danger btn-icon"><i class="la la-close"></i></button>
            </div>
        </div>
    </div>
    <br>
</div>
@empty
   <h3><-- Dodaj pierwszą opinie:)</h3>
@endforelse


<!-- SaveModal-->
<div class="modal fade" id="saveModalForm" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="saveModalForm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Forma dodania nowej opinii</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">

                <div class="form-group row">
                    <label for="storeOpinion.name" class="col-3">Imię lub nazwa autora<span class="text-danger">*</span></label>
                    <div class="col-9">
                        <input  id="storeOpinion.name" class="form-control @error('storeOpinion.name') is-invalid @enderror" type="text" wire:model.lazy="storeOpinion.name"/>
                        @error('storeOpinion.name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleSelectd" class="col-3">Usługa<span class="text-danger">*</span></label>
                    <div class="col-9">
                    <select class="form-control @error('storeOpinion.service_id') is-invalid @enderror" id="exampleSelectd" wire:model.lazy="storeOpinion.service_id">
                        <option value="1">1</option>
                    </select>
                        @error('storeOpinion.service_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label">Ocena</label>
                    <div class="col-9 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-primary">
                                <input type="radio" name="radios11" checked="checked"  value=""/>
                                <span></span>
                                Default
                            </label>
                        </div>
                        <span class="form-text text-muted">Za opinie</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleSelectd" class="col-3">Portal <span class="text-danger">*</span></label>
                    <div class="col-9">
                        <select class="form-control @error('storeOpinion.portal_opinion_id') is-invalid @enderror" id="exampleSelectd" wire:model.lazy="storeOpinion.portal_opinion_id">
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
                            <input type="text" class="form-control" readonly  value="{{ date("d/m/Y",strtotime(now())) }}" id="kt_datepicker_3"/>
                            <div class="input-group-append">
                               <span class="input-group-text">
                                <i class="la la-calendar"></i>
                               </span>
                            </div>
                        </div>
                        <span class="form-text text-muted">Dodania na strone portalu</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleTextarea1" class="col-3">Opinia<span class="text-danger">*</span></label>
                    <div class="col-9">
                        <textarea class="form-control @error('storeOpinion.opinion') is-invalid @enderror " id="exampleTextarea1" rows="2" wire:model.lazy="storeOpinion.opinion"></textarea>
                        @error('storeOpinion.opinion') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener('openSaveModal', event => {
        $("#saveModalForm").modal('show')
    })
    window.addEventListener('closeSaveModal', event => {
        $("#deleteModalForm").modal('hide')
    })

    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
</script>
