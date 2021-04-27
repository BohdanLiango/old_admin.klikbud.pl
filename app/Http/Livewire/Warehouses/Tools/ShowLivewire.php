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

class ShowLivewire extends Warehouse
{
    public $tool = [], $status_tool_data, $get_data, $get_box, $new_box, $new_status,
        $new_status_description, $warehouses, $clients, $objects, $business, $global_status_id, $get_global_status_table = '', $get_global_status_table_id = '';
    public $new_global_status_id = '';
    public $modal_info;

    public function render()
    {
        //Subheader data
        $breadcrumbs = app()->make(BreadcrumbsData::class)->tools(2, [[
            'key' => 2, 'link' => route('warehouses.tools.one', $this->tool['slug']), 'name' => $this->tool['title']
        ]]);
        $page_title = $breadcrumbs[2]['name'];
        $actions = app()->make(ActionsData::class)->warehouse_tool_one(1);
        //End subheader data
        //Start dynamic status
        $this->get_global_status_table = $this->get_data->status_table;
        $this->get_global_status_table_id = $this->get_data->status_table_id;
        //End dynamic status
        $this->warehouses = app()->make(WarehousesService::class)->selectToForms();
        $this->clients = app()->make(ClientService::class)->showClientSelectIdName();
        $this->objects = app()->make(ObjectsService::class)->selectObjectsToForms();
        $this->business = app()->make(BusinessService::class)->selectBusinessToForm();
        $this->new_data();//Dynamic data

        return view('livewire.warehouses.tools.show-livewire')
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title, 'actions' => $actions])
            ->section('content');
    }

    public function mount($slug)
    {
        $get_data = app()->make(ToolsService::class)->showOneBySlug($slug);
        $this->get_data = $get_data;
        $collect = collect($get_data);
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
        $this->status_tool_data = collect(app()->make(DefaultData::class)->status_tools());
        $this->tool['slug'] =  $collect->get('slug');
        $this->tool['status_tool_id'] = $collect->get('status_tool_id');
        $this->tool['status_description'] = $collect->get('status_description');
        $this->tool['box_id'] = (!is_null($this->get_data->box_id)) ? $this->get_data->box_id : NULL;
        $this->get_box = app()->make(ToolsService::class)->getBoxToForm();
    }

    public function new_data()
    {
        if(is_null($this->new_box))
        {
            $this->new_box = $this->tool['box_id'];
        }

        if(is_null($this->new_status))
        {
            $this->new_status = $this->tool['status_tool_id'];
        }

        if(is_null($this->new_status_description))
        {
            $this->new_status_description = $this->tool['status_description'];
        }
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
                if($this->get_global_status_table === config('klikbud.status_tools_table.warehouse'))
                {
                    $this->new_global_status_id = $this->get_global_status_table_id;
                }
                $this->dispatchBrowserEvent('openChangeGlobalStatusWarehouseModal');
                break;
            case 'closeChangeWarehouse':
                $this->dispatchBrowserEvent('closeChangeGlobalStatusWarehouseModal');
                break;

            case 'changeClient':
                if($this->get_global_status_table === config('klikbud.status_tools_table.client'))
                {
                    $this->new_global_status_id = $this->get_global_status_table_id;
                }
                $this->dispatchBrowserEvent('openChangeGlobalStatusModalClients');
                break;
            case 'closeChangeClient':
                $this->dispatchBrowserEvent('closeChangeGlobalStatusModalClients');
                break;

            case 'changeObject':
                if($this->get_global_status_table === config('klikbud.status_tools_table.object'))
                {
                    $this->new_global_status_id = $this->get_global_status_table_id;
                }
                $this->dispatchBrowserEvent('openChangeGlobalStatusModalObjects');
                break;
            case 'closeChangeObject':
                $this->dispatchBrowserEvent('closeChangeGlobalStatusModalObjects');
                break;

            case 'changeBusiness':
                if($this->get_global_status_table === config('klikbud.status_tools_table.business'))
                {
                    $this->new_global_status_id = $this->get_global_status_table_id;
                }
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
            'new_global_status_id' => 'required|integer'
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

       if((int)$this->new_global_status_id !== (int)$this->get_global_status_table_id and $table !== $this->get_global_status_table )
       {
           $status = app()->make(ToolsService::class)->storeOrUpdateGlobalData($this->tool['id'], $table, $this->new_global_status_id);
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
        if($this->new_box !== $this->tool['box_id'])
        {
            $status = app()->make(ToolsService::class)->changeOneRecord($this->tool['id'], 'box_id', $this->new_box);
            app()->make(ToolsService::class)->storeRegister($this->tool['id'], 'box_id', $this->new_box, 1);
            $this->status_box_change = 1;
        }else{
            $status = false;
        }
        $this->checkStatus($status, trans('admin_klikbud/warehouse/tools.one.messages.box_change'), 'alert', true, 'top-end');
    }

    public function deleteBox()
    {
        if($this->new_box !== NULL)
        {
            $status = app()->make(ToolsService::class)->changeOneRecord($this->tool['id'], 'box_id', NULL);
            app()->make(ToolsService::class)->storeRegister($this->tool['id'], 'box_id', NULL, 2);
        }else{
            $status = false;
        }

        $this->checkStatus($status, trans('admin_klikbud/warehouse/tools.one.messages.box_change_delete'), 'alert', true, 'top-end');
        return redirect()->route('warehouses.tools.one', $this->tool['slug']);
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
