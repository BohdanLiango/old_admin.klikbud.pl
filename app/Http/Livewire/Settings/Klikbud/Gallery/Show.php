<?php

namespace App\Http\Livewire\Settings\Klikbud\Gallery;

use App\Data\DefaultData;
use App\Models\Files\FileAdditionalInformation;
use App\Models\Files\Files;
use App\Models\KLIKBUD\Gallery;
use Livewire\Component;

class Show extends Component
{
    public $gallery;
    public $status_to_main_page;
    public $status_gallery_id;

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
    }

    public function changeStatusInMainPage($status_id)
    {
        $this->gallery->status_to_main_page_id = $status_id;
        $this->gallery->save();

        $this->status_to_main_page = $status_id;

        session()->flash('message', 'Status na głownej stronie zmieniony!');
        session()->flash('alert-type', 'success');
    }

    public function changeStatusToGallery($status_id)
    {
        $this->gallery->status_gallery_id = $status_id;
        $this->gallery->save();

        $this->status_gallery_id = $status_id;

        session()->flash('message', 'Status w galerii zmieniony!');
        session()->flash('alert-type', 'success');
    }

    public function delete()
    {
        Files::findOrFail($this->gallery->image_id)->delete();
        FileAdditionalInformation::where('file_id', '=', $this->gallery->image_id)->delete();
        $this->gallery->delete();

        session()->flash('message', 'Obraz usunięty!');
        session()->flash('alert-type', 'success');
        return redirect()->route('settings.klikbud.gallery.index');
    }


}
