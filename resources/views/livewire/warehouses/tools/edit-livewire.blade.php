<div>
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div wire:ignore class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    {{ trans('admin_klikbud/warehouse/tools.add_edit.edit_title') }}
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('warehouses.tools.one', $tools['slug']) }}" class="btn btn-light-primary font-weight-bolder mr-2">
                    <i class="ki ki-long-arrow-back icon-sm"></i>
                    {{ trans('admin_klikbud/warehouse/tools.add_edit.buttons.back') }}
                </a>
                <div class="btn-group">
                    <button type="button" wire:click="update()" class="btn btn-warning font-weight-bolder">
                        <i class="ki ki-check icon-sm"></i>
                        {{ trans('admin_klikbud/warehouse/tools.add_edit.buttons.edit_button') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="form" id="kt_form">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="my-5">
                            <h3 class=" text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.h2_1') }}:</h3>

                            <div class="form-group row">
                                <label class="col-3">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.title') }}<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid  @error('tools.title') is-invalid @enderror"
                                           type="text" placeholder="{{ trans('admin_klikbud/warehouse/tools.add_edit.form.title_placeholder') }}" wire:model.lazy="tools.title"/>
                                    @error('tools.title')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.is_box') }}</label>
                                <div class="col-9">
                                    <span class="switch switch-icon">
                                        <label><input wire:model="tools.is_box" type="checkbox" checked="checked" name="select"/><span></span></label>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3" for="category_main">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.main_category') }}<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <div wire:ignore>
                                        <select  id="category_mail" class="form-control selectpicker form-control-solid  @error('tools.main_category_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="tools.main_category_id">
                                            <option value="">{{ trans('admin_klikbud/objects.add_edit_page.select') }}...</option>
                                            @forelse($main_categories as $category)
                                                <option  value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    @error('tools.main_category_id') <span style="color: red"> {{ $message }}</span> @enderror
                                </div>
                            </div>

                            @if($half_category_check == true)
                                <div class="form-group row">
                                    <label for="half_category_id" class="col-3">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.half_category') }}</label>
                                    <div class="col-9">
                                        <select id="half_category_id" class="form-control form-control-solid  @error('tools.half_category_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="tools.half_category_id">
                                            <option value="">{{ trans('admin_klikbud/objects.add_edit_page.select') }}...</option>
                                            @forelse($half_categories as $category)
                                                <option  value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('tools.half_category_id') <span style="color: red"> {{ $message }}</span> @enderror
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row">
                                @if($categories_check == true)
                                    <label for="category_id" class="col-3">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.category') }}</label>
                                    <div class="col-9">
                                        <select id="category_id" class="form-control form-control-solid  @error('tools.category_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="tools.category_id">
                                            <option value="">{{ trans('admin_klikbud/objects.add_edit_page.select') }}...</option>
                                            @forelse($categories as $category)
                                                <option  value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('tools.category_id') <span style="color: red"> {{ $message }}</span> @enderror
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="exampleTextarea" class="col-3">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.description') }}</label>
                                <div class="col-9">
                                    <textarea class="form-control @error('tools.description') is-invalid @enderror" id="exampleTextarea" rows="5" wire:model="tools.description"></textarea>
                                    @error('tools.description')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            @if($image)
                                <div class="form-group row" wire:loading.remove wire:targe="image">
                                    <div class="col-3"></div>
                                    <div class="col-9">
                                        <img src="{{ $image->temporaryUrl() }}" style="width: 300px">
                                    </div>
                                </div>
                            @elseif(!is_null($oldFiles->image))
                                <div class="form-group row">
                                    <label for="image" class="col-3"></label>
                                    <div class="col-9">
                                        <img src="{{Storage::disk(config('klikbud.disk_store'))->url($oldFiles->image->path) }}" style="width: 300px">
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="image" class="col-3">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.image') }}</label>
                                <div class="col-9">
                                    <input type="file" class="custom-file-input form-control @error('image') is-invalid @enderror " wire:model="image" name="image" id="customFile" accept=".png, .jpg, .jpeg"/>
                                    <label class="custom-file-label" for="customFile">{{ trans('admin_klikbud/business.add_edit_form.choose_image') }}</label>
                                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    <span class="form-text text-muted">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.image_info') }}</span>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>
                            <div class="my-5">
                                <h3 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.h2_2') }}:</h3>
                            </div>

                            <div class="form-group row">
                                <label for="kt_datepicker_3" class="col-form-label col-3">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.date_purchase') }}</label>
                                <div class="col-9">
                                    <div class="input-group date" >
                                        <input wire:model.defer="tools.purchase_date" type="text"  class="form-control" readonly  value="" id="kt_datepicker_3"
                                               data-date-format="dd/mm/yyyy"  data-date-locale="pl" onchange="this.dispatchEvent(new InputEvent('input'))"/>
                                        <div class="input-group-append">
                                           <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                           </span>
                                        </div>
                                    </div>
                                    @error('tools.purchase_date')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3" for="price">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.price') }}</label>
                                <div class="input-group col-9">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.price_value') }}</span>
                                    </div>
                                    <input id="price" type="text" class="form-control @error('tools.price') is-invalid @enderror" aria-label="Amount (to the nearest dollar)" wire:model="tools.price"/>
                                    @error('tools.price')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3" for="serial_number">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.serial_number') }}</label>
                                <div class="col-9">
                                    <input class="form-control form-control-solid @error('tools.serial_number') is-invalid @enderror"
                                           placeholder="{{ trans('admin_klikbud/clients.add_info_placeholder') }}" type="text"
                                           wire:model.lazy="tools.serial_number" id="serial_number"/>
                                    @error('tools.serial_number')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3" for="business_departments_id">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.where_buy') }}<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <div wire:ignore>
                                        <select  class="form-control selectpicker form-control-solid
                                                    @error('tools.business_departments_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="tools.business_departments_id" id="business_departments_id">
                                            <option value="">{{ trans('admin_klikbud/objects.add_edit_page.select') }}...</option>
                                            @forelse($departments as $item)
                                                <option value="{{ $item['id']}}">{{ $item['title'] }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    @error('tools.business_departments_id') <span style="color: red"> {{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3" for="manufacturer_id">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.manufakturer') }}</label>
                                <div class="col-9">
                                    <div wire:ignore>
                                        <select  class="form-control selectpicker form-control-solid  @error('tools.manufacturer_id') is-invalid @enderror" data-live-search="true" data-size="5" wire:model.lazy="tools.manufacturer_id" id="manufacturer_id">
                                            <option value="">{{ trans('admin_klikbud/objects.add_edit_page.select') }}...</option>
                                            @forelse($business as $item)
                                                <option value="{{ $item['id']}}">{{ $item['title'] }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    @error('tools.manufacturer_id') <span style="color: red"> {{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>
                            <div class="my-5">
                                <h3 class="text-dark font-weight-bold mb-10">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.h2_3') }}:</h3>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-3" for="kt_datepicker_3">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.date_end_guarantee') }}</label>
                                <div class="col-9">
                                    <div class="input-group date" >
                                        <input wire:model.defer="tools.guarantee_date_end" type="text"  class="form-control" readonly  value="" id="kt_datepicker_3"
                                               data-date-format="dd/mm/yyyy"  data-date-locale="pl" onchange="this.dispatchEvent(new InputEvent('input'))"
                                        />
                                        <div class="input-group-append">
                                           <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                           </span>
                                        </div>
                                    </div>
                                    @error('tools.guarantee_date_end')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            @if($guarantee_file)
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center">
                                        <img alt="" class="max-h-65px" src="{{ asset('media/svg/files/pdf.svg') }}" />
                                        <a href="#" class="text-dark-75 font-weight-bold mt-15 font-size-lg">{{ $this->guarantee_file->getClientOriginalName() }}</a>
                                    </div>
                                </div>
                            @elseif(!is_null($oldFiles->guarantee_file_add))
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center">
                                        <img alt="" class="max-h-65px" src="{{ asset('media/svg/files/pdf.svg') }}" />
                                        <a href="#" class="text-dark-75 font-weight-bold mt-15 font-size-lg">{{ $oldFiles->guarantee_file_add->name }}</a>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="guarantee_file" class="col-3">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.file_guarantee') }}</label>
                                <div class="col-9">
                                    <input type="file" class="custom-file-input form-control @error('guarantee_file') is-invalid @enderror " wire:model.defer="guarantee_file" name="guarantee_file" id="guarantee_file" accept=".pdf"/>
                                    <label class="custom-file-label" for="customFile">{{ trans('admin_klikbud/business.add_edit_form.choose_image') }}</label>
                                    @error('guarantee_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    <span class="form-text text-muted">{{ trans('admin_klikbud/warehouse/tools.add_edit.form.file_guarantee_info') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('scripts')
        <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
    @endsection
</div>
