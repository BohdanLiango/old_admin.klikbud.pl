<div>
    {{--<!--begin::Card-->--}}
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/opinion-portal.show.title') }}
                    <span class="d-block text-muted pt-2 font-size-sm">{{ trans('admin_klikbud/settings/klikbud/opinion-portal.show.subtitle') }}</span></h3>
            </div>
            <div class="card-toolbar">
                {{-- <!--begin::Button-->--}}
                <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#addModal">
											<span class="svg-icon svg-icon-md">
                                        {{--<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->--}}
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<circle fill="#000000" cx="9" cy="15" r="6"/>
														<path
                                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                            fill="#000000" opacity="0.3"/>
													</g>
												</svg>
{{--<!--end::Svg Icon-->--}}
											</span>{{ trans('admin_klikbud/settings/klikbud/opinion-portal.show.addButton') }}</a>
                {{--<!--end::Button-->--}}
            </div>
        </div>
{{--<!-- Edit Modal -->--}}
    @include('livewire.settings.klikbud.home.opinions.portal.edit-modal')
{{--<!-- Add Modal -->--}}
        @include('livewire.settings.klikbud.home.opinions.portal.add-modal')
        @include('livewire.settings.klikbud.home.opinions.portal.delete-modal')

        @if(count($portals))
            <div class="card-body">
                <div class="mb-7"></div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/opinion-portal.show.name') }}</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($portals as $portal)
                        <tr>
                            <th scope="row">{{ $portal->id }}</th>
                            <td>
                                <a href="{{ $portal->url }}">
                                    @if($portal->image_id === NULL || $portal->image === null)
                                    @else
                                        <img src="{{ asset(Storage::url($portal->image->path)) }}" width="30px">
                                    @endif

                                    {{ $portal->title }}</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-icon btn-warning"
                                   wire:click="selectItem({{$portal->id}}, 'edit')">
                                    <i class="flaticon2-edit"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-danger"
                                   wire:click="selectItem({{$portal->id}}, 'delete')">
                                    <i class="flaticon2-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="card-body">
                <div class="mb-7"></div>
                <h3>{{ trans('admin_klikbud/settings/klikbud/opinion-portal.show.zeroItems') }}</h3>
            </div>
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
</div>
