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

<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
    <!-- Position it -->
    <div style="position: absolute; top: 0; right: 0;">

        <!-- Then put toasts within -->
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded mr-2" alt="...">
                <strong class="mr-auto">Bootstrap</strong>
                <small class="text-muted">just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                See? Just like this.
            </div>
        </div>

        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded mr-2" alt="...">
                <strong class="mr-auto">Bootstrap</strong>
                <small class="text-muted">2 seconds ago</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Heads up, toasts will stack automatically
            </div>
        </div>
    </div>
</div>

{{--<!--begin::Card-->--}}
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">HTML Table
                <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span></h3>
        </div>
        <div class="card-toolbar">
{{--            <!--begin::Button-->--}}
            <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#addModal">
											<span class="svg-icon svg-icon-md">
{{--												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->--}}
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
{{--                                                <!--end::Svg Icon-->--}}
											</span>New Record</a>
{{--            <!--end::Button-->--}}
        </div>
    </div>


    <!-- Modal -->
    <div  wire:ignore.self class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="store_title" class="col-3">Nazwa<span class="text-danger">*</span></label>
                        <div class="col-9">
                            <input  id="store_title" class="form-control @error('store_title') is-invalid @enderror" type="text" wire:model.lazy="store_title" />
                            @error('store_title')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="store_url" class="col-3">Link<span class="text-danger">*</span></label>
                        <div class="col-9">
                            <input  id="store_url" class="form-control @error('store_url') is-invalid @enderror" type="text" wire:model.lazy="store_url" />
                            <span class="form-text text-muted">Na strone portalu</span>
                            @error('store_url')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    @if($store_image)
                        <div class="form-group row" wire:loading.remowe wire:targe="store_image">
                            <label for="image" class="col-3"></label>
                            <div class="col-9">
                                <img src="{{ $store_image->temporaryUrl() }}" style="width: 100px">
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <label for="image" class="col-3">Zdjecie<span class="text-danger">*</span></label>
                        <div class="col-9">
                            <input type="file" class="custom-file-input form-control @error('store_image') is-invalid @enderror " wire:model.defer="store_image" name="store_image" id="customFile" accept=".png, .jpg, .jpeg"/>
                            <label class="custom-file-label" for="customFile" >Choose file</label>
                            @error('store_image') <div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button wire:click="store" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    @if(count($portals))
    <div class="card-body">
        <div class="mb-7"></div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($portals as $portal)
            <tr>
                <th scope="row">{{ $portal->id }}</th>
                <td>
                    <a href="{{ $portal->url }}">

                        @if($portal->image_id === NULL || $portal->image->file_view === NULL)
                        @else
                        <img src="{{ asset(Storage::url($portal->image->file_view)) }}" width="30px">
                        @endif

                        {{ $portal->title }}</a>
                </td>
                <td>
                    <a href="#" class="btn btn-icon btn-warning" wire:click="selectItem({{$portal->id}}, 'edit')">
                        <i class="flaticon2-edit"></i>
                    </a>
                    <a href="#" class="btn btn-icon btn-danger" wire:click="selectItem({{$portal->id}}, 'delete')">
                        <i class="flaticon2-delete"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
        Prosze coś dodać)
    @endif
</div>
{{--<!--end::Card-->--}}
<script type="text/javascript">

    window.addEventListener('closeStoreModal', event => {
        $("#addModal").modal('hide')
    })

    window.addEventListener('openEditModal', event => {
        $("#editModal").modal('show')
    })

    window.addEventListener('openDeleteModal', event => {
        $("#deleteModal").modal('show')
    })

    window.addEventListener('closeEditModal', event => {
        $("#editModal").modal('hide')
    })

    window.addEventListener('closeDeleteModal', event => {
        $("#deleteModal").modal('hide')
    })
</script>
