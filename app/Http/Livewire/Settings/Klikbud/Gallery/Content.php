<?php

namespace App\Http\Livewire\Settings\Klikbud\Gallery;

use App\Data\DefaultData;
use App\Models\KLIKBUD\Gallery;
use App\Services\Settings\Klikbud\Gallery\GalleryService;
use Livewire\WithPagination;

class Content extends GalleryLivewire
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

        $get_countable = Gallery::select('status_gallery_id', 'status_to_main_page_id', 'category_id')->get();
        $count_active_status_gallery = $get_countable->where('status_gallery_id', '=', config('klikbud.klikbud.status_to_gallery.visible'))->count();
        $count_hidden_status_gallery = $get_countable->where('status_gallery_id', '=', config('klikbud.klikbud.status_to_gallery.not_visible'))->count();
        $count_active_status_main_page = $get_countable->where('status_to_main_page_id', '=', config('klikbud.klikbud.status_to_main_page.visible'))->count();
        $count_hidden_status_main_page = $get_countable->where('status_to_main_page_id', '=', config('klikbud.klikbud.status_to_main_page.not_visible'))->count();
        $count_active = $get_countable->count();
        $count_deleted = Gallery::onlyTrashed()->count();
        $count_all = $count_active + $count_deleted;
        $count_all_active = $count_active_status_main_page + $count_active_status_gallery;
        $count_all_hidden = $count_hidden_status_main_page + $count_hidden_status_gallery;
        $count_all_status = $count_all_active + $count_all_hidden;

        if($count_all === 0)
        {
            $percent_all_active = 0;
            $percent_all_deleted = 0;

            $percent_to_active_status_gallery = 0;
            $percent_to_hidden_status_gallery = 0;

            $percent_to_active_status_main_page = 0;
            $percent_to_hidden_status_main_page = 0;

            $percent_all_active_status = 0;
            $percent_all_hidden_status = 0;
        }else{
            $percent_all_active = round($count_active / $count_all * 100, 2);
            $percent_all_deleted = round($count_deleted / $count_all * 100, 2);

            $percent_to_active_status_gallery =  round($count_active_status_gallery / $count_active * 100, 2);
            $percent_to_hidden_status_gallery =  round($count_hidden_status_gallery / $count_active * 100, 2);

            $percent_to_active_status_main_page =  round($count_active_status_main_page / $count_active * 100, 2);
            $percent_to_hidden_status_main_page =  round($count_hidden_status_main_page / $count_active * 100, 2);

            $percent_all_active_status = round($count_all_active / $count_all_status * 100, 2);
            $percent_all_hidden_status = round($count_all_hidden / $count_all_status * 100, 2);
        }

        $count_categories = array();

        foreach ($categories as $category)
        {
            $count_categories[] = $get_countable->where('category_id', '=', $category['value'])->count();
        }

        $status_to_main_page = app()->make(DefaultData::class)->klikbud_status_to_main_page();

        return view('livewire.settings.klikbud.gallery.content', compact('categories', 'gallery', 'status_to_main_page',
        'count_active_status_gallery', 'count_hidden_status_gallery', 'count_active_status_main_page', 'count_hidden_status_main_page', 'count_active',
        'count_deleted', 'count_all', 'count_all_active', 'count_all_hidden', 'percent_all_active', 'percent_all_deleted', 'percent_to_active_status_gallery',
        'percent_to_hidden_status_gallery', 'percent_to_active_status_main_page', 'percent_to_hidden_status_main_page', 'percent_all_active_status',
        'percent_all_hidden_status', 'count_categories'));
    }

    public function changeStatusInMainPage($gallery_id, $status_id)
    {
        $status= app()->make(GalleryService::class)->changeStatusToMainPage($gallery_id, $status_id);
        $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.status_to_main_page');
        if($status === false)
        {
            $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.error');
        }
        $this->checkStatus($status, $message_success, 'alert', true, 'top-end');
    }

    public function changeStatusToGallery($gallery_id, $status_id)
    {
        $status = app()->make(GalleryService::class)->changeStatusToGallery($gallery_id, $status_id);
        $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.status_to_gallery');
        if($status === false)
        {
            $message_success = trans('admin_klikbud/settings/klikbud/gallery.session.error');
        }
        $this->checkStatus($status, $message_success, 'alert', true, 'top-end');
    }
}
