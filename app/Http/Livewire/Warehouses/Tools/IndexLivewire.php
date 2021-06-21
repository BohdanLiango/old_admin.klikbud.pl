<?php

namespace App\Http\Livewire\Warehouses\Tools;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Http\Livewire\Warehouses\Warehouse;
use App\Services\Business\BusinessService;
use App\Services\Clients\ClientService;
use App\Services\Objects\ObjectsService;
use App\Services\Warehouses\ToolsCategoryService;
use App\Services\Warehouses\ToolsService;
use App\Services\Warehouses\WarehousesService;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class IndexLivewire extends Warehouse
{
    // Search
    public $orderBy = 'id', $orderByType = 'desc', $paginate = 2, $searchQuery = '', $searchStatus = '',
        $searchMainCategory = '', $searchHalfCategory = '', $searchCategory = '', $searchGlobalStatusTable = '', $searchGlobalStatusId = '',
        $searchBoxId = '', $searchBoxTitle = '', $showCloseFiltersButton = 1, $box_id = NULL, $is_new = 'dont_open_box';

    //Toolbar
    public $searchCategoryName = '', $searchGlobalStatusName = '';

    //Data
    public $categories, $warehouses, $status_tool, $objects, $clients, $business, $register, $toolsCountStatus;

    //Stats
    public $countAll, $countActive, $countDeleted, $status, $priceAll = 0;

    use WithPagination;

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->tools(1, NULL);
        $page_title = $breadcrumbs[1]['name'];

        $tools = app()->make(ToolsService::class)->showToolsToIndexPage($this->searchBoxId, $this->box_id, $this->searchMainCategory, $this->searchHalfCategory, $this->searchCategory,
            $this->searchQuery, $this->searchStatus, $this->searchGlobalStatusTable, $this->searchGlobalStatusId, $this->orderBy, $this->orderByType, $this->paginate, $this->is_new);

        if($this->searchQuery != '' ||
            $this->searchStatus != '' ||
            $this->searchMainCategory != '' ||
            $this->searchHalfCategory != '' ||
            $this->searchCategory != '' ||
            $this->searchGlobalStatusTable != '' ||
            $this->searchGlobalStatusId != '' ||
            $this->searchBoxId != '' ||
            $this->box_id != NULL ||
            $this->is_new !== 'dont_open_box')
        {
            $this->showCloseFiltersButton = 2;
        }

        $count_tools_search = count($tools);

        $cart = app()->make(ToolsService::class)->getLastActiveCart();
        if(!is_null($cart))
        {
            $collect_items_cart = collect($cart->items);
            $collect_cart_count = $collect_items_cart->count();
        }else{
            $collect_items_cart = collect();
            $collect_cart_count = 0;
        }

        return view('livewire.warehouses.tools.index-livewire', compact('tools', 'count_tools_search', 'collect_items_cart', 'collect_cart_count'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }


    public function mount(ToolsService $toolsService, ToolsCategoryService $toolsCategoryService, WarehousesService $warehousesService,
                            ObjectsService $objectsService, ClientService $clientService, BusinessService $businessService)
    {
        //Start Data
        $this->categories = $toolsCategoryService->getCategoriesToForms();
        $this->warehouses = $warehousesService->selectToForms();
        $this->objects = $objectsService->selectObjectsToForms();
        $this->clients = $clientService->showClientSelectIdName();
        $this->business = $businessService->selectBusinessToForm();
        $this->register = $toolsService->getAllDataRegisterToTools();
        $this->toolsCountStatus = $toolsService->getAllActiveToolsSelectIdGet();

//        foreach ($this->toolsCountStatus as $item)
//        {
//            $this->priceAll += (float)$item->price;
//        }

        //End data
        //Start Stats
        if(count($this->toolsCountStatus) > 0 || $toolsService->getAllTrashedToolsSelectIdCount() > 0)
        {
            $this->countActive = count($this->toolsCountStatus);
            $this->countDeleted = $toolsService->getAllTrashedToolsSelectIdCount();
            $this->countAll = $this->countActive + $this->countDeleted;
        }
        $this->status = app()->make(DefaultData::class)->status_tools();
        //End Stats

    }

    public function searchCategory($id, $categoryType, $categoryName)
    {
        $this->searchCategoryName = $categoryName;

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

    public function clearSearchOptions()
    {
        $this->searchQuery = '';
        $this->searchStatus = '';
        $this->searchMainCategory = '';
        $this->searchHalfCategory = '';
        $this->searchCategory = '';
        $this->searchGlobalStatusTable = '';
        $this->searchGlobalStatusId = '';
        $this->searchBoxId = '';
        $this->showCloseFiltersButton = 1;
        $this->box_id = NULL;
        $this->is_new = 'dont_open_box';

        $this->searchCategoryName = '';
        $this->searchGlobalStatusName = '';
    }

    public function searchStatus($table, $table_id, $item_name)
    {
        $this->searchGlobalStatusName = $item_name;

        switch ($table){
            case ('warehouse'):
                $this->searchGlobalStatusTable = config('klikbud.status_too`ls_table.warehouse');
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

    public function searchWhereBoxId($box_id, $box_title)
    {
        (int)$this->searchBoxId = $box_id;
        $this->searchBoxTitle = Str::limit($box_title, 20);
        $this->box_id = $box_id;
    }

    public function searchBoxName($box_name)
    {
        $this->searchBoxTitle = $box_name;
    }

    public function searchNew()
    {
        $this->is_new = true;
    }

    public function searchAll()
    {
        $this->is_new = false;
    }

    public function addToolToCart($item, $box_id)
    {
        if($box_id !== NULL)
        {
            $this->checkStatus(false, 'Można dodać tylko razem z skrzynią', 'alert', true, 'top-end');
        }else{
            $status = app()->make(ToolsService::class)->addToolsToCart($item);
            if($status === true)
            {
                $message = 'Dodano do koszyka!';
            }else{
                $message = 'FUCK';
            }
            $this->checkStatus($status, $message, 'alert', true, 'top-end');
        }
    }
}
