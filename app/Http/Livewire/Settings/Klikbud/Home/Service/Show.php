<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Service;

use App\Models\Files\FileAdditionalInformation;
use App\Models\Files\Files;
use App\Models\KLIKBUD\Service;
use Livewire\Component;

class Show extends Component
{
    public $service;
    public $selectedItem;
    public $actions;
    public $status_to_main_page;

    public function render()
    {
        sleep(0.5);

        return view('livewire.settings.klikbud.home.service.show');
    }

    public function mount($id)
    {
        $this->service = Service::findOrFail($id);
        $this->selectedItem = '';
        $this->actions = '';
        $this->status_to_main_page = $this->service->status_to_main_page_id;
    }

    public function changeStatusInMainPage($status_id)
    {
        $update = Service::findOrFail($this->service->id);
        $update->status_to_main_page_id = $status_id;
        $update->save();

        $this->status_to_main_page = $status_id;

        session()->flash('message', 'Status na głownej stronie zmieniony!');
        session()->flash('alert-type', 'warning');
    }

    public function delete()
    {
        Files::findOrFail($this->service->image_id)->delete();
        FileAdditionalInformation::where('file_id', '=', $this->service->image_id)->delete();
        Service::findOrFail($this->service->id)->delete();

        session()->flash('message', 'Suwak usunięty!');
        session()->flash('alert-type', 'success');
        return redirect()->route('settings.klikbud.home.service.index');
    }

}
