<div>
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">HTML Table
                    <div class="text-muted pt-2 font-size-sm">Datatable initialized from HTML table</div>
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="#" class="btn btn-success font-weight-bolder" style="margin-right: 10px"><i class="ki ki-plus icon-sm"></i>Nowa Ulica</a>
                <a href="#" class="btn btn-success font-weight-bolder" style="margin-right: 10px"><i class="ki ki-plus icon-sm"></i>Nowe Miasto</a>
                <a href="#" class="btn btn-success font-weight-bolder" style="margin-right: 10px"><i class="ki ki-plus icon-sm"></i>Nowe Wojewódzstwo</a>
            </div>
        </div>

        <div class="card-body">
            <!--begin::Search Form-->
            <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..."
                                           id="kt_datatable_search_query"/>
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">All</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Delivered</option>
                                        <option value="3">Canceled</option>
                                        <option value="4">Success</option>
                                        <option value="5">Info</option>
                                        <option value="6">Danger</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                    <select class="form-control" id="kt_datatable_search_type">
                                        <option value="">All</option>
                                        <option value="1">Online</option>
                                        <option value="2">Retail</option>
                                        <option value="3">Direct</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->

            <table class="table table-bordered table-hover" id="kt_datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Typ</th>
                    <th>Address</th> {{-- Country or State--}}
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($address as $key)
                    <tr>
                        <td>{{ $key->id }}</td>
                        <td>{{ $key->title }}</td>
                        <td>
                            @forelse($type_of_address as $type)
                                @if($type['value'] == $key->type_id)
                                    <span class="{{ $type['class'] }}">{{ $type['title'] }}</span>
                                    @break
                                @endif
                            @empty
                            @endforelse
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $address->links('vendor.livewire.bootstrap') }}
        </div>

    </div>

    {{-- Styles Section --}}
    @section('styles')
        <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
    @endsection

    {{-- Scripts Section --}}
    @section('scripts')
        {{-- vendors --}}
        <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

        {{-- page scripts --}}
        <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @endsection
</div>
