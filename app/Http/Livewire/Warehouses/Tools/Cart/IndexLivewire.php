<?php

namespace App\Http\Livewire\Warehouses\Tools\Cart;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Services\Business\BusinessService;
use App\Services\Clients\ClientService;
use App\Services\Objects\ObjectsService;
use App\Services\Warehouses\ToolsService;
use App\Services\Warehouses\WarehousesService;
use Livewire\Component;

class IndexLivewire extends Component
{
    public $tools, $warehouses, $objects, $clients, $business, $register, $status, $cart;
    public $modal_info, $modal_value;

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->tools(2, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $this->tools = app()->make(ToolsService::class)->getAllToolsWhereIdToCart();
        $this->cart = app()->make(ToolsService::class)->getLastActiveCart();

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
        $this->status = app()->make(DefaultData::class)->status_tools();
        //End data
    }

    public function deleteItem($key)
    {
        $getItems = $this->cart->items;

        if (($key = array_search($key, $getItems)) !== false) {
            unset($getItems[$key]);
        }
        app()->make(ToolsService::class)->deleteItemsCart($this->cart->id, $getItems);

    }

    public function selectModal($modal)
    {
        $this->modal_info = $modal;

        switch ($modal){

            case 'openWarehouseModal':
                $this->dispatchBrowserEvent('openWarehouseModal');
                break;

            case 'closeWarehouseModal':
                $this->dispatchBrowserEvent('closeWarehouseModal');
                break;

            case 'openObjectModal':
                $this->dispatchBrowserEvent('openObjectModal');
                break;
            case 'closeObjectModal':
                $this->dispatchBrowserEvent('closeObjectModal');
                break;
            case 'openClientsModal':
                $this->dispatchBrowserEvent('openClientsModal');
                break;
            case 'closeClientsModal':
                $this->dispatchBrowserEvent('closeClientsModal');
                break;
            case 'openBusinessModal':
                $this->dispatchBrowserEvent('openBusinessModal');
                break;
            case 'closeBusinessModal':
                $this->dispatchBrowserEvent('closeBusinessModal');
                break;
        }
    }

    public function changePlace($type_place)
    {
        $this->validate([
            'modal_value' => 'required'
        ]);
//        $items = $this->cart->items;
        $items2 = $this->tools;

        app()->make(ToolsService::class)->changePlaceCartItems($items2, $type_place, $this->modal_value);



    }

}
