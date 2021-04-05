@if(!is_null($categories))
<div class="card card-custom gutter-b">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column mb-3">
            <span class="card-label font-size-h3 font-weight-bolder text-dark">Kategories</span>
        </h3>
    </div>
    <div class="card-body pt-4">
            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionExample7">
                @forelse($categories as $main_category)
                    @if($main_category->type_id === 1)
                    <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionExample7">
                        <div class="card">
                            <div class="card-header" id="heading{{ $main_category->id }}7">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse{{ $main_category->id }}7">
                                    <span class="svg-icon svg-icon-primary">
                                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                       <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                       <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                       <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                      </g>
                                     </svg>
                                    </span>
                                    <div class="card-label pl-4">{{ $main_category->title }}</div>
                                </div>
                            </div>
                            <div id="collapse{{ $main_category->id }}7" class="collapse" data-parent="#accordionExample7">
                                <div class="card-body pl-12">
                                    <a class="navi-link" href="#" wire:click.prevent="searchCategory({{ $main_category->id }}, 'mainCategory')">
                                        <span class="navi-icon"><i class="flaticon2-check-mark"></i></span>
                                        <span class="navi-text">{{ $main_category->title }}</span>
                                        <span class="navi-label">
                                        <span class="label label-info label-rounded">@if(!is_null($main_category->tools_main)) {{ count($main_category->tools_main) }} @else 0 @endif</span>
                                    </span>
                                    </a>
                                    <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionExample8">
                                    @forelse($categories as $half_category)
                                        @if($half_category->main_category_id === $main_category->id)
                                            <div class="card">
                                                <div class="card-header" id="heading{{ $half_category->id }}8">
                                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse{{ $half_category->id }}8">
                                                        <span class="svg-icon svg-icon-primary">
                                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                               <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                               <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                               <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                                              </g>
                                                             </svg>
                                                            </span>
                                                        <div class="card-label pl-4">{{ $half_category->title }}</div>
                                                    </div>
                                                </div>
                                                <div id="collapse{{ $half_category->id }}8" class="collapse" data-parent="#accordionExample8">
                                                    <div class="card-body pl-12">
                                                        <a class="navi-link" href="#"  wire:click.prevent="searchCategory({{ $half_category->id }}, 'halfCategory')">
                                                            <span class="navi-icon"><i class="flaticon2-check-mark"></i></span>
                                                            <span class="navi-text">{{ $half_category->title }}</span>
                                                            <span class="navi-label">
                                                            <span class="label label-info label-rounded">@if(!is_null($half_category->tools_half)) {{ count($half_category->tools_half) }} @else 0 @endif</span>
                                                        </span>
                                                        </a>
                                                        @forelse($categories as $category)
                                                            @if($category->half_category_id === $half_category->id)
                                                            <ul class="navi">
                                                                <li class="navi-item">
                                                                    <a class="navi-link" href="#" wire:click.prevent="searchCategory({{ $category->id }}, 'category')">
                                                                        <span class="navi-text">{{ $category->title }}</span>
                                                                        <span class="navi-label">
                                                                      <span class="label label-success label-rounded">@if(!is_null($category->tools_category)) {{ count($category->tools_category) }} @else 0 @endif</span>
                                                                  </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            @endif
                                                            @empty
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @empty
                                    @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @empty
                @endforelse
            </div>
    </div>
</div>
@endif
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column mb-3">
                <span class="card-label font-size-h3 font-weight-bolder text-dark">Warehouse</span>
            </h3>
        </div>
        <div class="card-body pt-4">
            <ul class="navi">
                @forelse($warehouses as $warehouse)
                    <li class="navi-item">
                        <a class="navi-link" href="#" wire:click.prevent="searchStatus('warehouse', {{ $warehouse->id }})">
                            <span class="navi-icon"><i class="flaticon2-box-1"></i></span>
                            <span class="navi-text">{{ $warehouse->title }} @if(!is_null($warehouse->square)) - ({{ $warehouse->square }}) @endif</span>
                            <span class="navi-label">
                              <span class="label label-info label-rounded">
                                  {{ count($status_tool->where('table', config('klikbud.status_tools_table.warehouse'))->where('table_id', $warehouse->id)) }}
                              </span>
                          </span>
                        </a>
                    </li>
                    @empty
                @endforelse
            </ul>
        </div>
    </div>

<div class="card card-custom gutter-b">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column mb-3">
            <span class="card-label font-size-h3 font-weight-bolder text-dark">Objects</span>
        </h3>
    </div>
    <div class="card-body pt-4">
        <ul class="navi">
            @forelse($objects as $object)
                @if(count($status_tool->where('table', config('klikbud.status_tools_table.object'))->where('table_id', $object->id)) === 0)
                    @else
                <li class="navi-item">
                    <a class="navi-link" href="#" wire:click.prevent="searchStatus('object', {{ $object->id }})">
                        <span class="navi-icon"><i class="flaticon2-world"></i></span>
                        <span class="navi-text">{{ Str::limit($object->title, 20) }}</span>
                        <span class="navi-label">
                              <span class="label label-info label-rounded">
                                  {{ count($status_tool->where('table', config('klikbud.status_tools_table.object'))->where('table_id', $object->id)) }}
                              </span>
                          </span>
                    </a>
                </li>
                @endif
            @empty
            @endforelse
        </ul>
    </div>
</div>
<div class="card card-custom gutter-b">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column mb-3">
            <span class="card-label font-size-h3 font-weight-bolder text-dark">Clients</span>
        </h3>
    </div>
    <div class="card-body pt-4">
        <ul class="navi">
            @forelse($clients as $client)
                @if(count($status_tool->where('table', config('klikbud.status_tools_table.client'))->where('table_id', $client->id)) === 0)
                @else
                    <li class="navi-item">
                        <a class="navi-link" href="#" wire:click.prevent="searchStatus('client', {{ $client->id }})">
                            <span class="navi-icon"><i class="flaticon2-world"></i></span>
                            <span class="navi-text">{{ Str::limit($client->first_name, 10) }} {{ Str::limit($client->last_name, 10) }}</span>
                            <span class="navi-label">
                              <span class="label label-info label-rounded">
                                  {{ count($status_tool->where('table', config('klikbud.status_tools_table.client'))->where('table_id', $client->id)) }}
                              </span>
                          </span>
                        </a>
                    </li>
                @endif
            @empty
            @endforelse
        </ul>
    </div>
</div>

<div class="card card-custom gutter-b">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column mb-3">
            <span class="card-label font-size-h3 font-weight-bolder text-dark">Business</span>
        </h3>
    </div>
    <div class="card-body pt-4">
        <ul class="navi">
            @forelse($business as $item)
                @if(count($status_tool->where('table', config('klikbud.status_tools_table.business'))->where('table_id', $item->id)) === 0)
                @else
                    <li class="navi-item">
                        <a class="navi-link" href="#" wire:click="searchStatus('business', {{ $item->id }})">
                            <span class="navi-icon"><i class="flaticon2-world"></i></span>
                            <span class="navi-text">{{ Str::limit($item->title, 20) }}</span>
                            <span class="navi-label">
                              <span class="label label-info label-rounded">
                                  {{ count($status_tool->where('table', config('klikbud.status_tools_table.business'))->where('table_id', $item->id)) }}
                              </span>
                          </span>
                        </a>
                    </li>
                @endif
            @empty
            @endforelse
        </ul>
    </div>
</div>

