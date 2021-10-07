<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
    <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" /><rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" /><rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" /><rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" /></g></svg></span>
</button>
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
    <div class="menu-item px-3">
        <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Dodaj</div>
    </div>
    <div class="separator mb-3 opacity-75"></div>
    <div class="menu-item px-3">
        <a href="{{ route('global_settings.address.add', 'street') }}" class="menu-link px-3">+ Street</a>
    </div>
    <div class="menu-item px-3">
        <a href="{{ route('global_settings.address.add', 'osada') }}" class="menu-link px-3">+ Osada</a>
    </div>
    <div class="menu-item px-3">
        <a href="{{ route('global_settings.address.add', 'woj') }}" class="menu-link px-3">+ Wojewodzstwo</a>
    </div>
</div>
