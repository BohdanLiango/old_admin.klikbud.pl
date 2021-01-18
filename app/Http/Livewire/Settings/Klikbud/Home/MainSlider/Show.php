<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\MainSlider;

use App\Models\KLIKBUD\MainSlider;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
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
        sleep(1);

        $sliders = MainSlider::when($this->searchQuery != '', function ($query) {
            $query->where('textYellow', 'like', '%'.$this->searchQuery.'%')->orWhere('textBlack', 'like',  '%'.$this->searchQuery.'%');
        })
            ->when($this->searchStatus != '', function ($query) {
                $query->where('status_to_main_page_id', $this->searchStatus);
            })
            ->orderBy('ID','desc')->paginate(12);

        return view('livewire.settings.klikbud.home.main-slider.show',
            compact('sliders'));
    }

    /**
     * @param $slider_id
     * @param $status_id
     */
    public function changeStatusInMainPage($slider_id, $status_id)
    {
        $update = MainSlider::find($slider_id);
        $update->status_to_main_page_id = $status_id;
        $update->save();
    }
}
