<?php

namespace App\Http\Controllers\Settings\Klikbud\Home;

use App\Data\ActionsData;
use App\Data\BreadcrumbsData;
use App\Http\Controllers\AdminController;
use App\Models\KLIKBUD\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ServiceController extends AdminController
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
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_service(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $actions = $this->actionData->settings_klikbud_home_service(1);
        return view('pages.settings.klikbud.home.service.content', compact( 'breadcrumbs', 'page_title', 'actions'));
    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_service(2,
            [['key' => 2, 'link' => route('settings.klikbud.home.service.create'), 'name' => 'Dodaj nową usługe']]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.home.service.add', compact('breadcrumbs', 'page_title'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_service(2,
            [['key' => 2, 'link' => route('settings.klikbud.home.service.edit', $id), 'name' => 'Edytuj usługe']]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.home.service.edit', compact('breadcrumbs', 'page_title', 'id'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $name = Service::findOrFail($id)->title['pl'];
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_service(2,
            [['key' => 2, 'link' => route('settings.klikbud.home.service.show', $id), 'name' => $name]]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.home.service.show', compact('breadcrumbs', 'page_title', 'id'));
    }
}
