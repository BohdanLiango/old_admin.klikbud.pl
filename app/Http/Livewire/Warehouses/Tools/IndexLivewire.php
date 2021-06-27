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
    public $orderBy = 'id', $orderByType = 'desc', $paginate = 12, $searchQuery = '', $searchStatus = '',
        $searchMainCategory = '', $searchHalfCategory = '', $searchCategory = '', $searchGlobalStatusTable = '', $searchGlobalStatusId = '',
        $searchBoxId = '', $searchBoxTitle = '', $showCloseFiltersButton = 1, $box_id = NULL, $is_new = 'dont_open_box';

    //Toolbar
    public $searchCategoryName = '', $searchGlobalStatusName = '';

    //Data
    public $categories, $warehouses, $status_tool, $objects, $clients, $business, $register, $toolsCountStatus, $cart;

    //Stats
    public $countAll, $countActive, $countDeleted, $status, $priceAll = 0;

    private $get_tools;

    use WithPagination;

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->tools(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $this->categories = app()->make(ToolsCategoryService::class)->getCategoriesToForms();

        $this->warehouses = app()->make(WarehousesService::class)->selectToForms();
        $this->objects = app()->make(ObjectsService::class)->selectObjectsToForms();
        $this->clients = app()->make(ClientService::class)->showClientSelectIdName();
        $this->business = app()->make(BusinessService::class)->selectBusinessToForm();
        $this->register = app()->make(ToolsService::class)->getAllDataRegisterToTools(); //?
        $this->status = app()->make(DefaultData::class)->status_tools();
        $this->get_tools = app()->make(ToolsService::class)->showToolsToIndexPage();
        $this->toolsCountStatus = $this->get_tools->get();


        $this->countActive = count($this->get_tools->get());
        $tools = $this->searchableTools($this->get_tools, $this->searchQuery, $this->searchStatus, $this->searchMainCategory,
        $this->searchHalfCategory, $this->searchCategory, $this->searchGlobalStatusTable, $this->searchGlobalStatusId, $this->box_id);

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
        $this->cart = $cart;

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

    private function searchableTools($tools, $searchQuery, $searchStatus, $searchMainCategory, $searchHalfCategory, $searchCategory, $searchGlobalStatusTable, $searchGlobalStatusId, $searchBox)
    {
        $query = $tools->when($searchQuery != '', function ($query) use ($searchQuery) {
            $query->where('title', 'like', '%' . $searchQuery . '%');
        })->when($searchStatus != '', function ($query) use ($searchStatus) {
            $query->where('status_tool_id', 'like', '%' . $searchStatus . '%');
        })->when($searchMainCategory != '', function ($query) use ($searchMainCategory) {
            $query->where('main_category_id', 'like', '%' . $searchMainCategory . '%');
        })->when($searchHalfCategory != '', function ($query) use ($searchHalfCategory) {
            $query->where('half_category_id', 'like', '%' . $searchHalfCategory . '%');
        })->when($searchCategory != '', function ($query) use ($searchCategory) {
            $query->where('category_id', 'like', '%' . $searchCategory . '%');
        })->when($searchGlobalStatusTable != '', function ($query) use ($searchGlobalStatusTable) {
            $query->where('status_table', $searchGlobalStatusTable);
        })->when($searchGlobalStatusId != '', function ($query) use ($searchGlobalStatusId) {
            $query->where('status_table_id', $searchGlobalStatusId);
        })->when($searchBox != '', function ($query) use ($searchBox) {
            $query->where('box_id', $searchBox);
        });

         if($this->is_new === 'dont_open_box')
         {
             return $query->where('box_id', $this->box_id)->orderBy($this->orderBy, $this->orderByType)->paginate($this->paginate);
         }

        return $query->orderBy($this->orderBy, $this->orderByType)->paginate($this->paginate);
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
            $status = app()->make(ToolsService::class)->addToolsToCart($item, $this->cart);
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
