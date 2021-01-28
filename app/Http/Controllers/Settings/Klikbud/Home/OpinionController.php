<?php

namespace App\Http\Controllers\Settings\Klikbud\Home;

use App\Data\ActionsData;
use App\Data\BreadcrumbsData;
use App\Http\Controllers\AdminController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class OpinionController extends AdminController
{
    private BreadcrumbsData $breadcrumbs;
    private ActionsData $actionData;

    /**
     * MainSliderController constructor.
     * @param BreadcrumbsData $breadcrumbsData
     * @param ActionsData $actionData
     */
    public function __construct(BreadcrumbsData $breadcrumbsData, ActionsData $actionData)
    {
        parent::__construct();
        $this->breadcrumbs = $breadcrumbsData;
        $this->actionData = $actionData;
    }

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_opinion(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $actions = $this->actionData->settings_klikbud_home_opinion(1);
        return view('pages.settings.klikbud.home.opinion.content', compact( 'breadcrumbs', 'page_title', 'actions'));
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
            [['key' => 2, 'link' => route('settings.klikbud.home.opinion.edit', $id), 'name' => 'Edytuj opinie']]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.home.opinion.edit', compact('breadcrumbs', 'page_title', 'id'));
    }

}
