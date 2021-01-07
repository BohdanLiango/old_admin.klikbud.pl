@php
	$direction = config('layout.extras.user.offcanvas.direction', 'right');
@endphp
 {{-- User Panel --}}
<div id="kt_quick_user" class="offcanvas offcanvas-{{ $direction }} p-10">
	{{-- Header --}}
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-bold m-0">
			User Profile
			<small class="text-muted font-size-sm ml-2">{{-- 12 messages --}}</small>
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>

	{{-- Content --}}
    <div class="offcanvas-content pr-5 mr-n5">
		{{-- Header --}}
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" style="background-image:url('{{ asset('media/users/300_21.jpg') }}')"></div>
				<i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                    {{ Auth::user()->name }} {{ Auth::user()->surname }}
				</a>
                <div class="text-muted mt-1">
                    Application Developer
                </div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
								{{ Metronic::getSVG("media/svg/icons/Communication/Mail-notification.svg", "svg-icon-lg svg-icon-primary") }}
							</span>
                            <span class="navi-text text-muted text-hover-primary">{{ Auth::user()->email }}</span>
                        </span>
                    </a>
                    <a href="{{ route('logout') }}" class="navi-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <span class="navi-link p-0 pb-2">
                           <span class="svg-icon svg-icon-primary svg-icon-2x mr-1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-28-020759/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Sign-out.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) "/>
        <rect fill="#000000" opacity="0.3" transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) " x="13" y="6" width="2" height="12" rx="1"/>
        <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) "/>
    </g>
</svg><!--end::Svg Icon--></span>
                            <span class="navi-text text-muted text-hover-primary"> Logout</span>
                        </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

		{{-- Separator --}}
		<div class="separator separator-dashed mt-8 mb-5"></div>

{{--		--}}{{-- Nav --}}
{{--		<div class="navi navi-spacer-x-0 p-0">--}}
{{--		    --}}{{-- Item --}}
{{--		    <a href="#" class="navi-item">--}}
{{--		        <div class="navi-link">--}}
{{--		            <div class="symbol symbol-40 bg-light mr-3">--}}
{{--		                <div class="symbol-label">--}}
{{--							{{ Metronic::getSVG("media/svg/icons/General/Notification2.svg", "svg-icon-md svg-icon-success") }}--}}
{{--						</div>--}}
{{--		            </div>--}}
{{--		            <div class="navi-text">--}}
{{--		                <div class="font-weight-bold">--}}
{{--		                    My Profile--}}
{{--		                </div>--}}
{{--		                <div class="text-muted">--}}
{{--		                    Account settings and more--}}
{{--		                    <span class="label label-light-danger label-inline font-weight-bold">update</span>--}}
{{--		                </div>--}}
{{--		            </div>--}}
{{--		        </div>--}}
{{--		    </a>--}}

{{--		    --}}{{-- Item --}}
{{--		    <a href="#"  class="navi-item">--}}
{{--		        <div class="navi-link">--}}
{{--					<div class="symbol symbol-40 bg-light mr-3">--}}
{{--						<div class="symbol-label">--}}
{{-- 						   {{ Metronic::getSVG("media/svg/icons/Shopping/Chart-bar1.svg", "svg-icon-md svg-icon-warning") }}--}}
{{-- 					   </div>--}}
{{--				   	</div>--}}
{{--		            <div class="navi-text">--}}
{{--		                <div class="font-weight-bold">--}}
{{--		                    My Messages--}}
{{--		                </div>--}}
{{--		                <div class="text-muted">--}}
{{--		                    Inbox and tasks--}}
{{--		                </div>--}}
{{--		            </div>--}}
{{--		        </div>--}}
{{--		    </a>--}}

{{--		    --}}{{-- Item --}}
{{--		    <a href="#"  class="navi-item">--}}
{{--		        <div class="navi-link">--}}
{{--					<div class="symbol symbol-40 bg-light mr-3">--}}
{{--						<div class="symbol-label">--}}
{{--							{{ Metronic::getSVG("media/svg/icons/Files/Selected-file.svg", "svg-icon-md svg-icon-danger") }}--}}
{{--						</div>--}}
{{--				   	</div>--}}
{{--		            <div class="navi-text">--}}
{{--		                <div class="font-weight-bold">--}}
{{--		                    My Activities--}}
{{--		                </div>--}}
{{--		                <div class="text-muted">--}}
{{--		                    Logs and notifications--}}
{{--		                </div>--}}
{{--		            </div>--}}
{{--		        </div>--}}
{{--		    </a>--}}

{{--		    --}}{{-- Item --}}
{{--		    <a href="#" class="navi-item">--}}
{{--		        <div class="navi-link">--}}
{{--					<div class="symbol symbol-40 bg-light mr-3">--}}
{{--						<div class="symbol-label">--}}
{{--							{{ Metronic::getSVG("media/svg/icons/Communication/Mail-opened.svg", "svg-icon-md svg-icon-primary") }}--}}
{{--						</div>--}}
{{--				   	</div>--}}
{{--		            <div class="navi-text">--}}
{{--		                <div class="font-weight-bold">--}}
{{--		                    My Tasks--}}
{{--		                </div>--}}
{{--		                <div class="text-muted">--}}
{{--		                    latest tasks and projects--}}
{{--		                </div>--}}
{{--		            </div>--}}
{{--		        </div>--}}
{{--		    </a>--}}
{{--		</div>--}}

{{--		--}}{{-- Separator --}}
{{--		<div class="separator separator-dashed my-7"></div>--}}

{{--		--}}{{-- Notifications --}}
{{--		<div>--}}
{{--			--}}{{-- Heading --}}
{{--        	<h5 class="mb-5">--}}
{{--            	Recent Notifications--}}
{{--        	</h5>--}}

{{--			--}}{{-- Item --}}
{{--	        <div class="d-flex align-items-center bg-light-warning rounded p-5 gutter-b">--}}
{{--	            <span class="svg-icon svg-icon-warning mr-5">--}}
{{--	                {{ Metronic::getSVG("media/svg/icons/Home/Library.svg", "svg-icon-lg") }}--}}
{{--	            </span>--}}

{{--	            <div class="d-flex flex-column flex-grow-1 mr-2">--}}
{{--	                <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Another purpose persuade</a>--}}
{{--	                <span class="text-muted font-size-sm">Due in 2 Days</span>--}}
{{--	            </div>--}}

{{--	            <span class="font-weight-bolder text-warning py-1 font-size-lg">+28%</span>--}}
{{--	        </div>--}}

{{--	        --}}{{-- Item --}}
{{--	        <div class="d-flex align-items-center bg-light-success rounded p-5 gutter-b">--}}
{{--	            <span class="svg-icon svg-icon-success mr-5">--}}
{{--	                {{ Metronic::getSVG("media/svg/icons/Communication/Write.svg", "svg-icon-lg") }}--}}
{{--	            </span>--}}
{{--	            <div class="d-flex flex-column flex-grow-1 mr-2">--}}
{{--	                <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Would be to people</a>--}}
{{--	                <span class="text-muted font-size-sm">Due in 2 Days</span>--}}
{{--	            </div>--}}

{{--	            <span class="font-weight-bolder text-success py-1 font-size-lg">+50%</span>--}}
{{--	        </div>--}}

{{--	        --}}{{-- Item --}}
{{--	        <div class="d-flex align-items-center bg-light-danger rounded p-5 gutter-b">--}}
{{--	            <span class="svg-icon svg-icon-danger mr-5">--}}
{{--	                {{ Metronic::getSVG("media/svg/icons/Communication/Group-chat.svg", "svg-icon-lg") }}--}}
{{--	            </span>--}}
{{--	            <div class="d-flex flex-column flex-grow-1 mr-2">--}}
{{--	                <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">Purpose would be to persuade</a>--}}
{{--	                <span class="text-muted font-size-sm">Due in 2 Days</span>--}}
{{--	            </div>--}}

{{--	            <span class="font-weight-bolder text-danger py-1 font-size-lg">-27%</span>--}}
{{--	        </div>--}}

{{--	        --}}{{-- Item --}}
{{--	        <div class="d-flex align-items-center bg-light-info rounded p-5">--}}
{{--	            <span class="svg-icon svg-icon-info mr-5">--}}
{{--	                {{ Metronic::getSVG("media/svg/icons/General/Attachment2.svg", "svg-icon-lg") }}--}}
{{--	            </span>--}}

{{--	            <div class="d-flex flex-column flex-grow-1 mr-2">--}}
{{--	                <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">The best product</a>--}}
{{--	                <span class="text-muted font-size-sm">Due in 2 Days</span>--}}
{{--	            </div>--}}

{{--	            <span class="font-weight-bolder text-info py-1 font-size-lg">+8%</span>--}}
{{--	        </div>--}}
{{--		</div>--}}
    </div>
</div>
