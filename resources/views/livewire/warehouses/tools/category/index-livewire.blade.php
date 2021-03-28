<div>
    {{--<!--begin::Card-->--}}
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{ trans('admin_klikbud/warehouse/toolsCategory.index.title') }}
                    <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('warehouses.tools.show') }}" class="btn btn-primary font-weight-bolder" style="margin-right: 10px"><i class="flaticon2-back"></i>{{ trans('admin_klikbud/warehouse/toolsCategory.index.buttons.back') }}</a>
                <a href="{{ route('warehouses.tools.categories.add', 3) }}" class="btn btn-success font-weight-bolder" style="margin-right: 10px"><i class="flaticon2-plus"></i>{{ trans('admin_klikbud/warehouse/toolsCategory.index.buttons.add_category') }}</a>
                <a href="{{ route('warehouses.tools.categories.add', 2) }}" class="btn btn-success font-weight-bolder" style="margin-right: 10px"><i class="flaticon2-plus"></i>{{ trans('admin_klikbud/warehouse/toolsCategory.index.buttons.add_half') }}</a>
                <a href="{{ route('warehouses.tools.categories.add', 1) }}" class="btn btn-success font-weight-bolder" style="margin-right: 10px"><i class="flaticon2-plus"></i>{{ trans('admin_klikbud/warehouse/toolsCategory.index.buttons.add_main') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group col-xl-{{ $class_change }} float-left">
                <label>{{ trans('admin_klikbud/warehouse/toolsCategory.index.search') }}</label>
                <input wire:model="searchQuery" class="form-control" />
            </div>
            <div class="form-group col-xl-{{ $class_change }} float-left">
                <label>{{ trans('admin_klikbud/warehouse/toolsCategory.index.type') }}</label>
                <select wire:model="searchType" class="form-control">
                    <option value="{{ NULL }}">-----------</option>
                    @forelse($types as $type)
                        <option value="{{ $type['value'] }}">{{ $type['title'] }}
                            @if(!is_null($count_types)) - {{ $count_types[(int)$type['value'] - 1] }} @endif
                        </option>
                    @empty
                    @endforelse
                </select>
            </div>

            <div class="form-group col-xl-{{ $class_change }} float-left">
                <label>{{ trans('admin_klikbud/warehouse/toolsCategory.index.main_category') }}</label>
                <select wire:model="searchMain" class="form-control">
                    <option value="{{ NULL }}">-----------</option>
                    @forelse($main_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            @if($this->searchMain !== '')
            <div class="form-group col-xl-{{ $class_change }} float-left">
                <label>{{ trans('admin_klikbud/warehouse/toolsCategory.index.half_category') }}</label>
                <select wire:model="searchHalf" class="form-control">
                    <option value="{{ NULL }}">-----------</option>
                    @forelse($half_categories as $half)
                        <option value="{{ $half->id }}">{{ $half->title }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            @endif

            <div class="mb-7"></div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{ trans('admin_klikbud/warehouse/toolsCategory.index.table.id') }}</th>
                    <th scope="col">{{ trans('admin_klikbud/warehouse/toolsCategory.index.table.title') }}</th>
                    <th scope="col">{{ trans('admin_klikbud/warehouse/toolsCategory.index.table.type') }}</th>
                    <th scope="col">{{ trans('admin_klikbud/warehouse/toolsCategory.index.table.category') }}</th>
                    <th scope="col">{{ trans('admin_klikbud/warehouse/toolsCategory.index.table.info') }}</th>
                    <th scope="col">{{ trans('admin_klikbud/warehouse/toolsCategory.index.table.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $add)
                    <tr>
                        <th scope="row">{{ $add->id }}</th>
                        <td>{{ $add->title }}</td>
                        <td>
                            @foreach($types as $type)
                                @if((int)$type['value'] === (int)$add->type_id)
                                    <span class = "{{ $type['class'] }}">{{ $type['title'] }}</span>
                                    @break
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @if($add->type_id !== 1)
                                @if($add->type_id === 3)
                                    {{ $add->half_category->title }} /
                                @endif
                                @if($add->type_id === 3 || 2)
                                        {{ $add->main_category->title }}
                                @endif
                            @endif
                        </td>
                        <td>
                            {{ $add->user->name }} {{ $add->user->surname }}
                            <br>
                            {{ date("H:i:s d/m/Y", strtotime($add->created_at)) }}
                        </td>
                        <td>
                            <a href="{{ route('warehouses.tools.categories.edit', $add->id) }}" class="btn btn-icon btn-warning"><i class="flaticon2-edit"></i></a>
                            @if($add->type_id === 1 && count($add->half_categories) === 0)
                                <a href="#" wire:click="selectItem({{ $add->id }}, 'delete')" class="btn btn-icon btn-danger"><i class="flaticon2-delete"></i></a>
                            @endif
                            @if($add->type_id === 2 && count($add->main_categories) === 0)
                                <a href="#" wire:click="selectItem({{ $add->id }}, 'delete')" class="btn btn-icon btn-danger"><i class="flaticon2-delete"></i></a>
                            @endif
                            @if($add->type_id === 3)
                                <a href="#" wire:click="selectItem({{ $add->id }}, 'delete')" class="btn btn-icon btn-danger"><i class="flaticon2-delete"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links('vendor.livewire.bootstrap') }}
        </div>
    </div>
    {{--<!--end::Card-->--}}
    @include('livewire.warehouses.tools.category.delete-modal')
    <script type="text/javascript">
        window.addEventListener('openDeleteModal', event => {
            $("#deleteModal").modal('show')
        })
        window.addEventListener('closeDeleteModal', event => {
            $("#deleteModal").modal('hide')
        })
    </script>
</div>
