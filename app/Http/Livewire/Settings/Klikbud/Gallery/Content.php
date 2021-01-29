<?php

namespace App\Http\Livewire\Settings\Klikbud\Gallery;

use App\Data\DefaultData;
use App\Models\KLIKBUD\Gallery;
use App\Services\Settings\Klikbud\Gallery\GalleryService;
use Livewire\Component;
use Livewire\WithPagination;

class Content extends Component
{
    use WithPagination;

    public $searchQuery;
    public $searchStatus;
    public $searchStatusToMainPage;
    public $searchCategory;

    public function mount()
    {
        $this->searchQuery = '';
        $this->searchStatus = '';
        $this->searchStatusToMainPage = '';
        $this->searchCategory = '';
    }

    public function render()
    {
        $categories = app()->make(DefaultData::class)->klikbud_gallery_categories();

        $gallery = Gallery::when($this->searchQuery != '', function ($query) {
            $query->where('title', 'like', '%' . $this->searchQuery . '%');
        })->when($this->searchStatus != '', function ($query) {
            $query->where('status_gallery_id', $this->searchStatus);
        })->when($this->searchStatusToMainPage != '', function ($query) {
           $query->where('status_to_main_page_id', $this->searchStatusToMainPage);
        })->when($this->searchCategory != '', function ($query) {
            $query->where('category_id', $this->searchCategory);
        })->orderBy('ID', 'desc')->paginate(6);

        $count = Gallery::count();

        return view('livewire.settings.klikbud.gallery.content', compact('categories', 'gallery', 'count'));
    }

    public function changeStatusInMainPage($gallery_id, $status_id)
    {
        app()->make(GalleryService::class)->changeStatusToMainPage($gallery_id, $status_id);
        session()->flash('message', 'Status na głownej stronie zmieniony!');
        session()->flash('alert-type', 'warning');
    }

    public function changeStatusToGallery($gallery_id, $status_id)
    {
        app()->make(GalleryService::class)->changeStatusToGallery($gallery_id, $status_id);
        session()->flash('message', 'Status na głownej stronie zmieniony!');
        session()->flash('alert-type', 'warning');
    }
}
