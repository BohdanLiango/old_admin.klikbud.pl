<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            @include('livewire.settings.klikbud.home.opinions.widget')
            @if($count > 0)
                    <div class="form-group col-xl-6">
                        <label>{{ trans('admin_klikbud/settings/klikbud/opinion.show.search') }}</label>
                        <input wire:model="searchQuery" class="form-control"/>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>{{ trans('admin_klikbud/settings/klikbud/opinion.show.rating') }}</label>
                        <select wire:model="searchStars" class="form-control ">
                            <option value="">{{ trans('admin_klikbud/settings/klikbud/opinion.show.all') }} ({{ $count }})</option>
                            <option value="1">1 - {{ trans('admin_klikbud/settings/klikbud/opinion.show.star') }}({{$countOne}})</option>
                            <option value="2">2 - {{ trans('admin_klikbud/settings/klikbud/opinion.show.stars') }}({{$countTwo}})</option>
                            <option value="3">3 - {{ trans('admin_klikbud/settings/klikbud/opinion.show.stars') }}({{$countThree}})</option>
                            <option value="4">4 - {{ trans('admin_klikbud/settings/klikbud/opinion.show.stars') }}({{$countFour}})</option>
                            <option value="5">5 - {{ trans('admin_klikbud/settings/klikbud/opinion.show.star_1') }}({{$countFive}})</option>
                        </select>
                </div>
            @endif
{{--            <!--begin::Pagination-->--}}
                <div class="col-xl-12 d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex flex-wrap py-2 mr-3">
                        {{ $opinions->links('vendor.livewire.bootstrap') }}
                    </div>
                </div>
{{--                <!--end:: Pagination-->--}}
            @forelse($opinions as $opinion)
                <div class="col-xl-12 col-sm-12">
{{--                    <!--begin::Forms Widget 4-->--}}
                    <div class="card card-custom gutter-b">
{{--                        <!--begin::Body-->--}}
                        <div class="card-body">
{{--                            <!--begin::Top-->--}}
                            <div class="d-flex align-items-center">
{{--                                <!--begin::Symbol-->--}}
                                <div class="symbol symbol-40 symbol-light-success mr-5"><span class="symbol-label"><img src="" class="h-75 align-self-end" alt=""/></span></div>
{{--                                <!--end::Symbol-->--}}
{{--                                <!--begin::Info-->--}}
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#"
                                       class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder"> {{ $opinion->name }}</a>
                                    <span class="text-muted font-weight-bold"> <b>{{ trans('admin_klikbud/settings/klikbud/opinion.show.date_add') }}:</b> {{ date("d/m/Y", strtotime($opinion->date_add)) }}</span>
                                </div>
{{--                                <!--end::Info-->--}}
{{--                                <!--begin::Dropdown-->--}}
                                <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions"
                                     data-placement="left">
                                    <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
{{--                                        <!--begin::Navigation-->--}}
                                        <ul class="navi navi-hover">
                                            <li class="navi-header font-weight-bold py-4">
                                                <span class="font-size-lg">{{ trans('admin_klikbud/settings/klikbud/opinion.show.status_change') }}:</span>
                                            </li>
                                            <li class="navi-separator mb-3 opacity-70"></li>

                                            @if($opinion->status_to_main_page_id === config('klikbud.klikbud.status_to_main_page.not_visible'))
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link" wire:click="changeStatusInMainPage({{ $opinion->id }}, {{ config('klikbud.klikbud.status_to_main_page.visible') }})"><span class="navi-text"><span class="label label-xl label-inline label-light-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</span></span></a>
                                                </li>
                                            @endif
                                            @if($opinion->status_to_main_page_id === config('klikbud.klikbud.status_to_main_page.visible'))
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link" wire:click="changeStatusInMainPage({{ $opinion->id}}, {{ config('klikbud.klikbud.status_to_main_page.not_visible') }})"><span class="navi-text"><span class="label label-xl label-inline label-light-danger">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</span></span></a>
                                                </li>
                                            @endif
                                            <hr>
                                            <li class="navi-header font-weight-bold py-4">
                                                <span class="font-size-lg">{{ trans('admin_klikbud/settings/klikbud/opinion.show.other') }}:</span>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('settings.klikbud.home.opinion.edit', [$opinion->id]) }}"  class="navi-link"><span class="navi-text"><span class="label label-xl label-inline label-light-primary">{{ trans('admin_klikbud/settings/klikbud/opinion.show.edit') }}</span></span></a>
                                            </li>
                                            <li class="navi-item">
                                                <a wire:click="selectItem({{ $opinion->id }}, 'delete')" href="#" class="navi-link">
                                                    <span class="navi-text"><span class="label label-xl label-inline label-danger">{{ trans('admin_klikbud/settings/klikbud/opinion.show.delete') }}</span></span>
                                                </a>
                                            </li>
                                        </ul>
{{--                                        <!--end::Navigation-->--}}
                                    </div>
                                </div>
{{--                                <!--end::Dropdown-->--}}
                            </div>
{{--                            <!--end::Top-->--}}
{{--                            <!--begin::Bottom-->--}}
                            <div class="pt-4">
                                <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2">
                                 <b>{{ trans('admin_klikbud/settings/klikbud/opinion.show.serves') }}:</b> {{ $opinion->service->title['pl'] }}
                                    | <b>{{ trans('admin_klikbud/settings/klikbud/opinion.show.portal') }}:</b>
                                    @forelse($portals as $portal)
                                        @if($portal->id === $opinion->portal_opinion_id)
                                            @if($portal->image !== null)
                                            <img src="{{ asset(Storage::url($portal->image->path)) }}" alt="" width="20px">
                                            @endif
                                            <a href="{{ $portal->url }}">{{ $portal->title }}</a>
                                            @break
                                        @endif
                                    @empty
                                    @endforelse

                                | <b>{{ trans('admin_klikbud/settings/klikbud/opinion.show.status') }}: </b>
                                    @if($opinion->status_to_main_page_id === config('klikbud.klikbud.status_to_main_page.visible'))
                                        <span class="label label-inline label-success ">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</span>
                                    @elseif($opinion->status_to_main_page_id === config('klikbud.klikbud.status_to_main_page.not_visible'))
                                        <span class="label label-inline label-danger ">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</span>
                                    @endif
                                    | <b>{{ trans('admin_klikbud/settings/klikbud/opinion.show.rating') }}: </b>
                                    @for($i = 0; $i < $opinion->stars; $i++)
                                        <i class="fa fa-star text-black"></i>
                                    @endfor
                                </p>
                            </div>
                            <div class="separator separator-solid mt-2 mb-4"></div>
{{--                            <!--end::Separator-->--}}
                                <p> <b>{{ trans('admin_klikbud/settings/klikbud/opinion.show.opinion') }}:</b> {{ $opinion->opinion }}</p>
                        </div>
{{--                        <!--end::Body-->--}}
                    </div>
{{--                    <!--end::Forms Widget 4-->--}}
                </div>
            @empty
                <div class="col-xl-4 col-sm-4" wire:loading.remove>
                    {{ trans('admin_klikbud/settings/klikbud/opinion.show.dont_have_anything') }}.
                </div>
            @endforelse
        </div>

{{--        <!-- Modal-->--}}
        <div class="modal fade" id="deleteModalForm" tabindex="-1" role="dialog" aria-labelledby="deleteModalForm" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin_klikbud/settings/klikbud/opinion.delete_modal.question') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>{{ trans('admin_klikbud/settings/klikbud/opinion.delete_modal.creator') }}: {{ $data_name }}</h3>
                        <br>
                        <hr>
                        <p> {{ $data_opinion }}  </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">{{ trans('admin_klikbud/settings/klikbud/opinion.delete_modal.close') }}</button>
                        <button type="button" wire:click.prevent="delete" class="btn btn-danger font-weight-bold">{{ trans('admin_klikbud/settings/klikbud/opinion.delete_modal.save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('openDeleteModal', event => {
        $("#deleteModalForm").modal('show')
    })
    window.addEventListener('closeDeleteModal', event => {
        $("#deleteModalForm").modal('hide')
    })
</script>
