@if(count($get_data->departments) > 0)
<div class="col-xl-12">
    <div class="card card-custom ">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Addresa</th>
                    <th scope="col">Kontakts</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($get_data->departments as $dep)
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
                        woj.{{ $dep->state->title }}
                        <br>
                        m.{{ $dep->town->title }}
                        <br>
                        ul.{{ $dep->street->title }} {{ $dep->number }} @empty($dep->apartment_number) @else  / {{ $dep->apartment_number }} @endempty
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
                        <a href="{{ route('business.edit', $dep->slug) }}"><i class="flaticon2-pen text-warning mr-2"></i></a>
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
