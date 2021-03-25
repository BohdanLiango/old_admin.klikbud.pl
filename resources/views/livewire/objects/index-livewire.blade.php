<div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ trans('admin_klikbud/objects.index.title') }}</h5>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>

                    <div class="d-flex align-items-center mr-8" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $count_all }} {{ trans('admin_klikbud/objects.index.total') }}</span>
                        <div class="input-group input-group-sm input-group-solid ml-5" style="max-width: 175px">
                            <input type="text" class="form-control" id="kt_subheader_search_form" placeholder="{{ trans('admin_klikbud/objects.index.search') }}..." />
                            <div class="input-group-append"><span class="input-group-text"><span class="svg-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" /><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" /></g></svg></span></span></div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center form-group row mb-2">
                            <select class="form-control" data-size="7">
                                <option value="">Select</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                            </select>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="#" class=""></a>
                    <a href="{{ route('objects.add') }}" class="btn btn-light-primary font-weight-bold ml-2">{{ trans('admin_klikbud/objects.index.buttons.add_new') }}</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column-fluid">
            <div class="container">
               @include('livewire.objects.block.index-content')
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex flex-wrap mr-3">
                        {{ $objects_show->links('vendor.livewire.bootstrap') }}
                    </div>
                    <div class="d-flex align-items-center">
                        <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;"  wire:model="paginate">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="text-muted">{{ trans('admin_klikbud/objects.index.displaying') }} {{ $paginate }} {{ trans('admin_klikbud/objects.index.of') }} {{ $count_all }} {{ trans('admin_klikbud/objects.index.records') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
