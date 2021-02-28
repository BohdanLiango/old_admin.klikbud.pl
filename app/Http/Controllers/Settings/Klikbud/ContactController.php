<?php

namespace App\Http\Controllers\Settings\Klikbud;

use App\Data\BreadcrumbsData;
use App\Http\Controllers\AdminController;
use App\Models\KLIKBUD\Contact;
use App\Services\Settings\Klikbud\Contact\ContactService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ContactController extends AdminController
{
    private BreadcrumbsData $breadcrumbs;
    private ContactService $contactService;

    /**
     * MainSliderController constructor.
     * @param BreadcrumbsData $breadcrumbsData
     * @param ContactService $contactService
     */
    public function __construct(BreadcrumbsData $breadcrumbsData, ContactService $contactService)
    {
        parent::__construct();
        $this->breadcrumbs = $breadcrumbsData;
        $this->contactService = $contactService;
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
        $title = Contact::select('email', 'status_id')->findOrFail($id);

        if((int)$title->status_id === (int)config('klikbud.klikbud.status_contact.new'))
        {
            $this->contactService->changeStatusToRead($id);
        }

        $breadcrumbs = $this->breadcrumbs->settings_klikbud_contact(2,
            [['key' => 2, 'link' => route('settings.klikbud.contact.show', $id), 'name' => $title->email]]);
        $page_title = $breadcrumbs[2]['name'];
        return view('pages.settings.klikbud.contact.show', compact('breadcrumbs', 'page_title', 'id'));
    }
}
