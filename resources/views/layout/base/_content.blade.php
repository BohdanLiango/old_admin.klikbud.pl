{{-- Content --}}
@if (config('layout.content.extended'))
    @yield('content')
@else
    <div class="d-flex flex-column-fluid">
        <div class="{{ Metronic::printClasses('content-container', false) }}">
            @yield('content')
            @isset($slot)
            {{ $slot }}
            @endisset
        </div>
    </div>
@endif
