<?php

namespace App\Http\Livewire\Warehouses\Tools;

use App\Data\ActionsData;
use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Helper\KlikbudFunctionsHelper;
use App\Http\Livewire\Warehouses\Warehouse;
use App\Services\Business\BusinessService;
use App\Services\Clients\ClientService;
use App\Services\Objects\ObjectsService;
use App\Services\Warehouses\ToolsService;
use App\Services\Warehouses\WarehousesService;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class ShowLivewire extends Warehouse
{
    use WithPagination;

    public $slug, $modal_info;

    public $tool = [], $status_tool_data, $get_box, $warehouses, $clients, $objects, $business; //DATA

    public $new_global_status_table, $new_global_status_table_id, $new_box, $new_status, $new_status_description;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {

        $get_data = app()->make(ToolsService::class)->showOneBySlug($this->slug);
        $collect = collect($get_data);
        $this->creatorData($get_data, $collect);
        //Subheader data
        $breadcrumbs = app()->make(BreadcrumbsData::class)->tools(2, [[
            'key' => 2, 'link' => route('warehouses.tools.one', $this->tool['slug']), 'name' => $this->tool['title']
        ]]);
        $page_title = $breadcrumbs[2]['name'];
        $actions = app()->make(ActionsData::class)->warehouse_tool_one(1);
        //End subheader data

        $this->warehouses = app()->make(WarehousesService::class)->selectToForms();
        $this->clients = app()->make(ClientService::class)->showClientSelectIdName();
        $this->objects = app()->make(ObjectsService::class)->selectObjectsToForms();
        $this->business = app()->make(BusinessService::class)->selectBusinessToForm();
        $this->status_tool_data = collect(app()->make(DefaultData::class)->status_tools());
        $this->get_box = app()->make(ToolsService::class)->getBoxToForm();
        $register_status_global = app()->make(ToolsService::class)->getRegisterData($this->tool['id'], 6);

        return view('livewire.warehouses.tools.show-livewire', compact('register_status_global'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title, 'actions' => $actions])
            ->section('content');
    }


    private function creatorData($get_data, $collect)
    {
        /**
         * GET STATIC DATA
         */
        $this->tool['id'] = $collect->get('id');
        $this->tool['category_id'] = (!is_null($get_data->category)) ? $get_data->category->title : NULL;
        $this->tool['half_category_id'] = (!is_null($get_data->half_category)) ? $get_data->half_category->title : NULL;
        $this->tool['main_category_id'] = (!is_null($get_data->main_category)) ? $get_data->main_category->title : NULL;
        $this->tool['title'] = Str::title($collect->get('title'));
        $this->tool['description'] = Str::title($collect->get('description'));
        $this->tool['image'] = (!is_null($get_data->image)) ? $get_data->image->path : NULL;
        $this->tool['image_id'] = $collect->get('image_id');
        $this->tool['purchase_date'] =  date('d/m/Y', strtotime($collect->get('purchase_date')));
        $this->tool['price'] = $collect->get('price');
        $this->tool['serial_number'] = $collect->get('serial_number');
        $this->tool['business_departments_id'] = (!is_null($get_data->business_department)) ? $get_data->business_department->title : NULL;
        $this->tool['business_departments_id_business_slug'] = (!is_null($get_data->business_department)) ? $get_data->business_department->business->slug : NULL;
        $this->tool['manufacturer_id'] = (!is_null($get_data->manufacturer)) ? app()->make(KlikbudFunctionsHelper::class)
            ->changeTitleBusinessToEndFirmClassification($get_data->manufacturer->title, $get_data->manufacturer->business_form_id, $get_data->manufacturer->business_form_other) : NULL;
        $this->tool['manufacturer_slug'] = (!is_null($get_data->manufacturer)) ? $get_data->manufacturer->slug : NULL;
        $this->tool['guarantee_date_end'] =  date('d/m/Y', strtotime($collect->get('guarantee_date_end')));
        $this->tool['guarantee_file'] = (!is_null($get_data->guarantee_file)) ? $get_data->guarantee_file->path : NULL;
        $this->tool['guarantee_file_id'] = $collect->get('guarantee_file_id');
        $this->tool['user_add_first_name'] = (!is_null($get_data->user)) ? $get_data->user->name : NULL;
        $this->tool['user_add_last_name'] = (!is_null($get_data->user)) ? $get_data->user->surname : NULL;
        $this->tool['created_at'] =  date('d/m/Y', strtotime($collect->get('created_at')));
        $this->tool['slug'] =  $collect->get('slug');
        $this->tool['is_box'] = $collect->get('is_box');
        /**
         * END STATIC DATA
         */
        $this->tool['status_tool_id'] = $collect->get('status_tool_id');
        $this->tool['status_description'] = $collect->get('status_description');
        $this->tool['box_id'] = (!is_null($get_data->box_id)) ? $get_data->box_id : NULL;
        $this->tool['status_table'] = (!is_null($get_data->status_table)) ? $get_data->status_table : NULL;
        $this->tool['status_table_id'] = (!is_null($get_data->status_table_id)) ? $get_data->status_table_id : NULL;
    }

    public function selectModal($modal)
    {
        $this->modal_info = $modal;

        switch ($modal){
            case 'openDeleteModal':
                $this->dispatchBrowserEvent('openDeleteModal');
                break;
            case 'closeDeleteModal':
                $this->dispatchBrowserEvent('closeDeleteModal');
                break;


            case 'changeStatus':
                $this->dispatchBrowserEvent('openChangeStatusModal');
                break;
            case 'closeChangeStatus':
                $this->dispatchBrowserEvent('closeChangeStatusModal');
                break;
            case 'changeBox':
                $this->dispatchBrowserEvent('openChangeBoxModal');
                break;
            case 'closeChangeBox':
                $this->dispatchBrowserEvent('closeChangeBoxModal');
                break;

            case 'changeWarehouse':
                $this->dispatchBrowserEvent('openChangeGlobalStatusWarehouseModal');
                break;
            case 'closeChangeWarehouse':
                $this->dispatchBrowserEvent('closeChangeGlobalStatusWarehouseModal');
                break;

            case 'changeClient':
                $this->dispatchBrowserEvent('openChangeGlobalStatusModalClients');
                break;
            case 'closeChangeClient':
                $this->dispatchBrowserEvent('closeChangeGlobalStatusModalClients');
                break;

            case 'changeObject':
                $this->dispatchBrowserEvent('openChangeGlobalStatusModalObjects');
                break;
            case 'closeChangeObject':
                $this->dispatchBrowserEvent('closeChangeGlobalStatusModalObjects');
                break;

            case 'changeBusiness':
                $this->dispatchBrowserEvent('openChangeGlobalStatusModalBusiness');
                break;
            case 'closeChangeBusiness':
                $this->dispatchBrowserEvent('closeChangeGlobalStatusModalBusiness');
                break;
        }
    }

    public function clickRadio($value)
    {
        $this->new_status = $value;
    }

    public function changeGlobalStatus()
    {
        $this->validate([
            'new_global_status_table_id' => 'required|integer'
        ]);

        $table = NULL;
        $message = NULL;

       switch ($this->modal_info){
           case ('changeWarehouse'):
               $message = trans('admin_klikbud/warehouse/tools.one.messages.warehouse_change');
               $table = config('klikbud.status_tools_table.warehouse');
               $this->selectModal('closeChangeWarehouse');
               break;
           case ('changeClient'):
               $message = trans('admin_klikbud/warehouse/tools.one.messages.client_change');
               $table = config('klikbud.status_tools_table.client');
               $this->selectModal('closeChangeClient');
               break;
           case ('changeObject'):
               $message = trans('admin_klikbud/warehouse/tools.one.messages.object_change');
               $table = config('klikbud.status_tools_table.object');
               $this->selectModal('closeChangeObject');
               break;
           case ('changeBusiness'):
               $message = trans('admin_klikbud/warehouse/tools.one.messages.business_change');
               $table = config('klikbud.status_tools_table.business');
               $this->selectModal('closeChangeBusiness');
               break;
       }

       if((int)$this->new_global_status_table_id !== (int)$this->tool['status_table_id'])
       {
           $status = app()->make(ToolsService::class)->storeOrUpdateGlobalData($this->tool['id'], $table, $this->new_global_status_table_id);
       }else{
           $status = true;
       }
        $this->checkStatus($status, $message, 'alert', true, 'top-end');
    }


    public function changeStatus()
    {
        $this->validate([
            'new_status' => 'required|integer',
            'new_status_description' => 'nullable|max:65000'
        ]);
        $this->dispatchBrowserEvent('closeChangeStatusModal');

        if($this->new_status !== $this->tool['status_tool_id'] || $this->new_status_description !== $this->tool['status_description'])
        {
            $status = app()->make(ToolsService::class)->changeStatusTool($this->tool['id'], $this->new_status, $this->new_status_description);
        }else{
            $status = true;
        }
        $this->checkStatus($status, trans('admin_klikbud/warehouse/tools.one.messages.status_change'), 'alert', true, 'top-end');
    }

    public function changeBox()
    {
        $this->validate([
            'new_box' => 'required|integer'
        ]);
        $this->dispatchBrowserEvent('closeChangeBoxModal');
        if($this->new_box !== $this->tool['box_id'] and !is_null($this->new_box))
        {
            if(!is_null($this->tool['box_id']))
            {
                app()->make(ToolsService::class)->updateRegisterToStatusDisable($this->tool['id'], config('klikbud.status_tools_table.box'), $this->tool['box_id']);
            }
            $status = app()->make(ToolsService::class)->changeOneRecord($this->tool['id'], config('klikbud.status_tools_table.box'), $this->new_box);
            app()->make(ToolsService::class)->storeRegister($this->tool['id'], config('klikbud.status_tools_table.box'), $this->new_box, 1);
        }else{
            $status = false;
        }
        $this->checkStatus($status, trans('admin_klikbud/warehouse/tools.one.messages.box_change'), 'alert', true, 'top-end');

    }

    public function deleteBox()
    {
        if($this->tool['box_id'] !== NULL)
        {
            $status = app()->make(ToolsService::class)->changeOneRecord($this->tool['id'], 'box_id', NULL);
            app()->make(ToolsService::class)->updateRegisterToStatusDisable($this->tool['id'], config('klikbud.status_tools_table.box'), $this->tool['box_id']);
        }else{
            $status = false;
        }

        $this->checkStatus($status, trans('admin_klikbud/warehouse/tools.one.messages.box_change_delete'), 'alert', true, 'top-end');
    }

    public function delete()
    {
        $status = app()->make(ToolsService::class)->delete($this->tool['id']);
        $this->selectModal('closeDeleteModal');
        $message = trans('admin_klikbud/warehouse/tools.one.messages.delete_1') . ' ' . $this->tool['title'] . ' ' . trans('admin_klikbud/warehouse/tools.one.messages.delete_2');
        $this->checkStatus($status, $message, 'flash', false, 'center');
        return redirect()->route('warehouses.tools.show');
    }
}
