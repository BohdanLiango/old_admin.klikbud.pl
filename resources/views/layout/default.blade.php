{{--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
 --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
    <head>
        <meta charset="utf-8"/>

        {{-- Title Section --}}
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

        {{-- Meta Data --}}
        <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

        {{-- Fonts --}}
        {{ Metronic::getGoogleFontsInclude() }}
        @livewireStyles
        {{-- Global Theme Styles (used by all pages) --}}
        @foreach(config('layout.resources.css') as $style)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Layout Themes (used by all pages) --}}
        @foreach (Metronic::initThemes() as $theme)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Includable CSS --}}
        @yield('styles')
        @stack('styles_p')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>

    <body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

        @if (config('layout.page-loader.type') != '')
            @include('layout.partials._page-loader')
        @endif

        @include('layout.base._layout')
        @livewireScripts
        <script>var HOST_URL = "{{ route('quick-search') }}";</script>

        {{-- Global Config (global config for global JS scripts) --}}
        <script>
            var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
        </script>



        {{-- Global Theme JS Bundle (used by all pages)  --}}
        @foreach(config('layout.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach

        {{-- Includable JS --}}
        @yield('scripts')
        <x-livewire-alert::scripts />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        @stack('scripts_p')
        <script>
            @if(Route::currentRouteName() == app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName())
            let cords = ['scrollX','scrollY'];
            // Перед закрытием записываем в локалсторадж window.scrollX и window.scrollY как scrollX и scrollY
            window.addEventListener('unload', e => cords.forEach(cord => localStorage[cord] = window[cord]));
            // Прокручиваем страницу к scrollX и scrollY из localStorage (либо 0,0 если там еще ничего нет)
            window.scroll(...cords.map(cord => localStorage[cord]));
            @else
            localStorage.clear();
            let cords = ['scrollX','scrollY'];
            // Перед закрытием записываем в локалсторадж window.scrollX и window.scrollY как scrollX и scrollY
            window.addEventListener('unload', e => cords.forEach(cord => localStorage[cord] = window[cord]));
            // Прокручиваем страницу к scrollX и scrollY из localStorage (либо 0,0 если там еще ничего нет)
            window.scroll(...cords.map(cord => localStorage[cord]));
            @endif
        </script>
    </body>
</html>

