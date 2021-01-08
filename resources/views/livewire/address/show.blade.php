<div class="card-body">

        <!--begin::Search Form-->
        <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="row align-items-center">
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query"/>
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
                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                    <a href="#" class="btn btn-light-primary px-6 font-weight-bold">
                        Search
                    </a>
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
                    @foreach($types as $type)
                        @if($type['value'] == $key->type_id)
                            <span class = "{{ $type['class'] }}">{{ $type['title'] }}</span>
                            @break
                        @endif
                    @endforeach
                </td>
                <td>Tieba</td>
                <td>746 Pine View Junction</td>
            </tr>
            @endforeach
            </tbody>


        </table>

    {{ $address->links() }}
    </div>
