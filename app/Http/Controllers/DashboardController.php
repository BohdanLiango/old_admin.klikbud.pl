<?php

namespace App\Http\Controllers;

use App\Data\BreadcrumbsData;
use App\Services\Files\FilesDataService;
use Illuminate\Http\Request;

class DashboardController extends AdminController
{
    public $breadcrumbs;
    public $files;

    public function __construct(BreadcrumbsData $breadcrumbsData, FilesDataService $filesDataService)
    {
        parent::__construct();
        $this->breadcrumbs = $breadcrumbsData;
        $this->files = $filesDataService;
    }


    public function show()
    {
        $breadcrumbs = $this->breadcrumbs->dashboard(0, NULL);
        $page_title = $breadcrumbs[0]['name'];

        return view('pages.dashboard.dashboard', compact('breadcrumbs', 'page_title'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $test = $this->files->klikBudMainSlider($request->file, 1);
        dd($test);
    }
}
