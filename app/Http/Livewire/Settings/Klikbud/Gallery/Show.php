<?php

namespace App\Http\Livewire\Settings\Klikbud\Gallery;

use App\Data\DefaultData;
use App\Models\KLIKBUD\Gallery;
use App\Services\Settings\Klikbud\Gallery\GalleryService;
use Livewire\Component;

class Show extends Component
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

        if($status === true)
        {
            session()->flash('message', 'Status na głownej stronie zmieniony!');
            session()->flash('alert-type', 'success');
        }elseif($status === false){
            session()->flash('message', 'Coś nie tak :(');
            session()->flash('alert-type', 'danger');
        }else {
            abort(403);
        }
    }

    public function changeStatusToGallery($status_id)
    {
        $status = app()->make(GalleryService::class)->changeStatusToGallery($this->gallery_id, $status_id);

        $this->status_gallery_id = $status_id;

        if($status === true)
        {
            session()->flash('message', 'Status w galerii zmieniony!');
            session()->flash('alert-type', 'success');
        }elseif($status === false){
            session()->flash('message', 'Coś nie tak :(');
            session()->flash('alert-type', 'danger');
        }else {
            abort(403);
        }
    }

    public function delete()
    {
        $status = app()->make(GalleryService::class)->delete($this->gallery_id, $this->gallery->image_id);

        if($status === true)
        {
            session()->flash('message', 'Obraz usunięty!');
            session()->flash('alert-type', 'success');
        }elseif($status === false){
            session()->flash('message', 'Coś nie tak :(');
            session()->flash('alert-type', 'danger');
        }else {
        abort(403);
        }

        return redirect()->route('settings.klikbud.gallery.index');
    }


}
