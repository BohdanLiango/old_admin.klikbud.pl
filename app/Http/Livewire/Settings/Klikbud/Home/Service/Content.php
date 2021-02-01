<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Service;

use App\Data\DefaultData;
use App\Models\KLIKBUD\Service;
use App\Services\Settings\Klikbud\Home\ServicesService;
use Livewire\WithPagination;

class Content extends ServiceLivewire
{
    use WithPagination;

    public $searchQuery;
    public $searchStatus;

    public function mount()
    {
        $this->searchQuery = '';
        $this->searchStatus = '';
    }

    public function render()
    {
        $services = Service::when($this->searchQuery != '', function ($query) {
            $query->where('title', 'like', '%' . $this->searchQuery . '%');
        })->when($this->searchStatus != '', function ($query) {
            $query->where('status_to_main_page_id', $this->searchStatus);
        })->orderBy('ID', 'desc')->paginate(12);

        $count = Service::count();

        $status_to_main_page = app()->make(DefaultData::class)->klikbud_status_to_main_page();

        return view('livewire.settings.klikbud.home.service.content', compact('services', 'count', 'status_to_main_page'));
    }


    public function changeStatusToMainPage($slider_id, $status_id)
    {
        $this->checkStatus(
            app()->make(ServicesService::class)->changeStatusToMainPage($slider_id, $status_id),
            trans('admin_klikbud/settings/klikbud/service.sessions.changeStatusSuccess'),
            'alert', true, 'top-end'
        );
    }
}
