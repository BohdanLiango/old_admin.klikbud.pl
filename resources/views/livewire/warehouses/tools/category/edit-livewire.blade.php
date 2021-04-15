<div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-toolbar float-left">
                        <a href="{{ route('warehouses.tools.categories.show') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-xs"></i>{{ trans('admin_klikbud/warehouse/toolsCategory.add_edit.button.back') }}
                        </a>
                        @if($errors->any())
                            <a href="#" class="btn btn-light-danger font-weight-bolder mr-2">
                                <i class="la la-warning icon-xs"></i> {{ trans('admin_klikbud/warehouse/toolsCategory.add_edit.error') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <form class="form" id="kt_form" method="POST" wire:submit.prevent="update()" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-10">
                                <div class="my-5">
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">{{ trans('admin_klikbud/warehouse/toolsCategory.add_edit.title') }}</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model.lazy="title" />
                                            @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    @if((int)$typeId === 2 || (int)$typeId === 3)
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">
                                                @if((int)$typeId === 2)
                                                    {{ trans('admin_klikbud/warehouse/toolsCategory.add_edit.main_category') }}
                                                @endif
                                                @if((int)$typeId === 3)
                                                    {{ trans('admin_klikbud/warehouse/toolsCategory.add_edit.half_category') }}
                                                @endif</label>

                                            @if((int)$typeId === 2)
                                                <div wire:ignore class="col-lg-9 col-md-9 col-sm-12">
                                                    <select  class="form-control selectpicker @error('selected_main_category_id') is-invalid @enderror" data-size="5" data-live-search="true" wire:model="selected_main_category_id">
                                                        <option value="{{ NULL }}"></option>
                                                        @forelse($categories_show as $category)
                                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                    @error('selected_main_category_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                                </div>
                                            @endif

                                            @if((int)$typeId === 3)
                                                <div wire:ignore class="col-lg-9 col-md-9 col-sm-12">
                                                    <select  class="form-control selectpicker @error('selected_half_category_id') is-invalid @enderror" data-size="5" data-live-search="true" wire:model="selected_half_category_id">
                                                        <option value="{{ NULL }}"></option>
                                                        @foreach($categories_show as $category)
                                                            <option value="{{ $category->id }}">{{ $category->title }} / {{ $category->main_category->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('selected_half_category_id') <span style="color: red"> {{ $message }}</span>@enderror
                                            @endif

                                        </div>
                                    @endif

                                </div>
                                <button type="submit" class="btn btn-warning"> <i class="ki ki-check icon-xs"></i>{{ trans('admin_klikbud/warehouse/toolsCategory.add_edit.button.edit') }}</button>
                            </div>
                            <div class="col-xl-2"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts_p')
        <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-select.js') }}"></script>
    @endpush
</div>
