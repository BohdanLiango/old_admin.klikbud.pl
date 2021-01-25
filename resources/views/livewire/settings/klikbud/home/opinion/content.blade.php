<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group" role="group" aria-label="First group">
        <button type="button" class="btn btn-success btn-icon"><i class="la la-plus"></i></button>
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
   <h3><-- Dodaj pierwszą opinie!</h3>
@endforelse
