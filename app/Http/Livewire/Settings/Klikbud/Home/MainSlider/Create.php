<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\MainSlider;

use App\Services\Files\FilesDataService;
use App\Services\Settings\Klikbud\Home\MainSliderService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $photo;
    public $slider;


    /**
     * @var array|string[]
     */
    protected array $rules = [
        'photo' => 'image|max:256|required',

        'slider.yellow_text_pl' => 'required',
        'slider.black_text_pl' => 'required',
        'slider.number_show'=>'required',
        'slider.description_pl' => 'required',
        'slider.alt_pl' => 'required',

        'slider.yellow_text_en' => 'required',
        'slider.black_text_en' => 'required',
        'slider.description_en' => 'required',
        'slider.alt_en' => 'required',

        'slider.yellow_text_ua' => 'required',
        'slider.black_text_ua' => 'required',
        'slider.description_ua' => 'required',
        'slider.alt_ua' => 'required',

        'slider.yellow_text_ru' => 'required',
        'slider.black_text_ru' => 'required',
        'slider.description_ru' => 'required',
        'slider.alt_ru' => 'required',
    ];


    public function save()
    {
        $this->validate();


        $store_id = app()->make(MainSliderService::class)->store($this->slider);

        if($store_id !== false) {
            $store = $this->photo->store('/public/uploads/slider/' . uniqid('slider', false));
            $image_id = app()->make(FilesDataService::class)->klikBudMainSlider($store, $store_id);
            $store_image = app()->make(MainSliderService::class)->storeImage($store_id, $image_id);

            if ($store_image === true) {
                session()->flash('message', trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.store'));
                session()->flash('alert-type', 'success');
                return redirect()->route('settings.klikbud.home.slider.index');
            }

            if ($store_image === false) {
                session()->flash('message', trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.messageDanger'));
                session()->flash('alert-type', 'danger');
                return redirect()->route('settings.klikbud.home.slider.index');
            }

            abort(403);
        }

        abort(403);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        return view('livewire.settings.klikbud.home.main-slider.create');
    }
}
