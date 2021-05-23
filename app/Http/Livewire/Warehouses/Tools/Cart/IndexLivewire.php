<?php

namespace App\Http\Livewire\Warehouses\Tools\Cart;

use App\Data\BreadcrumbsData;
use App\Services\Business\BusinessService;
use App\Services\Clients\ClientService;
use App\Services\Objects\ObjectsService;
use App\Services\Warehouses\ToolsService;
use App\Services\Warehouses\WarehousesService;
use Livewire\Component;

class IndexLivewire extends Component
{
    public $tools, $warehouses, $objects, $clients, $business, $register;


    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->tools(2, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $this->tools = app()->make(ToolsService::class)->getAllToolsWhereIdToCart();

        return view('livewire.warehouses.tools.cart.index-livewire')
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function mount(ToolsService $toolsService, WarehousesService $warehousesService,
                          ObjectsService $objectsService, ClientService $clientService, BusinessService $businessService)
    {
        //Start Data
        $this->warehouses = $warehousesService->selectToForms();
        $this->objects = $objectsService->selectObjectsToForms();
        $this->clients = $clientService->showClientSelectIdName();
        $this->business = $businessService->selectBusinessToForm();
        $this->register = $toolsService->getAllDataRegisterToTools();
        //End data
    }

}
