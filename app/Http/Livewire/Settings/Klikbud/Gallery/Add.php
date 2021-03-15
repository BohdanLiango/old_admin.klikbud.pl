<?php

namespace App\Http\Livewire\Settings\Klikbud\Gallery;

use App\Data\DefaultData;
use App\Services\Files\FilesDataService;
use App\Services\Settings\Klikbud\Gallery\GalleryService;
use Livewire\WithFileUploads;

class Add extends GalleryLivewire
{
    public $photo;
    public $gallery;

    use WithFileUploads;

    protected array $rules = [
        'gallery.title_pl' => 'required',
        'gallery.title_en' => 'required',
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

        //Store Gallery Data
        $store_id = app()->make(GalleryService::class)->store($this->gallery);

        if ($store_id !== false) {
            $store_image = $this->photo->store('/public/uploads/gallery/' . uniqid('gallery', false), config('klikbud.disk_store'));
            $image_id = app()->make(FilesDataService::class)->storeKlikBudGallery($store_image, $store_id);
            $store_image_to_gallery = app()->make(GalleryService::class)->store_image($store_id, $image_id);

            $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.success_store');

            if($store_image_to_gallery === false)
            {
                $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.error');
            }

            $this->checkStatus($store_image_to_gallery, $message_success, 'flash', false, 'center');

            return redirect()->route('settings.klikbud.gallery.index');
        }

        $this->checkStatus(false, trans('admin_klikbud/settings/klikbud/gallery.session.error'), 'flash', false, 'center');

        return redirect()->route('settings.klikbud.gallery.index');

    }
}
