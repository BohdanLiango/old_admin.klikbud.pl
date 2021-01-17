<?php

namespace App\Http\Controllers\Settings\Klikbud\Home;

use App\Data\ActionsData;
use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Http\Controllers\AdminController;
use App\Services\Settings\Klikbud\Home\MainSliderService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MainSliderController extends AdminController
{
    private MainSliderService $mainSlider;
    private BreadcrumbsData $breadcrumbs;
    private DefaultData $defaultData;
    private ActionsData $actionData;

    /**
     * MainSliderController constructor.
     * @param MainSliderService $mainSliderService
     * @param BreadcrumbsData $breadcrumbsData
     * @param DefaultData $defaultData
     * @param ActionsData $actionData
     */
    public function __construct(MainSliderService $mainSliderService, BreadcrumbsData $breadcrumbsData, DefaultData $defaultData, ActionsData $actionData)
    {
        parent::__construct();
        $this->mainSlider = $mainSliderService;
        $this->breadcrumbs = $breadcrumbsData;
        $this->defaultData = $defaultData;
        $this->actionData = $actionData;
    }

    /**
     * Show
     *
     * @return Application|Factory|View
     */
    public function show()
    {
        $sliders = $this->mainSlider->showSlidersOrderByIdPaginate(12);
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_mainslider(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $actions = $this->actionData->settings_klikbud_home_slider(1);
        return view('pages.settings.klikbud.home.mainslider.content', compact('sliders', 'breadcrumbs', 'page_title', 'actions'));
    }

    /**
     * Add Form
     *
     * @return Application|Factory|View
     */
    public function add()
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_mainslider(2,  [['key' => 2, 'link' => route('settings.klikbud.home.slider.add'), 'name' => 'Dodaj nowy suwak']]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.home.mainslider.add', compact('breadcrumbs', 'page_title'));
    }
}
