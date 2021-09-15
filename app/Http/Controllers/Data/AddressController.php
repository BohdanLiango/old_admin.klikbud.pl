<?php

namespace App\Http\Controllers\Data;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Http\Controllers\Controller;
use App\Repositories\Data\AddressRepository;
use App\Services\Data\AddressService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AddressController extends Controller
{
    /**
     * @param BreadcrumbsData $breadcrumbsData
     * @param DefaultData $defaultData
     * @return Factory|View|Application
     */
    public function index(AddressService $addressService, BreadcrumbsData $breadcrumbsData, DefaultData $defaultData): Factory|View|Application
    {
        $breadcrumbs = $breadcrumbsData->address(1, NULL);
        $page_title = $breadcrumbs[1]['title'];
        $types = $defaultData->address();
        $filter_button = true;
        $filter_button_view = 'app.data.address.filter-button';
        $add_button = false;
        $countAddress = $addressService->countAddress();

        return view('app.data.address.index', compact('breadcrumbs', 'page_title', 'types',
            'filter_button', 'add_button', 'filter_button_view', 'countAddress'));
    }
}
