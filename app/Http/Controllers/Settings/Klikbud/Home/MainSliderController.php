<?php

namespace App\Http\Controllers\Settings\Klikbud\Home;

use App\Data\ActionsData;
use App\Data\BreadcrumbsData;
use App\Http\Controllers\AdminController;
use App\Models\KLIKBUD\MainSlider;
use App\Services\Settings\Klikbud\Home\MainSliderService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MainSliderController extends AdminController
{
    private MainSliderService $mainSlider;
    private BreadcrumbsData $breadcrumbs;
    private ActionsData $actionData;

    /**
     * MainSliderController constructor.
     * @param MainSliderService $mainSliderService
     * @param BreadcrumbsData $breadcrumbsData
     * @param ActionsData $actionData
     */
    public function __construct(MainSliderService $mainSliderService, BreadcrumbsData $breadcrumbsData, ActionsData $actionData)
    {
        parent::__construct();
        $this->mainSlider = $mainSliderService;
        $this->breadcrumbs = $breadcrumbsData;
        $this->actionData = $actionData;
    }

    /**
     * Show
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_mainslider(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $actions = $this->actionData->settings_klikbud_home_slider(1);
        return view('pages.settings.klikbud.home.mainslider.content', compact( 'breadcrumbs', 'page_title', 'actions'));
    }

    /**
     * Add Form
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_mainslider(2,
            [['key' => 2, 'link' => route('settings.klikbud.home.slider.create'), 'name' => 'Dodaj nowy suwak']]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.home.mainslider.add', compact('breadcrumbs', 'page_title'));
    }

    /**
     * @param MainSlider $slider
     * @return Factory|View|Application
     */
    public function edit(MainSlider $slider): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_mainslider(2,
            [['key' => 2, 'link' => route('settings.klikbud.home.slider.edit'), 'name' => 'Edytuj suwak']]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.home.mainslider.edit', compact('breadcrumbs', 'page_title', 'mainSlider'));
    }
}
