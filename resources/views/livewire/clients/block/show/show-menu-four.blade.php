<div class="tab-pane" id="kt_apps_contacts_view_tab_4" role="tabpanel">
    <div class="card-body pt-2">
        @forelse($objects as $object)
        {{--<!--begin::Item-->--}}
        <div class="d-flex flex-wrap align-items-center mb-10">
            {{--<!--begin::Symbol-->--}}
            <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                <div class="symbol-label" style="background-image: url( {{ asset('media/stock-600x400/img-17.jpg') }})"></div>
            </div>
            {{--<!--end::Symbol-->--}}
            {{--<!--begin::Title-->--}}
            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                <a href="{{ route('objects.one', $object->slug) }}" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $object->title }}</a>
                <span class="text-muted font-weight-bold font-size-sm my-1">{{ Str::limit($object->description, 40) }}</span>
                <span class="text-muted font-weight-bold font-size-sm">M2:
														<span class="text-primary font-weight-bold">{{ $object->m2 }}</span></span>
            </div>
            {{--<!--end::Title-->--}}
            {{--<!--begin::Info-->--}}
            <div class="d-flex align-items-center py-lg-0 py-2">
                <div class="d-flex flex-column text-right">
                    <span class="text-dark-75 font-weight-bolder font-size-h4">{{ $object->price_end }}</span>
                    <span class="text-muted font-size-sm font-weight-bolder">zł</span>
                </div>
            </div>
        {{--<!--end::Info-->--}}
        </div>
    {{--<!--end::Item-->--}}
            @empty
            @endforelse
            {{ $notes->links('vendor.livewire.bootstrap') }}
    </div>
</div>
