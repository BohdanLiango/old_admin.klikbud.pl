<div class="card card-custom card-stretch card-stretch-half gutter-b">
    <div class="card-header border-0 pt-6 mb-2">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bold font-size-h4 text-dark-75 mb-3">Narzedzia  - {{ count($tools_in_box) }}</span>
            <span class="text-muted font-weight-bold font-size-sm"></span>
        </h3>
        <div class="card-toolbar">
{{--                <a href="#" class="btn btn-light-success btn-sm font-weight-normal font-size-sm" aria-haspopup="true" aria-expanded="false">Dodaj</a>--}}
        </div>
    </div>
    <div class="card-body pt-2">
        <div class="table-responsive">
            <table class="table table-borderless mb-0">
                <tbody>
                @forelse($tools_in_box as $tool)
                <tr>
                    <td class="align-middle w-50px pl-0 pr-2 pb-2">
                        <div class="symbol symbol-50 symbol-light-success">
                            @if(is_null($tool->image_id))
                                <div class="symbol-label" style="background-image: url({{ asset('media/static/no-image.jpg') }})"></div>
                            @else
                                <div class="symbol-label" style="background-image: url({{ Storage::disk(config('klikbud.disk_store'))->url($tool->image->path) }})"></div>
                            @endif
                        </div>
                    </td>
                    <td class="align-middle pb-2">
                        <div class="font-size-lg font-weight-bolder text-dark-75 mb-1">
                            <a href="{{ route('warehouses.tools.one', $tool->slug) }}" target="_blank">{{ $tool->title }}</a>
                        </div>
                    </td>
                    <td class="font-weight-bold text-muted align-middle text-right pb-6">
                        <span class="text-primary font-size-h5 font-weight-bolder ml-1">
                             @if(!is_null($tool->main_category_id)) {{ $tool->main_category->title }} @endif
                            @if(!is_null($tool->half_category_id)) / {{ $tool->half_category->title }} @endif
                            @if(!is_null($tool->category_id)) / {{ $tool->category->title }} @endif
                        </span>
                    </td>
                    <td class="text-right align-middle pb-6">
                        <div class="font-size-lg font-weight-bolder text-dark-75">
                            <button class="btn btn-light-danger btn-sm font-weight-normal font-size-sm" wire:click.prevent="deleteToolInBox({{ $tool->id }})"><i class="icon flaticon-delete"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                @endforelse
                </tbody>
            </table>
            {{ $tools_in_box->links('vendor.livewire.bootstrap') }}
        </div>
    </div>
</div>
