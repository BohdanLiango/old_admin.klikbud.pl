
<div class="card card-custom">
    @if(session()->has('message'))
        <div class="col-12 alert alert-custom alert-{{ session('alert-type') }} fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">{{ session('message') }}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
    @endif

@if($errors->all())
        <div class="col-12 alert alert-custom alert-outline-danger fade show mb-5 float-right" role="alert">
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

    <div class="card-header">
        <h3 class="card-title">
            Liczniki
        </h3>
    </div>
    <!--begin::Form-->
    <form class="form">
        <div class="card-body">

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">Ilośc SKOŃCZONYCH PROJEKTÓW</span></div>
                    <input type="number" class="form-control" wire:model.lazy="project_completed" />
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">Ilośc ZADOWOLONYCH KLIENTÓW</span></div>
                    <input type="number" class="form-control" wire:model.lazy="happy_clients" />
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">Ilośc ZATRUDNIONYCH SPECJALISTÓW</span></div>
                    <input type="number" class="form-control" wire:model.lazy="workers_employed" />
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">Ilośc OPINII</span></div>
                    <input type="number" class="form-control" wire:model.lazy="awards_won" />
                </div>
            </div>


        </div>
        <div class="card-footer">
            <button wire:click="edit" type="button" class="btn btn-primary mr-2">Zmień</button>
            <a href="{{ route('dashboard') }}" type="reset" class="btn btn-secondary">Powrót</a>
        </div>
    </form>
    <!--end::Form-->
</div>
