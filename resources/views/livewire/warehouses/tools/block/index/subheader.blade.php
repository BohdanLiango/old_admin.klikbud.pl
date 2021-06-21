<div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <h5 class="text-dark font-weight-bold my-1 mr-5">{{ trans('admin_klikbud/warehouse/tools.index.subheader.title') }}
                    @empty($searchStatus) @else
                        @foreach($status as $item)
                            @if($item['value'] == $searchStatus)
                                <span class="{{ $item['class'] }} label-xl">{{ $item['title'] }}</span>
                            @endif
                        @endforeach
                    @endempty

                    @empty($searchMainCategory) @else | <i class="flaticon2-check-mark"></i> {{ $searchCategoryName }} @endempty
                    @empty($searchHalfCategory) @else | <i class="flaticon2-check-mark"></i> {{ $searchCategoryName }} @endempty
                    @empty($searchCategory) @else | <i class="flaticon2-check-mark"></i> {{ $searchCategoryName }} @endempty
                    @empty($searchBoxId) @else | <i class="flaticon2-open-box"></i> {{ $searchBoxTitle }} @endempty
                    @empty($searchGlobalStatusName) @else | <i class="flaticon2-check-mark"></i> {{ $searchGlobalStatusName }} @endempty
                    @if($is_new !== 'dont_open_box')
                        <i class="flaticon-add"></i> Nowy
                    @endif

                    @if((int)$showCloseFiltersButton === 2)
                       | <a href="#" wire:click.prevent="clearSearchOptions()" class="btn btn-light-primary btn-sm font-weight-bolder">
                           <i class="flaticon2-delete"></i>
                        </a>
                    @endif

                </h5>
            </div>
        </div>


        <div class="d-flex align-items-center">
            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left">
                <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="svg-icon svg-icon-success svg-icon-2x">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
													</g>
												</svg>
											</span>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
                    <ul class="navi navi-hover">
                        <li class="navi-header font-weight-bold py-4">
                            <span class="font-size-lg">{{ trans('admin_klikbud/warehouse/tools.index.subheader.buttons.label') }}:</span>
                        </li>
                        <li class="navi-separator mb-3 opacity-70"></li>
                        <li class="navi-item">
                            <a href="{{ route('warehouses.tools.add', 'tool') }}" class="navi-link"><span class="navi-text"><span class="label label-xl label-inline label-light-success">{{ trans('admin_klikbud/warehouse/tools.index.subheader.buttons.tool') }}</span></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('warehouses.tools.cart.show') }}"><span class="svg-icon svg-icon-success svg-icon-2x"><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"/></g></svg><!--end::Svg Icon--></span></span>
            {{ $collect_cart_count }}
            </a>
        </div>
    </div>
</div>
