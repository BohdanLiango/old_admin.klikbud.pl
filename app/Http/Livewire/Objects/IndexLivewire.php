<?php

namespace App\Http\Livewire\Objects;

use App\Data\BreadcrumbsData;
use App\Services\Objects\ObjectsService;
use Livewire\Component;

class IndexLivewire extends Component
{
    public $paginate = 10;

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->objects(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $objects_show = app()->make(ObjectsService::class)->showAllToIndex($this->paginate);
        $count_all = $objects_show->count();
        return view('livewire.objects.index-livewire', compact('objects_show', 'count_all'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }
}
