<?php

namespace App\Http\Livewire\Warehouses\Tools;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Services\Business\BusinessService;
use App\Services\Clients\ClientService;
use App\Services\Objects\ObjectsService;
use App\Services\Warehouses\StatusToolService;
use App\Services\Warehouses\ToolsCategoryService;
use App\Services\Warehouses\ToolsService;
use App\Services\Warehouses\WarehousesService;
use Livewire\Component;
use Livewire\WithPagination;

class IndexLivewire extends Component
{
    public $orderBy = 'id', $orderByType = 'desc', $paginate = 9, $searchQuery = '', $searchStatus = '',
        $searchMainCategory = '', $searchHalfCategory = '', $searchCategory = '', $searchGlobalStatusTable = '', $searchGlobalStatusId = '';
    public $categories, $warehouses, $status_tool, $objects, $clients, $business;
    public $countAll, $countActive, $countDeleted, $percentActive, $percentDeleted, $status;

    use WithPagination;

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->tools(1, NULL);
        $page_title = $breadcrumbs[1]['name'];

        $status_global_search = collect($this->status_tool)->where('table', $this->searchGlobalStatusTable)->where('table_id', $this->searchGlobalStatusId);

        $id_status = array();
        foreach ($status_global_search->values() as $status)
        {
            $id_status[] = $status->tool_id;
        }

        if(empty($id_status))
        {
            $search_id = '';
        }else{
            $search_id = $id_status;
        }

        $tools = app()->make(ToolsService::class)->showToolsToIndexPage($search_id, $this->searchMainCategory, $this->searchHalfCategory, $this->searchCategory,
            $this->searchQuery, $this->searchStatus, $this->orderBy, $this->orderByType, $this->paginate);

        return view('livewire.warehouses.tools.index-livewire', compact('tools'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function mount()
    {
        $this->categories = app()->make(ToolsCategoryService::class)->getCategoriesToForms();
        $this->warehouses = app()->make(WarehousesService::class)->selectToForms();
        $this->status_tool = app()->make(StatusToolService::class)->get_all();
        $this->objects = app()->make(ObjectsService::class)->selectObjectsToForms();
        $this->clients = app()->make(ClientService::class)->showClientSelectIdName();
        $this->business = app()->make(BusinessService::class)->selectBusinessToForm();
        if(app()->make(ToolsService::class)->getAllActiveToolsSelectIdCount() > 0 || app()->make(ToolsService::class)->getAllTrashedToolsSelectIdCount() > 0)
        {
            $this->countActive = app()->make(ToolsService::class)->getAllActiveToolsSelectIdCount();
            $this->countDeleted = app()->make(ToolsService::class)->getAllTrashedToolsSelectIdCount();
            $this->countAll = $this->countActive + $this->countDeleted;
            $this->percentActive = round($this->countActive / $this->countAll * 100, 2);
            $this->percentDeleted  = 100 - $this->percentActive;
        }

        $this->status = app()->make(DefaultData::class)->status_tools();
    }

    public function searchCategory($id, $categoryType)
    {
        switch ($categoryType){
            case('mainCategory'):
                $this->searchHalfCategory = '';
                $this->searchCategory = '';
                $this->searchMainCategory = $id;
                break;
            case('halfCategory'):
                $this->searchMainCategory = '';
                $this->searchCategory = '';
                $this->searchHalfCategory = $id;
                break;
            case('category'):
                $this->searchMainCategory = '';
                $this->searchHalfCategory = '';
                $this->searchCategory = $id;
                break;
        }
    }

    public function searchStatus($table, $table_id)
    {
        switch ($table){
            case ('warehouse'):
                $this->searchGlobalStatusTable = config('klikbud.status_tools_table.warehouse');
                $this->searchGlobalStatusId = $table_id;
                break;
            case ('object'):
                $this->searchGlobalStatusTable = config('klikbud.status_tools_table.object');
                $this->searchGlobalStatusId = $table_id;
                break;
            case ('client'):
                $this->searchGlobalStatusTable = config('klikbud.status_tools_table.client');
                $this->searchGlobalStatusId = $table_id;
                break;
            case ('business'):
                $this->searchGlobalStatusTable = config('klikbud.status_tools_table.business');
                $this->searchGlobalStatusId = $table_id;
                break;
        }
    }

    public function clearSearchOptions()
    {
        $this->searchQuery = '';
        $this->searchStatus = '';
        $this->searchMainCategory = '';
        $this->searchHalfCategory = '';
        $this->searchCategory = '';
        $this->searchGlobalStatusTable = '';
        $this->searchGlobalStatusId = '';
    }
}
