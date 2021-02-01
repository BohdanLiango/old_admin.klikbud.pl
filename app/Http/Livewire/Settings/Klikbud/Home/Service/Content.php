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

        $count_get = Service::select('status_to_main_page_id')->get();
        $count_active_status = $count_get->where('status_to_main_page_id', '=', config('klikbud.klikbud.status_to_main_page.visible'))->count();
        $count_hidden_status = $count_get->where('status_to_main_page_id', '=', config('klikbud.klikbud.status_to_main_page.not_visible'))->count();
        $count = $count_get->count(); //All Active
        $count_deleted = Service::withTrashed()->count();

        $all_services = $count_deleted + $count;
        $percent_all_active = round($count / $all_services * 100, 2);
        $percent_all_deleted = round($count_deleted / $all_services * 100, 2);

        if($count === 0)
        {
            $percent_to_active_all = 0;
            $percent_to_hidden_all = 0;
        }else{
            $percent_to_active_all = round($count_active_status / $count * 100,2);
            $percent_to_hidden_all = round($count_hidden_status / $count * 100,2);
        }


        $status_to_main_page = app()->make(DefaultData::class)->klikbud_status_to_main_page();

        return view('livewire.settings.klikbud.home.service.content', compact('services', 'count', 'status_to_main_page', 'count_active_status', 'count_hidden_status', 'count_deleted', 'all_services',
            'percent_to_active_all', 'percent_to_hidden_all', 'percent_all_active', 'percent_all_deleted'));
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
