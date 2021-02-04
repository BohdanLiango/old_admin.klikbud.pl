<?php

namespace App\Http\Livewire\Settings\Klikbud\Gallery;

use App\Data\DefaultData;
use App\Models\KLIKBUD\Gallery;
use App\Services\Files\FilesDataService;
use App\Services\Settings\Klikbud\Gallery\GalleryService;
use Livewire\WithFileUploads;

class Edit extends GalleryLivewire
{
    public $oldPhoto, $photo, $gallery, $oldGallery, $gallery_id;

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
        $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.edit');
        if($update === false){ $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.error');}
        $this->checkStatus($update, $message_success, 'flash', false, 'center');
        return redirect()->route('settings.klikbud.gallery.index');
    }

}
