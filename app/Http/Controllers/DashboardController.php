<?php

namespace App\Http\Controllers;

use App\Data\BreadcrumbsData;
use App\Services\Files\FilesDataService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends AdminController
{
    public BreadcrumbsData $breadcrumbs;
    public FilesDataService $files;

    public function __construct(BreadcrumbsData $breadcrumbsData, FilesDataService $filesDataService)
    {
        parent::__construct();
        $this->breadcrumbs = $breadcrumbsData;
        $this->files = $filesDataService;
    }


    /**
     * @return Factory|View|Application
     */
    public function show(): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->dashboard(0, NULL);
        $page_title = $breadcrumbs[0]['name'];

        return view('pages.dashboard.dashboard', compact('breadcrumbs', 'page_title'));
    }

}
