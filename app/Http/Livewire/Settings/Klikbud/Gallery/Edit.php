<?php

namespace App\Http\Livewire\Settings\Klikbud\Gallery;

use App\Data\DefaultData;
use App\Models\KLIKBUD\Gallery;
use App\Services\Files\FilesDataService;
use App\Services\Settings\Klikbud\Gallery\GalleryService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    public $oldPhoto;

    public $photo;
    public $gallery;
    public $oldGallery;

    public $gallery_id;

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

    public function mount($id)
    {
        $gallery = Gallery::findOrFail($id);

        $this->oldGallery = $gallery;

        $this->gallery_id = $id;

        $this->gallery['object_id'] = $gallery->object_id;
        $this->gallery['category_id'] = $gallery->category_id;

        $this->oldPhoto = $gallery->image_id;

        $this->gallery['title_pl'] = $gallery->title['pl'];
        $this->gallery['title_en'] = $gallery->title['en'];
        $this->gallery['title_ua'] = $gallery->title['ua'];
        $this->gallery['title_ru'] = $gallery->title['ru'];

        $this->gallery['description_pl'] = $gallery->description['pl'];
        $this->gallery['description_en'] = $gallery->description['en'];
        $this->gallery['description_ua'] = $gallery->description['ua'];
        $this->gallery['description_ru'] = $gallery->description['ru'];

        $this->gallery['alt_pl'] = $gallery->alt['pl'];
        $this->gallery['alt_en'] = $gallery->alt['en'];
        $this->gallery['alt_ua'] = $gallery->alt['ua'];
        $this->gallery['alt_ru'] = $gallery->alt['ru'];

    }


    public function render()
    {
        $categories = app()->make(DefaultData::class)->klikbud_gallery_categories();
        return view('livewire.settings.klikbud.gallery.edit', compact('categories'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function edit()
    {
        if($this->photo === null or $this->photo === "")
        {
            $this->validate();
            $image_id = $this->oldPhoto;
        }else{

            $this->validate();

            $this->validate([
                'photo' => 'required|max:512|image'
            ]);

            $store_image = $this->photo->store('/public/uploads/gallery/' . uniqid('gallery', false));
            $image_id = app()->make(FilesDataService::class)->updateKlikBudGallery($store_image, $this->oldPhoto, $this->gallery_id);
        }

        $update = app()->make(GalleryService::class)->update($this->gallery_id, $this->gallery, $image_id);

        if($update === true)
        {
            session()->flash('message', 'Obrazek edytowano!');
            session()->flash('alert-type', 'success');

        }elseif($update === false){
            session()->flash('message', 'Coś nie tak :(');
            session()->flash('alert-type', 'danger');
        }else {
            abort(403);
        }

        return redirect()->route('settings.klikbud.gallery.index');
    }

}
