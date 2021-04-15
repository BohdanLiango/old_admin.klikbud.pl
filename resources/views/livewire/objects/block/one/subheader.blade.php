<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <span class="text-dark-50 font-weight-bold mr-5" id="kt_subheader_total">{{ $created_date }}</span>
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <span class="text-dark-50 font-weight-bold mr-5" id="kt_subheader_total"><a href="#">{{ $user_add_first_name }} {{ $user_add_last_name }}</a></span>
                @if(!is_null($m2))
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <span class="text-dark-50 font-weight-bold mr-5" id="kt_subheader_total">{{ $m2 }} m2</span>
                @endif
                @if(!is_null($price_to_m2_start))
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <span class="text-dark-50 font-weight-bold mr-5" id="kt_subheader_total">Cena startowa: {{ $price_to_m2_start }} zł za m2</span>
                @endif
            </div>

        </div>
        <div class="d-flex align-items-center">
            <a href="#" class=""></a>
            <a href="{{ route('objects.all') }}" class="btn btn-light-dark font-weight-bold ml-2">Back</a>
            <a href="{{ route('objects.edit', $object_slug) }}" class="btn btn-light-primary font-weight-bold ml-2">Edit Project</a>
            <a href="#" wire:click="opensModals('delete')" class="btn btn-light-danger font-weight-bold ml-2">Usuń</a>
            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" data-placement="left">
                <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="svg-icon svg-icon-success svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24" /><path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" /><path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" /></g></svg></span></a>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                    <ul class="navi">
                        <li class="navi-header font-weight-bold py-5">
                            <span class="font-size-lg">Add New:</span>
                        </li>
                        <li class="navi-separator mb-3 opacity-70"></li>
                        <li class="navi-item">
                            <a href="#" class="navi-link"><span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
                                <span class="navi-text">Order</span>
                            </a>
                        </li>
                        <li class="navi-item"><a href="#" class="navi-link"><span class="navi-icon"><i class="navi-icon flaticon2-calendar-8"></i></span>
                                <span class="navi-text">Members</span>
                                <span class="navi-label"><span class="label label-light-danger label-rounded font-weight-bold">3</span></span></a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link"><span class="navi-icon"><i class="navi-icon flaticon2-telegram-logo"></i></span>
                                <span class="navi-text">Project</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link"><span class="navi-icon"><i class="navi-icon flaticon2-new-email"></i>
														</span>
                                <span class="navi-text">Record</span>
                                <span class="navi-label"><span class="label label-light-success label-rounded font-weight-bold">5</span></span>
                            </a>
                        </li>
                        <li class="navi-separator mt-3 opacity-70"></li>
                        <li class="navi-footer pt-5 pb-4">
                            <a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">More options</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
