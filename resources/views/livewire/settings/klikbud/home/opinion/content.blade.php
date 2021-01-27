<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group" role="group" aria-label="First group">
        <a href="{{ route('settings.klikbud.home.opinion.create') }}" class="btn btn-success btn-icon"><i class="la la-plus"></i></a>
    </div>
    <div class="input-group">
        @if($count > 0)
        <div wire:model="searchQuery" class="input-group-prepend"><span class="input-group-text" id="btnGroupAddon2"><i class="la la-search"></i></span></div>
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

@if(session()->has('message'))
    <hr>
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
<hr>

{{ $opinions->links('vendor.livewire.bootstrap') }}

<div class="row">
@forelse($opinions as $opinion)
<div class="col-12 card card-custom">
    <div class="card-header ribbon ribbon-top ribbon-ver">
        <div class="ribbon-target bg-success" style="top: -2px; right: 20px;">
            @for($i = 0; $i < $opinion->stars; $i++)
                <i class="fa fa-star text-white"></i>
            @endfor
        </div>
        <h3 class="card-title">{{ $opinion->name }}</h3>
    </div>

    <div class="card-body">
        <h5> {{ $opinion->service->title['pl'] }}</h5>
        <p>{{ $opinion->opinion }}</p>
    </div>
    <hr>
    <div class="row">
        <div class="col-1">

        </div>
        <div class="col-2">
            <p><b>Data Dodania:</b> {{ date("d/m/Y", strtotime($opinion->date_add)) }}</p>
        </div>
        <div class="col-7">

        </div>
        <div class="col-1">
            <div class="btn-group" role="group" aria-label="First group">
                <button type="button" class="btn btn-warning btn-icon"><i class="la la-edit"></i></button>
                <button type="button" class="btn btn-danger btn-icon"><i class="la la-close"></i></button>
            </div>
        </div>
        <div class="col-1">
        </div>
    </div>
    <br>
</div>
        <div class="col-12">
            <hr>
        </div>
@empty
   <h3><-- Dodaj pierwszą opinie:)</h3>
@endforelse
</div>





{{--<script type="text/javascript">--}}
{{--</script>--}}
{{--<script>--}}
{{--    window.addEventListener('closeSaveModal', event => {--}}
{{--        $("#saveModalForm").modal('hide')--}}
{{--    })--}}
{{--</script>--}}
