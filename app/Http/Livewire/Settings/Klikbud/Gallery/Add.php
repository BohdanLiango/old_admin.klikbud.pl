<?php

namespace App\Http\Livewire\Settings\Klikbud\Gallery;

use App\Data\DefaultData;
use App\Services\Files\FilesDataService;
use App\Services\Settings\Klikbud\Gallery\GalleryService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    public $photo;
    public $gallery;

    use WithFileUploads;

    protected array $rules = [
        'gallery.title_pl' => 'required',
        'gallery.title_en' => 'required|',
        'gallery.title_ua' => 'required',
        'gallery.title_ru' => 'required',

        'gallery.description_pl' => 'required',
        'gallery.description_en' => 'required',
        'gallery.description_ua' => 'required',
        'gallery.description_ru' => 'required',

        'gallery.alt_pl' => 'required',
        'gallery.alt_en' => 'required',
        'gallery.alt_ua' => 'required',
        'gallery.alt_ru' => 'required',

        'gallery.object_id' => 'nullable|numeric',
        'gallery.category_id' => 'nullable|numeric',

        'photo' => 'required|max:512|image'
    ];

    protected array $messages = [
        'photo.image' => 'To nie jest Obrazek!',
        'photo.max' => 'Maksymalny rozmiar obrazku wynosi 256 kb!',
        'photo.required' => 'Obrazek wymagany!',

        'gallery.title_pl.required' => 'Nazwa wymagana!',
        'gallery.description_pl.required' => 'Opis wymagany!',
        'gallery.alt_pl.required' => 'CEO Wymagane!',

        'gallery.title_en.required' => 'Nazwa wymagana!',
        'gallery.description_en.required'=>'Opis wymagany!',
        'gallery.alt_en.required' => 'CEO Wymagane!',

        'gallery.title_ua.required' => 'Nazwa wymagana!',
        'gallery.description_ua.required'=>'Opis wymagany!',
        'gallery.alt_ua.required' => 'CEO Wymagane!',

        'gallery.title_ru.required' => 'Nazwa wymagana!',
        'gallery.description_ru.required'=>'Opis wymagany!',
        'gallery.alt_ru.required' => 'CEO Wymagane!',
    ];


    public function render()
    {
        $categories = app()->make(DefaultData::class)->klikbud_gallery_categories();
        return view('livewire.settings.klikbud.gallery.add', compact('categories'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        $store_id  = app()->make(GalleryService::class)->store($this->gallery);

        $store_image = $this->photo->store('/public/uploads/gallery/' . uniqid('gallery', false));
        $image_id = app()->make(FilesDataService::class)->storeKlikBudGallery($store_image, $store_id);
        $store_image_to_gallery = app()->make(GalleryService::class)->store_image($store_id, $image_id);

        if($store_image_to_gallery === true)
        {
            session()->flash('message', 'Nowy obraz dodany!');
            session()->flash('alert-type', 'success');

            return redirect()->route('settings.klikbud.gallery.index');
        }

        return abort(403);
    }
}
