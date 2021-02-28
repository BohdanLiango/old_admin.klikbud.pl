<?php

namespace App\Http\Controllers\Settings\Klikbud\Contact;

use App\Data\BreadcrumbsData;
use App\Http\Controllers\AdminController;
use App\Models\KLIKBUD\Contact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ContactController extends AdminController
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
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_contact(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        return view('pages.settings.klikbud.contact.content', compact('breadcrumbs', 'page_title'));
    }

    /**
     * Show One
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id): Factory|View|Application
    {
        $title = Contact::select('email')->findOrFail($id);
        $breadcrumbs = $this->breadcrumbs->settings_klikbud_contact(2,
            [['key' => 2, 'link' => route('settings.klikbud.contact.show'), 'name' => $title->email]]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.contact.show', compact('breadcrumbs', 'page_title', 'id'));
    }
}
