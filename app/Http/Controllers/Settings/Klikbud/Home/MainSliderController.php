<?php

namespace App\Http\Controllers\Settings\Klikbud\Home;

use App\Data\ActionsData;
use App\Data\BreadcrumbsData;
use App\Http\Controllers\AdminController;
use App\Models\KLIKBUD\MainSlider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MainSliderController extends AdminController
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
     * @param $id
     * @return Factory|View|Application
     */
    public function edit($id): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_mainslider(2,
            [['key' => 2, 'link' => route('settings.klikbud.home.slider.edit', $id), 'name' => 'Edytuj suwak']]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.home.mainslider.edit', compact('breadcrumbs', 'page_title', 'id'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id): Factory|View|Application
    {
        $title = MainSlider::select('textYellow', 'textBlack')->findOrFail($id);
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_home_mainslider(2,
            [['key' => 2, 'link' => route('settings.klikbud.home.slider.show', $id), 'name' => $title->textYellow['pl'] . '' . $title->textBlack['pl']]]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.home.mainslider.show-one', compact('breadcrumbs', 'page_title', 'id'));
    }
}
