<?php

namespace App\Http\Controllers;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AddressController extends AdminController
{
    private $address;
    private $breadcrumbs;
    private $defaultData;

    /**
     * AddressController constructor.
     * @param BreadcrumbsData $breadcrumbsData
     * @param DefaultData $defaultData
     */
    public function __construct(BreadcrumbsData $breadcrumbsData, DefaultData $defaultData)
    {
        parent::__construct();
        $this->breadcrumbs = $breadcrumbsData;
        $this->defaultData = $defaultData;

    }

    /**
     * Show all address
     *
     * @return Application|Factory|View
     */
    public function show()
    {
        $breadcrumbs = $this->breadcrumbs->address(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $types = $this->defaultData->address();

        return view('pages.address.index', compact('breadcrumbs', 'page_title', 'types'));
    }
}
