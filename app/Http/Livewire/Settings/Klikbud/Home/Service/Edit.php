<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Service;

use App\Models\KLIKBUD\Service;
use App\Services\Files\FilesDataService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $service;
    public $photo;
    public $oldPhoto_id;

    public $title_pl;
    public $description_pl;
    public $alt_pl;

    public $title_en;
    public $description_en;
    public $alt_en;

    public $title_ua;
    public $description_ua;
    public $alt_ua;

    public $title_ru;
    public $description_ru;
    public $alt_ru;

    /**
     * @var array|string[]
     */
    protected array $rules = [

        'title_pl' => 'required',
        'description_pl' => 'required',
        'alt_pl' => 'required',

        'title_en' => 'required',
        'description_en' => 'required',
        'alt_en' => 'required',

        'title_ua' => 'required',
        'description_ua' => 'required',
        'alt_ua' => 'required',

        'title_ru' => 'required',
        'description_ru' => 'required',
        'alt_ru' => 'required',
    ];

    /**
     * @var array|string[]
     */
    protected array $messages = [
        'photo.image' => 'To nie jest Obrazek!',
        'photo.max' => 'Maksymalny rozmiar obrazku wynosi 256 kb!',
        'photo.required' => 'Obrazek wymagany!',

        'title_pl.required' => 'Nazwa wymagana!',
        'description_pl.required' => 'Opis wymagany!',
        'alt_pl.required' => 'CEO Wymagane!',

        'title_en.required' => 'Żółty tekst wymagany!',
        'description_en.required'=>'Opis wymagany!',
        'alt_en.required' => 'CEO Wymagane!',

        'title_ua.required' => 'Nazwa wymagana!',
        'description_ua.required'=>'Opis wymagany!',
        'alt_ua.required' => 'CEO Wymagane!',

        'title_ru.required' => 'Żółty tekst wymagany!',
        'description_ru.required'=>'Opis wymagany!',
        'alt_ru.required' => 'CEO Wymagane!'
    ];

    public function mount($id)
    {
        $this->service = Service::findOrFail($id);

        $this->title_pl = $this->service->title['pl'];
        $this->description_pl = $this->service->description['pl'];
        $this->alt_pl = $this->service->alt['pl'];

        $this->title_en = $this->service->title['en'];
        $this->description_en = $this->service->description['en'];
        $this->alt_en = $this->service->alt['en'];

        $this->title_ua = $this->service->title['ua'];
        $this->description_ua = $this->service->description['ua'];
        $this->alt_ua = $this->service->alt['ua'];

        $this->title_ru = $this->service->title['ru'];
        $this->description_ru = $this->service->description['ru'];
        $this->alt_ru = $this->service->alt['ru'];

        $this->oldPhoto_id = $this->service->image_id;
    }

    public function render()
    {
        return view('livewire.settings.klikbud.home.service.edit');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit()
    {
        if ($this->photo === null)
        {
            $this->validate();
            $image_id = $this->oldPhoto_id;
        }else{
            $this->validate();
            $this->validate([
                'photo' => 'image|max:256'
            ]);
            $store = $this->photo->store('/public/uploads/slider/' . uniqid('slider', false));
            $image_id = app()->make(FilesDataService::class)->updateKlikBudService($store, $this->service->image_id, $this->service->id);
        }

        $jsonSlug = ["pl" => Str::slug($this->title_pl), "en" => Str::slug($this->title_en), "ua" => Str::slug($this->title_ua), "ru" => Str::slug($this->title_ru)];
        $jsonTitle = ["pl" => $this->title_pl, "en" => $this->title_en, "ua" => $this->title_ua, "ru" => $this->title_ru];
        $jsonDescription = ["pl" => $this->description_pl, "en" => $this->description_en, "ua" => $this->description_ua, "ru" => $this->description_ru];
        $jsonAlt = ["pl" => $this->alt_pl, "en" => $this->alt_en, "ua" => $this->alt_ua, "ru" => $this->alt_ru];

        $update = Service::findOrFail($this->service->id);

        $data = [
            'image_id' => $image_id,
            'user_id' => Auth::id(),
            'slug' => $jsonSlug,
            'alt' => $jsonAlt,
            'title' => $jsonTitle,
            'description' => $jsonDescription,
        ];

        $update->fill($data)->save();

        session()->flash('message', 'Usługe edytowano!');
        session()->flash('alert-type', 'success');

        return redirect()->route('settings.klikbud.home.service.index');
    }


}
