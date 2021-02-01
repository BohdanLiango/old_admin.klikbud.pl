<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Service;

use App\Models\KLIKBUD\Service;
use App\Services\Settings\Klikbud\Home\ServicesService;

class Show extends ServiceLivewire
{
    public $service;
    public $status_to_main_page;

    public function render()
    {
        sleep(0.4);

        return view('livewire.settings.klikbud.home.service.show');
    }

    public function mount($id)
    {
        $this->service = Service::findOrFail($id);
        $this->status_to_main_page = $this->service->status_to_main_page_id;
    }

    public function changeStatusToMainPage($status_id)
    {
        $this->status_to_main_page = $status_id;
        $this->checkStatus(
            app()->make(ServicesService::class)->changeStatusToMainPage($this->service->id, $status_id),
            trans('admin_klikbud/settings/klikbud/service.sessions.changeStatusSuccess'),
            'alert', true, 'top-end'
        );
    }

    public function delete()
    {
        $this->checkStatus(
            app()->make(ServicesService::class)->delete($this->service->id),
            trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.delete'),
            'flash', false,'center'
        );
        return redirect()->route('settings.klikbud.home.service.index');
    }

}
