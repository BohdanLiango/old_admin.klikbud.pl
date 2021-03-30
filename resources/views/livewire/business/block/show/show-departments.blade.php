@if(count($get_data->departments) > 0)
<div class="col-xl-12">
    <div class="card card-custom ">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{ trans('admin_klikbud/business.show.departments_table.title') }}</th>
                    <th scope="col">{{ trans('admin_klikbud/business.show.departments_table.description') }}</th>
                    <th scope="col">{{ trans('admin_klikbud/business.show.departments_table.category') }}</th>
                    <th scope="col">{{ trans('admin_klikbud/business.show.departments_table.address') }}</th>
                    <th scope="col">{{ trans('admin_klikbud/business.show.departments_table.contacts') }}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($get_data->departments as $dep)
                    @include('livewire.business.block.show.show-delete-department-modal')
                <tr>
                    <td>
                        {{ $dep->title }}
                        @forelse($business_form as $form)
                            @if((int)$form['value'] === (int)$dep->business_form_id)
                                @if((int)$dep->business_form_id === 99)
                                    {{ $dep->business_form_other }}
                                @else
                                    {{ $form['title'] }}
                                @endif
                                @break
                            @endif
                        @empty
                        @endforelse
                    </td>
                    <td>
                        <p>{{ $dep->descriptions }}</p>
                    </td>
                    <td>
                        @foreach($categories as $category)
                            @if((int)$category['value'] === (int)$dep->category_id)
                                <span class="{{ $category['class'] }}">{{ $category['title'] }}</span>
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td>
                        {{ $dep->country->title }}
                        <br>
                        {{ trans('admin_klikbud/business.show.address.state') }}{{ $dep->state->title }}
                        <br>
                        {{ trans('admin_klikbud/business.show.address.town') }}{{ $dep->town->title }}
                        <br>
                        {{ trans('admin_klikbud/business.show.address.street') }}{{ $dep->street->title }} {{ $dep->number }} @empty($dep->apartment_number) @else  / {{ $dep->apartment_number }} @endempty
                        <br>
                        {{ $dep->zip_code }}
                    </td>
                    <td>
                        {{ $dep->email }}
                        <br>
                        {{ $dep->phone }}
                        <br>
                        {{ $dep->site }}
                    </td>
                    <td>
                        <a href="{{ route('business.edit', $dep->slug) }}"><i class="flaticon2-edit text-warning mr-2"></i></a>
                        <a href="#" wire:click="opensModals('deleteDepartment', {{ $dep->id }})"><i class="flaticon2-delete text-danger"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
