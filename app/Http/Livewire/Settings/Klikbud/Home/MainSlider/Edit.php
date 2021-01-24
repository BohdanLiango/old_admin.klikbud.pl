<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\MainSlider;

use App\Models\KLIKBUD\MainSlider;
use App\Services\Files\FilesDataService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
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
    protected array $rules = [

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

    /**
     * @var array|string[]
     */
    protected array $messages = [
        'photo.image' => 'To nie jest Obrazek!',
        'photo.max:256' => 'Maksymalny rozmiar obrazku wynosi 256 kb!',

        'yellow_text_pl.required' => 'Żółty tekst wymagany!',
        'black_text_pl.required' => 'Czarny tekst wymagany!',
        'number_show.required'=>'Numer suwaka wymagany!',
        'description_pl.required' => 'Opis wymagany!',
        'alt_pl.required' => 'CEO Wymagane!',

        'yellow_text_en.required' => 'Żółty tekst wymagany!',
        'black_text_en.required' => 'Czarny tekst wymagany!',
        'description_en.required'=>'Opis wymagany!',
        'alt_en.required' => 'CEO Wymagane!',

        'yellow_text_ua.required' => 'Żółty tekst wymagany!',
        'black_text_ua.required' => 'Czarny tekst wymagany!',
        'description_ua.required'=>'Opis wymagany!',
        'alt_ua.required' => 'CEO Wymagane!',

        'yellow_text_ru.required' => 'Żółty tekst wymagany!',
        'black_text_ru.required' => 'Czarny tekst wymagany!',
        'description_ru.required'=>'Opis wymagany!',
        'alt_ru.required' => 'CEO Wymagane!'
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

    public function editSlider()
    {
        if($this->photo === null)
        {
            $this->validate();

            $jsonAlt = ["pl" => $this->alt_pl, "en" => $this->alt_en, "ua" => $this->alt_ua, "ru" => $this->alt_ru];
            $jsonTextYellow = ["pl" => $this->yellow_text_pl, "en" => $this->yellow_text_en, "ua" => $this->yellow_text_ua, "ru" => $this->yellow_text_ru];
            $jsonTextBlack = ["pl" => $this->black_text_pl, "en" => $this->black_text_en, "ua" => $this->black_text_ua, "ru" => $this->black_text_ru];
            $jsonDescription = ["pl" => $this->description_pl, "en" => $this->description_en, "ua" => $this->description_ua, "ru" => $this->description_ru];

            $update = MainSlider::find($this->slider->id);

            $data = [
                'status_to_main_page_id' => 2,
                'slider_number_show' => $this->number_show,
                'user_id' => Auth::id(),
                'moderated_id' => 3,
                'alt' => $jsonAlt,
                'textYellow' => $jsonTextYellow,
                'textBlack' => $jsonTextBlack,
                'description' => $jsonDescription
            ];

            $update->fill($data);

            $update->save();

            return redirect()->route('settings.klikbud.home.slider.index');
        }else{

            $this->validate([
                'photo' => 'image|max:256'
            ]);

            $store = $this->photo->store('/public/uploads/slider/' . uniqid('slider', false));
            $app_make_class = app()->make(FilesDataService::class);
            $image_id = $app_make_class->updateKlikBudMainSlider($store, $this->slider->image_id, $this->slider->id);




            $jsonAlt = ["pl" => $this->alt_pl, "en" => $this->alt_en, "ua" => $this->alt_ua, "ru" => $this->alt_ru];
            $jsonTextYellow = ["pl" => $this->yellow_text_pl, "en" => $this->yellow_text_en, "ua" => $this->yellow_text_ua, "ru" => $this->yellow_text_ru];
            $jsonTextBlack = ["pl" => $this->black_text_pl, "en" => $this->black_text_en, "ua" => $this->black_text_ua, "ru" => $this->black_text_ru];
            $jsonDescription = ["pl" => $this->description_pl, "en" => $this->description_en, "ua" => $this->description_ua, "ru" => $this->description_ru];

            $update = MainSlider::find($this->slider->id);

            $data = [
                'status_to_main_page_id' => 2,
                'slider_number_show' => $this->number_show,
                'image_id' => $image_id,
                'user_id' => Auth::id(),
                'moderated_id' => 3,
                'alt' => $jsonAlt,
                'textYellow' => $jsonTextYellow,
                'textBlack' => $jsonTextBlack,
                'description' => $jsonDescription
            ];

            $update->fill($data);

            $update->save();

            return redirect()->route('settings.klikbud.home.slider.index');

        }


    }
}
