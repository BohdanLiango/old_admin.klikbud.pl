<div>
    {{--<!--begin::Card-->--}}
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{ trans('admin_klikbud/business.index.title') }}
                    <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('dashboard') }}" class="btn btn-primary font-weight-bolder"
                   style="margin-right: 10px"><i
                        class="flaticon2-back"></i>{{ trans('admin_klikbud/business.index.buttons.back') }}</a>
                <a href="{{ route('business.add', 'department') }}" class="btn btn-success font-weight-bolder"
                   style="margin-right: 10px"><i
                        class="flaticon2-plus"></i>{{ trans('admin_klikbud/business.index.buttons.department') }}</a>
                <a href="{{ route('business.add', 'business') }}" class="btn btn-success font-weight-bolder"
                   style="margin-right: 10px"><i
                        class="flaticon2-plus"></i>{{ trans('admin_klikbud/business.index.buttons.business') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group col-xl-6 float-left">
                <label>{{ trans('admin_klikbud/business.index.search') }}</label>
                <input wire:model="searchQuery" class="form-control"/>
            </div>
            <div class="form-group col-xl-6 float-left">
                <label>{{ trans('admin_klikbud/business.index.table.type') }}</label>
                <select wire:model="searchCategory" class="form-control">
                    <option value="{{ NULL }}">-----------</option>
                    @forelse($categories as $category)
                        <option value="{{ $category['value'] }}">{{ $category['title'] }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="mb-7"></div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{ trans('admin_klikbud/business.index.table.title') }}</th>
                    <th scope="col">{{ trans('admin_klikbud/business.index.table.nip') }}</th>
                    <th scope="col">{{ trans('admin_klikbud/business.index.table.type') }}</th>
                    <th scope="col">{{ trans('admin_klikbud/business.index.table.category') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($business as $item)
                    <tr class="table-primary">
                       <td>

                           <a href="{{ route('business.one', $item->slug) }}">
                               @if($item->image_id === NULL || $item->image === null)
                               @else
                                   <img src="{{ Storage::disk(config('klikbud.disk_store'))->url($item->image->path) }}" width="20px">
                               @endif
                           <b>
                               {{ $item->title }}
                            @forelse($forms as $form)
                                @if((int)$form['value'] === (int)$item->business_form_id)
                                    @if((int)$item->business_form_id === 99)
                                        {{ $item->business_form_other }}
                                    @else
                                    {{ $form['title'] }}
                                    @endif
                                    @break
                                @endif
                            @empty
                            @endforelse
                           </b>
                           </a>
                       </td>
                        <td><b>{{ $item->NIP }}</b></td>
                        <td>
                            @foreach($types as $type)
                                @if((int)$item->type_id === (int)$type['value'])
                                    <span class="{{ $type['class'] }}">{{ $type['title'] }}</span>
                                    @break
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($categories as $category)
                                @if((int)$category['value'] === (int)$item->category_id)
                                    <span class="{{ $category['class'] }}">{{ $category['title'] }}</span>
                                    @break
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    @forelse($item->departments as $dep)
                    <tr class="table-secondary">
                        <td>{{ $dep->title }}
                            @forelse($forms as $form)
                                @if((int)$form['value'] === (int)$dep->business_form_id)
                                    @if((int)$dep->business_form_id === 99)
                                        {{ $dep->business_form_other }}
                                    @else
                                        {{ $form['title'] }}
                                    @endif
                                    @break
                                @endif
                            @empty
                            @endforelse</td>
                        <td>
                           m.{{ $dep->town->title }}
                        </td>
                        <td>
                            @foreach($types as $type)
                                @if((int)$dep->type_id === (int)$type['value'])
                                    <span class="{{ $type['class'] }}">{{ $type['title'] }}</span>
                                    @break
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($categories as $category)
                                @if((int)$category['value'] === (int)$dep->category_id)
                                    <span class="{{ $category['class'] }}">{{ $category['title'] }}</span>
                                    @break
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    @empty
                    @endforelse
                    @empty
                @endforelse
                </tbody>
            </table>
            {{ $business->links('vendor.livewire.bootstrap') }}
        </div>
    </div>
    {{--<!--end::Card-->--}}
</div>
