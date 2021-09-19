<div>
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{ trans('data/address/index.title') }} | {{ trans('data/address/index.title_2') }} : {{ $count_results }}</span>
                <span class="text-muted mt-1 fw-bold fs-7">
                    {{ trans('data/address/index.sub_t_1') }} {{ $countAddress }} {{ trans('data/address/index.sub_t_2')}}
                </span>
            </h3>
            <div class="card-toolbar">
                <div class="me-4">
                    <input wire:model="searchQuery" class="form-control form-control-flush" placeholder="{{ trans('data/address/index.search') }}"/>
                </div>
                <div class="me-4">
                    <select wire:model="searchType" class="form-select form-select-solid" aria-label="Select example">
                        <option value="">{{ trans('data/address/index.types') }}</option>
                        @foreach($types as $type)
                            <option value="{{ $type['value'] }}">{{ $type['title'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="me-4">
                    <select wire:model="paginate" class="form-select form-select-solid" aria-label="Select example">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="1000">1000</option>
                    </select>
                </div>
                @include('app.data.address.menu-button')
            </div>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                    <thead>
                    <tr class="fw-bolder text-muted">
                        <th class="min-w-150px">{{ trans('data/address/index.table.id') }}</th>
                        <th class="min-w-140px">{{ trans('data/address/index.table.title') }}</th>
                        <th class="min-w-120px">{{ trans('data/address/index.table.type') }}</th>
                        <th class="min-w-120px">{{ trans('data/address/index.table.address') }}</th>
                        <th class="min-w-120px">{{ trans('data/address/index.table.info') }}</th>
                        <th class="min-w-100px text-end">{{ trans('data/address/index.table.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                @forelse($address as $add)
                <tr>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-4">{{ $add->id }}</a>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $add->title }}</a>
                    </td>
                    <td>
                        @foreach($types as $type)
                            @if($type['value'] == $add->type_id)
                                    <span @class(['badge', 'badge-light' . '-' .  $type['class']])>{{ $type['title'] }}</span>
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @if($add->type_id === 1)
                            <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">Ziemia</a>
                        @endif
                            @if($add->type_id !== 1)
                                @if($add->type_id === 2 || 3 || 4)
                                    <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6"> {{ $add->country->title }}</a>
                                @endif
                                    <span class="text-muted fw-bold text-muted d-block fs-7">
                                @if($add->type_id === 3 || 4 and $add->type_id !== 2)
                                    {{ $add->state->title }}
                                @endif

                                @if($add->type_id === 4)
                                    /
                                    {{ $add->city->title }}
                                @endif
                                    </span>
                            @endif
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                            @empty($add->user)
                                NULL
                            @else
                            {{ $add->user->name }} {{ $add->user->surname }}
                            @endempty
                        </a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">{{ date('H:i:s d/m/Y', strtotime($add->created_at)) }}</span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><span class="svg-icon svg-icon-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" /><path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" /></svg></span></a>
                    </td>
                </tr>
                @empty
                @endforelse
                    </tbody>
                </table>
                {{ $address->links('vendor.livewire.bootstrap') }}
            </div>
        </div>
    </div>
</div>
