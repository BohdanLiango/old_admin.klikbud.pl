<?php

namespace App\Http\Controllers\Settings\Klikbud\Home;

use App\Data\BreadcrumbsData;
use App\Http\Controllers\AdminController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CountController extends AdminController
{
    private BreadcrumbsData $breadcrumbs;

    /**
     * MainSliderController constructor.
     * @param BreadcrumbsData $breadcrumbsData
     */
    public function __construct(BreadcrumbsData $breadcrumbsData)
    {
        parent::__construct();
        $this->breadcrumbs = $breadcrumbsData;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_count(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        return view('pages.settings.klikbud.home.counter.index', compact('breadcrumbs', 'page_title'));
    }
}
