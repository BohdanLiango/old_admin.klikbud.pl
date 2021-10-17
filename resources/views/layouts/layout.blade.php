<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{--<!--begin::Head-->--}}
<head><base href="">
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>
    <meta name="description" content="@yield('page_description', $page_description ?? '')" />
    <meta name="keywords" content="@yield('page_keywords', $page_keywords ?? '')" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
{{--    <!--begin::Fonts-->--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
{{--    <!--end::Fonts-->--}}
{{--    <!--begin::Page Vendor Stylesheets(used by this page)-->--}}
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')
{{--    <!--end::Page Vendor Stylesheets-->--}}
{{--    <!--begin::Global Stylesheets Bundle(used by all pages)-->--}}
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
{{--    <!--end::Global Stylesheets Bundle-->--}}
    @livewireStyles
</head>
{{--<!--end::Head-->--}}
{{--<!--begin::Body-->--}}
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
{{--<!--begin::Main-->--}}
{{--<!--begin::Root-->--}}
<div class="d-flex flex-column flex-root">
{{--    <!--begin::Page-->--}}
    <div class="page d-flex flex-row flex-column-fluid">
{{--        <!--begin::Aside-->--}}
        <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
{{--            <!--begin::Brand-->--}}
            <div class="aside-logo flex-column-auto" id="kt_aside_logo">
{{--                <!--begin::Logo-->--}}
                <a href="{{ route('dashboard') }}">
                    <img alt="Logo" src="{{ asset('assets/media/logos/logo-1-dark.svg') }}" class="h-25px logo" />
                </a>
{{--                <!--end::Logo-->--}}
{{--                <!--begin::Aside toggler-->--}}
                <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
{{--                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->--}}
                    <span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
									<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
								</svg>
							</span>
{{--                    <!--end::Svg Icon-->--}}
                </div>
{{--                <!--end::Aside toggler-->--}}
            </div>
{{--            <!--end::Brand-->--}}
            @include('layouts.components.aside_menu')
        </div>
{{--        <!--end::Aside-->--}}
{{--        <!--begin::Wrapper-->--}}
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
{{--            <!--begin::Header-->--}}
            <div id="kt_header" style="" class="header align-items-stretch">
{{--                <!--begin::Container-->--}}
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
{{--                    <!--begin::Aside mobile toggle-->--}}
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
{{--                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->--}}
                            <span class="svg-icon svg-icon-2x mt-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
{{--                            <!--end::Svg Icon-->--}}
                        </div>
                    </div>
{{--                    <!--end::Aside mobile toggle-->--}}
{{--                    <!--begin::Mobile logo-->--}}
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="{{ route('dashboard') }}" class="d-lg-none">
                            <img alt="Logo" src="{{ asset('assets/media/logos/logo-2.svg') }}" class="h-30px" />
                        </a>
                    </div>
{{--                    <!--end::Mobile logo-->--}}
{{--                    <!--begin::Wrapper-->--}}
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                        @include('layouts.components.top_menu')
{{--                        <!--begin::Topbar-->--}}
                        <div class="d-flex align-items-stretch flex-shrink-0">
{{--                            <!--begin::Toolbar wrapper-->--}}
                            <div class="d-flex align-items-stretch flex-shrink-0">
{{--                                <!--begin::Search-->--}}
{{--                                @include('layouts.components.top_search')--}}
{{--                                <!--end::Search-->--}}
{{--                                <!--begin::Activities-->--}}
{{--                                @include('layouts.components.top_activities')--}}
{{--                                <!--end::Activities-->--}}
{{--                                <!--begin::Notifications-->--}}
{{--                                @include('layouts.components.top_notifications')--}}
{{--                                <!--end::Notifications-->--}}
{{--                                <!--begin::Chat-->--}}
{{--                                @include('layouts.components.top_chat')--}}
{{--                                <!--end::Chat-->--}}
{{--                                <!--begin::Quick links-->--}}
{{--                                @include('layouts.components.top_quick_links')--}}
{{--                                <!--end::Quick links-->--}}
{{--                                <!--begin::User-->--}}
                                @include('layouts.components.top_user')
{{--                                <!--end::User -->--}}
{{--                                <!--begin::Heaeder menu toggle-->--}}
                                <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                                    <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
{{--                                        <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->--}}
                                        <span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="black" />
														<path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="black" />
													</svg>
												</span>
{{--                                        <!--end::Svg Icon-->--}}
                                    </div>
                                </div>
{{--                                <!--end::Heaeder menu toggle-->--}}
                            </div>
{{--                            <!--end::Toolbar wrapper-->--}}
                        </div>
{{--                        <!--end::Topbar-->--}}
                    </div>
{{--                    <!--end::Wrapper-->--}}
                </div>
{{--                <!--end::Container-->--}}
            </div>
{{--            <!--end::Header-->--}}
{{--            <!--begin::Content-->--}}
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                    {{--<!--begin::Toolbar-->--}}
                       @include('layouts.components.top_breadcrumb')
                    {{--<!--end::Toolbar-->--}}

{{--                <!--begin::Post-->--}}
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        @yield('content')
                    </div>
{{--                    <!--end::Container-->--}}
                </div>
{{--                <!--end::Post-->--}}
            </div>
{{--            <!--end::Content-->--}}
{{--            <!--begin::Footer-->--}}
            @include('layouts.components.footer')
{{--            <!--end::Footer-->--}}
        </div>
{{--        <!--end::Wrapper-->--}}
    </div>
{{--    <!--end::Page-->--}}
</div>
{{--<!--end::Root-->--}}

{{--<!--begin::Drawers-->--}}
{{--<!--begin::Activities drawer-->--}}
{{--@include('layouts.components.drawers.activities_drawer')--}}
{{--<!--end::Activities drawer-->--}}
{{--<!--begin::Chat drawer-->--}}
{{--@include('layouts.components.drawers.chat_drawer')--}}
{{--<!--end::Chat drawer-->--}}
{{--@include('layouts.components.drawers.exolore_drawer')--}}
{{--<!--end::Drawers-->--}}

{{--<!--begin::Scrolltop-->--}}
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
{{--    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->--}}
    <span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
{{--    <!--end::Svg Icon-->--}}
</div>
{{--<!--end::Scrolltop-->--}}
{{--<!--end::Main-->--}}
{{--<!--begin::Javascript-->--}}
{{--<!--begin::Global Javascript Bundle(used by all pages)-->--}}
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
{{--<!--end::Global Javascript Bundle-->--}}
@yield('scripts')
{{--<!--end::Javascript-->--}}
@livewireScripts
@stack('scripts')
</body>
{{--<!--end::Body-->--}}
</html>
