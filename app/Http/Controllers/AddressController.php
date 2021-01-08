<?php

namespace App\Http\Controllers;

use App\Data\BreadcrumbsData;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AddressController extends AdminController
{
    private $address;
    private $breadcrumbs;

    /**
     * AddressController constructor.
     * @param BreadcrumbsData $breadcrumbsData
     */
    public function __construct(BreadcrumbsData $breadcrumbsData)
    {
        parent::__construct();
        $this->breadcrumbs = $breadcrumbsData;

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

        return view('pages.address.index', compact('breadcrumbs', 'page_title'));
    }
}
