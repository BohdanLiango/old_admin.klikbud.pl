<?php

namespace App\Http\Controllers\Settings\Klikbud\Home;

use App\Data\ActionsData;
use App\Data\BreadcrumbsData;
use App\Http\Controllers\AdminController;
use App\Models\KLIKBUD\Gallery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class GalleryController extends AdminController
{
    private BreadcrumbsData $breadcrumbs;
    private ActionsData $actionData;

    /**
     * GalleryController constructor.
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
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_gallery(2, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $actions = $this->actionData->settings_klikbud_gallery(1);
        return view('pages.settings.klikbud.gallery.content', compact('page_title', 'actions'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_gallery(2, [[
            'key' => 2, 'link' => route('settings.klikbud.gallery.create'), 'name' => 'Dodaj nowy obraz'
        ]]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.gallery.add', compact('breadcrumbs', 'page_title'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_gallery(2, [[
            'key' => 2, 'link' => route('settings.klikbud.gallery.edit', $id), 'name' => 'Edytuj obraz'
        ]]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.gallery.edit', compact('breadcrumbs', 'page_title', 'id'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id): Factory|View|Application
    {
        $title = Gallery::select('title')->findOrFail($id);
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_gallery(2, [[
            'key' => 2, 'link' => route('settings.klikbud.gallery.show', $id), 'name' => $title->title['pl']
        ]]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.gallery.show', compact('breadcrumbs', 'page_title', 'id'));
    }


}
