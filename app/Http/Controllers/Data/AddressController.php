<?php

namespace App\Http\Controllers\Data;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Http\Controllers\Controller;
use App\Services\Data\AddressService;

class AddressController extends Controller
{
    public AddressService $addressService;
    public BreadcrumbsData $breadcrumbsData;
    public DefaultData $defaultData;

    public function index()
    {
        $breadcrumb = $this->breadcrumbsData->address(1, NULL);
        $page_title = $breadcrumb[1]['title'];
        $dataType = $this->defaultData->address();

    }
}
