<?php

namespace App\Http\Livewire\Warehouses\Tools;

use App\Data\BreadcrumbsData;
use App\Services\Warehouses\ToolsService;
use Livewire\Component;
use Livewire\WithPagination;

class IndexLivewire extends Component
{
    public $orderBy = 'id', $orderByType = 'desc', $paginate = 20;

    use WithPagination;


    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->clients(1, NULL);
        $page_title = $breadcrumbs[1]['name'];

        $tools = app()->make(ToolsService::class)->showToolsToIndexPage($this->orderBy, $this->orderByType, $this->paginate);

        return view('livewire.warehouses.tools.index-livewire', compact('tools'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }
}
