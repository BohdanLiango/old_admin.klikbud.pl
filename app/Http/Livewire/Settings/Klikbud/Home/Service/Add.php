<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Service;

use App\Models\KLIKBUD\Service;
use App\Services\Files\FilesDataService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public $photo;
    public $service;

    /**
     * @var array|string[]
     */
    protected array $rules = [
        'photo' => 'image|max:256|required',

        'service.title_pl' => 'required',
        'service.description_pl' => 'required',
        'service.alt_pl' => 'required',

        'service.title_en' => 'required',
        'service.description_en' => 'required',
        'service.alt_en' => 'required',

        'service.title_ua' => 'required',
        'service.description_ua' => 'required',
        'service.alt_ua' => 'required',

        'service.title_ru' => 'required',
        'service.description_ru' => 'required',
        'service.alt_ru' => 'required',
    ];

    /**
     * @var array|string[]
     */
    protected array $messages = [
        'photo.image' => 'To nie jest Obrazek!',
        'photo.max' => 'Maksymalny rozmiar obrazku wynosi 256 kb!',
        'photo.required' => 'Obrazek wymagany!',

        'service.title_pl.required' => 'Nazwa wymagana!',
        'service.description_pl.required' => 'Opis wymagany!',
        'service.alt_pl.required' => 'CEO Wymagane!',

        'service.title_en.required' => 'Żółty tekst wymagany!',
        'service.description_en.required'=>'Opis wymagany!',
        'service.alt_en.required' => 'CEO Wymagane!',

        'service.title_ua.required' => 'Nazwa wymagana!',
        'service.description_ua.required'=>'Opis wymagany!',
        'service.alt_ua.required' => 'CEO Wymagane!',

        'service.title_ru.required' => 'Żółty tekst wymagany!',
        'service.description_ru.required'=>'Opis wymagany!',
        'service.alt_ru.required' => 'CEO Wymagane!'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $jsonSlug = ["pl" => Str::slug($this->service['title_pl']), "en" => Str::slug($this->service['title_en']), "ua" => Str::slug($this->service['title_ua']), "ru" => Str::slug($this->service['title_ru'])];
        $jsonTitle = ["pl" => $this->service['title_pl'], "en" => $this->service['title_en'], "ua" => $this->service['title_ua'], "ru" => $this->service['title_ru']];
        $jsonDescription = ["pl" => $this->service['description_pl'], "en" => $this->service['description_en'], "ua" => $this->service['description_ua'], "ru" => $this->service['description_ru']];
        $jsonAlt = ["pl" => $this->service['alt_pl'], "en" => $this->service['alt_en'], "ua" => $this->service['alt_ua'], "ru" => $this->service['alt_ru']];

        $save = new Service();

        $data = [
            'user_id' => Auth::id(),
            'slug' => $jsonSlug,
            'alt' => $jsonAlt,
            'title' => $jsonTitle,
            'description' => $jsonDescription,
        ];

        $save->fill($data)->save();

        $store_image = $this->photo->store('/public/uploads/service/' . uniqid('service', false));
        $image_id = app()->make(FilesDataService::class)->storeKlikBudService($store_image, $save->id);

        $update = Service::findOrFail($save->id);
        $update->image_id = $image_id;
        $update->save();

        session()->flash('message', 'Usługa stworzona!');
        session()->flash('alert-type', 'success');

        return redirect()->route('settings.klikbud.home.service.index');
    }

    public function render()
    {
        return view('livewire.settings.klikbud.home.service.add');
    }


}
