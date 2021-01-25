<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Service;

use App\Models\KLIKBUD\Service;
use Livewire\Component;

class Show extends Component
{
    public $service;
    public $selectedItem;
    public $actions;

    public function render()
    {
        return view('livewire.settings.klikbud.home.service.show');
    }

    public function mount($id)
    {
        $this->service = Service::findOrFail($id);
    }

    public function selectItem($itemId, $action)
    {
        $this->selectedItem = $itemId;

        if($action === 'delete')
        {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function cancel()
    {
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function delete()
    {
        Service::findOrFail($this->selectedItem)->delete();
        session()->flash('message', 'Suwak usunięty!');
        session()->flash('alert-type', 'success');
        return redirect()->route('settings.klikbud.home.service.index');
    }

}
