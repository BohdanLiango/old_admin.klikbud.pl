<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\MainSlider;

use App\Data\DefaultData;
use App\Models\KLIKBUD\MainSlider;
use App\Services\Settings\Klikbud\Home\MainSliderService;

class ShowOne extends MainSliderLivewire
{
    public $slider;
    public $slider_id;
    public $status_to_main_page_slider;
    public $status_to_main_page;

    public function render()
    {
        return view('livewire.settings.klikbud.home.main-slider.show-one');
    }

    public function mount($id)
    {
        $slider = MainSLider::findOrFail($id);
        $this->slider = $slider;
        $this->status_to_main_page_slider = $slider->status_to_main_page_id;
        $this->slider_id = $id;
        $this->status_to_main_page = app()->make(DefaultData::class)->klikbud_status_to_main_page();
    }

    public function changeStatusToMainPage($status_id)
    {
        $this->status_to_main_page_slider = $status_id;
        $this->checkStatus(
            app()->make(MainSliderService::class)->changeStatusToMainPage($this->slider_id, $status_id),
            trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.changeStatusSuccess'),
            'alert', true,'top-end'
        );
    }

    public function delete()
    {
        $this->checkStatus(
            app()->make(MainSliderService::class)->delete($this->slider_id),
            trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.delete'),
            'flash', false, 'center'
        );

        return redirect()->route('settings.klikbud.home.slider.index');
    }

}
