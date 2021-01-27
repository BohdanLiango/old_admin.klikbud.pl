<?php

namespace App\Http\Controllers\Settings\Klikbud\Home;

use App\Data\BreadcrumbsData;
use App\Http\Controllers\AdminController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class OpinionController extends AdminController
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
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_opinion(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        return view('pages.settings.klikbud.home.opinion.content', compact( 'breadcrumbs', 'page_title'));
    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_opinion(2,
            [['key' => 2, 'link' => route('settings.klikbud.home.opinion.create'), 'name' => 'Dodaj nową opinie']]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.home.opinion.create', compact('breadcrumbs', 'page_title'));
    }

    /**
     * @param $id
     * @return Factory|View|Application
     */
    public function edit($id): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_opinion(2,
            [['key' => 2, 'link' => route('settings.klikbud.home.opinion.edit'), 'name' => 'Edytuj opinie']]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.home.opinion.edit', compact('breadcrumbs', 'page_title', 'id'));
    }

}
