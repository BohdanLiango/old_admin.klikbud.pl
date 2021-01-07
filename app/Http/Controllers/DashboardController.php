<?php

namespace App\Http\Controllers;

use App\Data\BreadcrumbsData;

class DashboardController extends AdminController
{
    public $breadcrumbs;

    public function __construct(BreadcrumbsData $breadcrumbsData)
    {
        parent::__construct();
        $this->breadcrumbs = $breadcrumbsData;
    }


    public function show()
    {
        $breadcrumbs = $this->breadcrumbs->dashboard(0, NULL);
        $page_title = $breadcrumbs[0]['name'];

        return view('pages.dashboard.dashboard', compact('breadcrumbs', 'page_title'));
    }
}
