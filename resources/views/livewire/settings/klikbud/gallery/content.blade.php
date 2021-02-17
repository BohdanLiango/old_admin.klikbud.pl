<div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                @if($count_all > 0)
                    @include('livewire.settings.klikbud.gallery.widget')
                @endif
                @if($count_all > 0)
                        <div class="form-group col-xl-3 float-left">
                            <label>{{ trans('admin_klikbud/settings/klikbud/gallery.content.search') }}</label>
                            <input wire:model="searchQuery" class="form-control"/>
                        </div>
                        <div class="form-group col-xl-3 float-right">
                            <label>{{ trans('admin_klikbud/settings/klikbud/gallery.content.status_in_gallery_to_main_page') }}</label>
                            <select wire:model="searchStatus" class="form-control ">
                                @forelse($status_to_main_page as $item)
                                <option value="{{ $item['value'] }}">{{ $item['title'] }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-xl-3 float-right">
                            <label>{{ trans('admin_klikbud/settings/klikbud/gallery.content.status_to_main_page') }}</label>
                            <select wire:model="searchStatusToMainPage" class="form-control ">
                                @forelse($status_to_main_page as $item)
                                    <option value="{{ $item['value'] }}">{{ $item['title'] }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-xl-3 float-right">
                            <label>{{ trans('admin_klikbud/settings/klikbud/gallery.content.category') }}</label>
                            <select wire:model="searchCategory" class="form-control ">
                                @forelse($categories as $category)
                                    <option value="{{ $category['value'] }}">{{ $category['title'] }} -
                                        @if((int)$category['value'] === 0)
                                            {{ $count_active }}
                                        @else
                                        {{ $count_categories[(int)$category['value']] }}
                                        @endif
                                    </option>
                                    @empty
                                @endforelse
                            </select>
                        </div>
                @endif
                @forelse($gallery as $item)
                    <div class="col-xl-4 col-sm-4">
                        <div class="card card-custom gutter-b">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-40 symbol-light-success mr-5"></div>
                                    <div class="d-flex flex-column flex-grow-1"></div>
                                    <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip"
                                         data-placement="left">
                                        <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                            <ul class="navi navi-hover">
                                                <li class="navi-header font-weight-bold py-4"><span class="font-size-lg">{{ trans('admin_klikbud/settings/klikbud/gallery.content.change_status_to_main_page') }}:</span></li>
                                                <li class="navi-separator mb-3 opacity-70"></li>
                                                @if($item->status_to_main_page_id === config('klikbud.klikbud.status_to_main_page.not_visible') )
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link" wire:click="changeStatusInMainPage({{ $item->id }}, {{ config('klikbud.klikbud.status_to_main_page.visible') }})">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($item->status_to_main_page_id === config('klikbud.klikbud.status_to_main_page.visible') )
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link" wire:click="changeStatusInMainPage({{ $item->id}}, {{ config('klikbud.klikbud.status_to_main_page.not_visible') }})">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-danger">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endif
                                                <hr>
                                                <li class="navi-header font-weight-bold py-4">
                                                    <span class="font-size-lg">{{ trans('admin_klikbud/settings/klikbud/gallery.content.change_status_to_gallery') }}:</span>
                                                </li>
                                                <li class="navi-separator mb-3 opacity-70"></li>
                                                @if($item->status_gallery_id === config('klikbud.klikbud.status_to_gallery.not_visible') )
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link" wire:click="changeStatusToGallery({{ $item->id }}, {{ config('klikbud.klikbud.status_to_gallery.visible') }})">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-success">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active') }}</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($item->status_gallery_id ===  config('klikbud.klikbud.status_to_gallery.visible') )
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link" wire:click="changeStatusToGallery({{ $item->id}}, {{ config('klikbud.klikbud.status_to_gallery.not_visible') }})">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-danger">{{ trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden') }}</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endif
                                                <hr>
                                                <li class="navi-header font-weight-bold py-4">
                                                    <span class="font-size-lg">{{ trans('admin_klikbud/settings/klikbud/gallery.content.other') }}:</span>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="{{ route('settings.klikbud.gallery.show', $item->id) }}" class="navi-link">
                                                        <span class="navi-text">
                                                            <span class="label label-xl label-inline label-light-success">{{ trans('admin_klikbud/settings/klikbud/gallery.content.open') }}</span>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li class="navi-item">
                                                    <a href="{{ route('settings.klikbud.gallery.edit', $item->id) }}" class="navi-link">
                                                        <span class="navi-text">
                                                            <span class="label label-xl label-inline label-light-primary">{{ trans('admin_klikbud/settings/klikbud/gallery.content.edit') }}</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="{{ route('download', $item->image_id) }}" class="navi-link">
                                                        <span class="navi-text">
                                                        <span class="label label-xl label-inline label-light-dark">{{ trans('admin_klikbud/settings/klikbud/gallery.content.download_image') }}</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4" wire:load.remove>
                                    <a href="{{ route('settings.klikbud.gallery.show', $item->id) }}">
                                        <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px"
                                             style="background-image: url({{ asset(Storage::url($item->image->path)) }})">
                                        </div>
                                    </a>
                                    <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2"></p>
                                    <div class="d-flex align-items-center">
                                        <p>{{ trans('admin_klikbud/settings/klikbud/gallery.content.title') }}: <b>{{ Str::title($item->title['pl']) }}</b></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p>{{ trans('admin_klikbud/settings/klikbud/gallery.content.status_to_main_page') }}:
                                            @forelse($status_to_main_page as $status)
                                                @if($item->status_to_main_page_id === $status['value'])
                                                    <span class="label label-inline label-{{ $status['class'] }}">{{ $status['title'] }}</span>
                                                @break
                                                @endif
                                            @empty
                                            @endforelse
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                    <p>{{ trans('admin_klikbud/settings/klikbud/gallery.content.status_in_gallery_to_main_page') }}:
                                        @forelse($status_to_main_page as $status)
                                            @if($item->status_gallery_id === $status['value'])
                                                <span class="label label-inline label-{{ $status['class'] }}">{{ $status['title'] }}</span>
                                                @break
                                            @endif
                                        @empty
                                        @endforelse
                                    </p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p>{{ trans('admin_klikbud/settings/klikbud/gallery.content.category') }}:
                                            <b>
                                                @foreach($categories as $category)
                                                    @if($category['value'] === $item->category_id)
                                                        {{ $category['title'] }}
                                                        @break
                                                    @endif
                                                @endforeach
                                            </b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-xl-4 col-sm-4" wire:loading.remove>
                        {{ trans('admin_klikbud/settings/klikbud/gallery.content.not_info') }}.
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap py-2 mr-3">
                    {{ $gallery->links('vendor.livewire.bootstrap') }}
                </div>
            </div>
        </div>
    </div>
</div>
