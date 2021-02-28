<?php

namespace App\Http\Controllers\Settings\Klikbud;

use App\Data\BreadcrumbsData;
use App\Http\Controllers\AdminController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class NewsletterController extends AdminController
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
     * Show
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_newsletter(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        return view('pages.settings.klikbud.newsletter.content', compact('breadcrumbs', 'page_title'));
    }
}
