<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\MainSlider;

use App\Models\KLIKBUD\MainSlider;
use App\Services\Files\FilesDataService;
use App\Services\Files\FilesService;
use Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $image;
    public $saveSuccess = false;
    public $slider;

    /**
     * @var array|string[]
     */
    protected array $rules = [
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

        'image' => 'image|max:512|required'
    ];

    /**
     * @var array|string[]
     */
    protected array $messages = [
        'slider.yellow_text_pl.required' => 'Żółty tekst wymagany!',
        'slider.black_text_pl.required' => 'Czarny tekst wymagany!',
        'slider.number_show.required'=>'Numer suwaka wymagany!',
        'slider.description_pl.required' => 'Opis wymagany!',
        'slider.alt_pl.required' => 'CEO Wymagane!',

        'slider.yellow_text_en.required' => 'Żółty tekst wymagany!',
        'slider.black_text_en.required' => 'Czarny tekst wymagany!',
        'slider.description_en.required'=>'Opis wymagany!',
        'slider.alt_en.required' => 'CEO Wymagane!',

        'slider.yellow_text_ua.required' => 'Żółty tekst wymagany!',
        'slider.black_text_ua.required' => 'Czarny tekst wymagany!',
        'slider.description_ua.required'=>'Opis wymagany!',
        'slider.alt_ua.required' => 'CEO Wymagane!',

        'slider.yellow_text_ru.required' => 'Żółty tekst wymagany!',
        'slider.black_text_ru.required' => 'Czarny tekst wymagany!',
        'slider.description_ru.required'=>'Opis wymagany!',
        'slider.alt_ru.required' => 'CEO Wymagane!',
    ];

    public function saveSlider()
    {
        $this->validate();



//        $jsonAlt = ["pl" => $this->slider->alt_pl, "en" => $this->slider->alt_en, "ua" => $this->slider->alt_ua, "ru" => $this->slider->alt_ru];
//        $jsonTextYellow = ["pl" => $this->slider->yellow_text_pl, "en" => $this->slider->yellow_text_en, "ua" => $this->slider->yellow_text_ua, "ru" => $this->slider->yellow_text_ru];
//        $jsonTextBlack = ["pl" => $this->slider->black_text_pl, "en" => $this->slider->black_text_en, "ua" => $this->slider->black_text_ua, "ru" => $this->slider->black_text_ru];
//        $jsonDescription = ["pl" => $this->slider->description_pl, "en" => $this->slider->description_en, "ua" => $this->slider->description_ua, "ru" => $this->slider->description_ru];

        $filename = $this->image->store('sliders', 'public');
        $new =
        $new1 = $new->slug($filename);
        dd($new1);
        $save = new MainSlider();

        $data = [
            'status_to_main_page_id' => 2,
            'slider_number_show' => $this->slider->number_show,
            'image_id' => 1,
            'user_id' => Auth::id(),
            'moderated_id' => 3,
            'alt' => $jsonAlt,
            'textYellow' => $jsonTextYellow,
            'textBlack' => $jsonTextBlack,
            'description' => $jsonDescription
        ];

        $save->fill($data)->save();

        $filesStore = new FilesDataService();

        $this->saveSuccess = true;

        return redirect()->route('settings.klikbud.home.slider.index');
    }


    public function uploatedImage()
    {
        $this->validate(['image' => 'image|max:512|required']);
    }

    public function render()
    {
        return view('livewire.settings.klikbud.home.main-slider.create');
    }
}
