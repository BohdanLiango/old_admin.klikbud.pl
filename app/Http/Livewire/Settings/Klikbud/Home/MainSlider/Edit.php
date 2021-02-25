<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\MainSlider;

use App\Models\KLIKBUD\MainSlider;
use App\Services\Files\FilesDataService;
use App\Services\Settings\Klikbud\Home\MainSliderService;
use Livewire\WithFileUploads;

class Edit extends MainSliderLivewire
{
    use WithFileUploads;

    public $slider;
    public $photo;
    public $oldPhoto_id;

    public $yellow_text_pl;
    public $black_text_pl;
    public $number_show;
    public $description_pl;
    public $alt_pl;

    public $yellow_text_en;
    public $black_text_en;
    public $description_en;
    public $alt_en;

    public $yellow_text_ua;
    public $black_text_ua;
    public $description_ua;
    public $alt_ua;

    public $yellow_text_ru;
    public $black_text_ru;
    public $description_ru;
    public $alt_ru;

    /**
     * @var array|string[]
     */
    public array $rules = [

        'yellow_text_pl' => 'required',
        'black_text_pl' => 'required',
        'number_show'=>'required',
        'description_pl' => 'required',
        'alt_pl' => 'required',

        'yellow_text_en' => 'required',
        'black_text_en' => 'required',
        'description_en' => 'required',
        'alt_en' => 'required',

        'yellow_text_ua' => 'required',
        'black_text_ua' => 'required',
        'description_ua' => 'required',
        'alt_ua' => 'required',

        'yellow_text_ru' => 'required',
        'black_text_ru' => 'required',
        'description_ru' => 'required',
        'alt_ru' => 'required',
    ];


    public function mount($id)
    {
        $this->slider = MainSlider::findOrFail($id);

        $this->yellow_text_pl = $this->slider->textYellow['pl'];
        $this->black_text_pl = $this->slider->textBlack['pl'];
        $this->number_show = $this->slider->slider_number_show;
        $this->description_pl = $this->slider->description['pl'];
        $this->alt_pl = $this->slider->alt['pl'];

        $this->yellow_text_en = $this->slider->textYellow['en'];
        $this->black_text_en = $this->slider->textBlack['en'];
        $this->description_en = $this->slider->description['en'];
        $this->alt_en = $this->slider->alt['en'];

        $this->yellow_text_ua = $this->slider->textYellow['ua'];
        $this->black_text_ua = $this->slider->textBlack['ua'];
        $this->description_ua = $this->slider->description['ua'];
        $this->alt_ua = $this->slider->alt['ua'];

        $this->yellow_text_ru = $this->slider->textYellow['ru'];
        $this->black_text_ru = $this->slider->textBlack['ru'];
        $this->description_ru = $this->slider->description['ru'];
        $this->alt_ru = $this->slider->alt['ru'];

        $this->oldPhoto_id = $this->slider->image_id;
    }

    public function render()
    {
        return view('livewire.settings.klikbud.home.main-slider.edit');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit()
    {

        $this->validate();

        $update = app()->make(MainSliderService::class)->update($this->slider->id, $this->number_show, $this->alt_pl, $this->alt_en, $this->alt_ua, $this->alt_ru,
                $this->yellow_text_pl, $this->yellow_text_en, $this->yellow_text_ua, $this->yellow_text_ru, $this->black_text_pl, $this->black_text_en, $this->black_text_ua,
                $this->black_text_ru, $this->description_pl, $this->description_en, $this->description_ua, $this->description_ru);

        if($update === true)
        {
            if($this->photo !== null)
            {
                $this->validate([
                    'photo' => 'image|max:256'
                ]);

                $store = $this->photo->store('/public/uploads/slider/' . uniqid('slider', false), 's3');

                if($this->slider->image !== null)
                {
                    $image_id = app()->make(FilesDataService::class)->updateKlikBudMainSlider($store, $this->slider->image_id, $this->slider->id);
                }else{
                    $image_id = app()->make(FilesDataService::class)->klikBudMainSlider($store, $this->slider->id);
                }

                $update_image = app()->make(MainSliderService::class)->storeImage($this->slider->id, $image_id);
                $this->checkStatus($update_image, trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.edit'), 'flash', false, 'center');
                return redirect()->route('settings.klikbud.home.slider.show', $this->slider->id);
            }

            $this->checkStatus($update, trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.messageDanger'), 'flash', false, 'center');
            return redirect()->route('settings.klikbud.home.slider.show', $this->slider->id);
        }

        $this->checkStatus(false, trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.messageDanger'), 'flash', false, 'center');
        return redirect()->route('settings.klikbud.home.slider.show', $this->slider->id);

    }
}
