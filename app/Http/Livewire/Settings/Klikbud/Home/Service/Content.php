<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Service;

use App\Models\KLIKBUD\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Content extends Component
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

        return view('livewire.settings.klikbud.home.service.content', compact('services', 'count'));
    }

    /**
     * @param $slider_id
     * @param $status_id
     */
    public function changeStatusInMainPage($slider_id, $status_id)
    {
        $update = Service::findOrFail($slider_id);
        $update->status_to_main_page_id = $status_id;
        $update->save();

        session()->flash('message', 'Status na głownej stronie zmieniony!');
        session()->flash('alert-type', 'warning');
    }
}
