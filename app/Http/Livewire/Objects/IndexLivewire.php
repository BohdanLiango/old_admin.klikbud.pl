<?php

namespace App\Http\Livewire\Objects;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Services\Objects\ObjectsService;
use Livewire\Component;

class IndexLivewire extends Component
{
    public int $paginate = 10;
    public $searchQuery = '';
    public $searchStatusObject = '';
    public $searchTypeObject = '';
    public $searchRepair = '';
    public $orderBy = 'DESC';
    public $orderByInfo = 'id';

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->objects(1, NULL);
        $page_title = $breadcrumbs[1]['name'];

        $objects_show = app()->make(ObjectsService::class)->showAllToIndex($this->paginate, $this->searchQuery,
            $this->searchStatusObject, $this->searchTypeObject, $this->searchRepair, $this->orderBy, $this->orderByInfo);
        $count_all = $objects_show->count();

        $status_object_data = app()->make(DefaultData::class)->status_object();
        $type_object_data = app()->make(DefaultData::class)->type_object();
        $type_repair_data = app()->make(DefaultData::class)->type_repair_object();

        return view('livewire.objects.index-livewire', compact('objects_show', 'count_all', 'status_object_data',
        'type_object_data', 'type_repair_data'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }
}
