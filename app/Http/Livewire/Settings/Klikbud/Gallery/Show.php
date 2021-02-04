<?php

namespace App\Http\Livewire\Settings\Klikbud\Gallery;

use App\Data\DefaultData;
use App\Models\KLIKBUD\Gallery;
use App\Services\Settings\Klikbud\Gallery\GalleryService;

class Show extends GalleryLivewire
{
    public $gallery;
    public $status_to_main_page;
    public $status_gallery_id;

    private $gallery_id;

    public function render()
    {
        sleep(0.4);
        $categories = app()->make(DefaultData::class)->klikbud_gallery_categories();
        return view('livewire.settings.klikbud.gallery.show', compact('categories'));
    }

    public function mount($id)
    {
        $this->gallery = Gallery::findOrFail($id);
        $this->status_to_main_page = $this->gallery->status_to_main_page_id;
        $this->status_gallery_id = $this->gallery->status_gallery_id;
        $this->gallery_id = $id;
    }

    public function changeStatusInMainPage($status_id)
    {
        $status = app()->make(GalleryService::class)->changeStatusToMainPage($this->gallery_id, $status_id);
        $this->status_to_main_page = $status_id;
        $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.status_to_main_page');

        if($status === false)
        {
            $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.error');
        }

        $this->checkStatus($status, $message_success, 'alert', true, 'top-end');
    }

    public function changeStatusToGallery($status_id)
    {
        $status = app()->make(GalleryService::class)->changeStatusToGallery($this->gallery_id, $status_id);
        $this->status_gallery_id = $status_id;
        $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.status_to_gallery');

        if($status === false)
        {
            $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.error');
        }

        $this->checkStatus($status, $message_success, 'alert', true, 'top-end');
    }

    public function delete()
    {
        $status = app()->make(GalleryService::class)->delete($this->gallery_id, $this->gallery->image_id);
        $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.delete');

        if($status === false)
        {
            $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.error');
        }

        $this->checkStatus($status, $message_success, 'flash', false, 'center');
        return redirect()->route('settings.klikbud.gallery.index');
    }


}
