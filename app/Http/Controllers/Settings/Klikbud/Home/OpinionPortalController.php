<?php

namespace App\Http\Controllers\Settings\Klikbud\Home;

use App\Data\BreadcrumbsData;
use App\Http\Controllers\AdminController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class OpinionPortalController extends AdminController
{
    private BreadcrumbsData $breadcrumbs;

    /**
     * OpinionPortalController constructor.
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
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_opinion(3, [['key' => 3, 'link' => route('settings.klikbud.home.opinion.portal.index'),
            'name' => 'Portaly']]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.home.opinion.portal.content', compact('breadcrumbs', 'page_title'));
    }
}
