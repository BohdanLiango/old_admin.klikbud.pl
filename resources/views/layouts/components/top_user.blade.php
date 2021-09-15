<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
        <img src="{{ Auth::user()->profile_photo_url }}" alt="metronic" />
    </div>
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <div class="symbol symbol-50px me-5">
                    <img alt="Logo" src="{{ Auth::user()->profile_photo_url }}" />
                </div>
                <div class="d-flex flex-column">
                    <div class="fw-bolder d-flex align-items-center fs-5"> {{ Auth::user()->name }}  {{ Auth::user()->surname }}
                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span></div>
                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7"> {{ Auth::user()->email }}</a>
                </div>
            </div>
        </div>
        <div class="separator my-2"></div>
        <div class="menu-item px-5">
            <a href="#" class="menu-link px-5">My Profile</a>
        </div>
        <div class="menu-item px-5">
            <a href="#" class="menu-link px-5">
                <span class="menu-text">My Projects</span>
                <span class="menu-badge">
                    <span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
                </span>
            </a>
        </div>
        <div class="separator my-2"></div>
        <div class="menu-item px-5 my-1">
            <a href="#" class="menu-link px-5">Account Settings</a>
        </div>
        <div class="menu-item px-5">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <a href="{{ route('logout') }}" class="menu-link px-5" onclick="event.preventDefault();
                                                this.closest('form').submit();">Sign Out</a>
            </form>
        </div>
        <div class="separator my-2"></div>
    </div>
</div>