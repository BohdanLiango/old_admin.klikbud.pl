<?php

namespace App\Http\Livewire\Warehouses\Tools;

use App\Data\ActionsData;
use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Helper\KlikbudFunctionsHelper;
use App\Http\Livewire\Warehouses\Warehouse;
use App\Services\Warehouses\ToolsService;
use Illuminate\Support\Str;

class ShowLivewire extends Warehouse
{
    public $tool = [], $status_tool, $get_data, $get_box;
    public $modal_info, $new_status_id, $old_status_id, $new_description, $old_description, $new_box_id, $old_box_id, $box_title;

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->clients(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $actions = app()->make(ActionsData::class)->warehouse_tool_one(1);
        $get_box = app()->make(ToolsService::class)->getBoxToForm();
        dd($this->old_box_id);
        $this->box_title = $this->old_box_id['title'];
        return view('livewire.warehouses.tools.show-livewire')
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title, 'actions' => $actions])
            ->section('content');
    }

    public function mount($slug)
    {
        $get_data = app()->make(ToolsService::class)->showOneBySlug($slug);
        $this->get_data = $get_data;
        $collect = collect($get_data);
        $this->tool['id'] = $collect->get('id');
        $this->tool['category_id'] = (!is_null($get_data->category)) ? $get_data->category->title : NULL;
        $this->tool['half_category_id'] = (!is_null($get_data->half_category)) ? $get_data->half_category->title : NULL;
        $this->tool['main_category_id'] = (!is_null($get_data->main_category)) ? $get_data->main_category->title : NULL;
        $this->tool['title'] = Str::title($collect->get('title'));
        $this->tool['description'] = Str::title($collect->get('description'));
        $this->tool['image'] = (!is_null($get_data->image)) ? $get_data->image->path : NULL;
        $this->tool['image_id'] = $collect->get('image_id');
        $this->old_box_id = (!is_null($get_data->box)) ? $get_data->box : NULL;
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
        $this->old_status_id =  $collect->get('status_tool_id');
        $this->new_status_id = $this->old_status_id;
        $this->old_description = $collect->get('status_description');
        $this->new_description = $this->old_description;

        $this->tool['user_add_first_name'] = (!is_null($get_data->user)) ? $get_data->user->name : NULL;
        $this->tool['user_add_last_name'] = (!is_null($get_data->user)) ? $get_data->user->surname : NULL;
        $this->tool['created_at'] =  date('d/m/Y', strtotime($collect->get('created_at')));
        $this->status_tool = collect(app()->make(DefaultData::class)->status_tools());
        $this->tool['slug'] =  $collect->get('slug');
    }

    public function selectModal($modal)
    {
        $this->modal_info = $modal;

        switch ($modal){
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
        }
    }

    public function clickRadio($value)
    {
        $this->new_status_id = $value;
    }

    public function changeStatus()
    {
        $this->validate([
            'new_status_id' => 'required|integer',
            'new_description' => 'nullable|max:65000'
        ]);
        $this->dispatchBrowserEvent('closeChangeStatusModal');

        if($this->new_status_id !== $this->old_status_id || $this->new_description !== $this->old_description)
        {
            $status = app()->make(ToolsService::class)->changeStatusTool($this->tool['id'], $this->new_status_id, $this->new_description);
        }else{
            $status = true;
        }
        $this->old_status_id = $this->new_status_id;
        $this->old_description = $this->new_description;
        $this->checkStatus($status, 'Yuppi', 'alert', true, 'top-end');
    }

    public function changeBox()
    {
        $this->validate([
            'new_box_id' => 'required|integer'
        ]);
        $this->dispatchBrowserEvent('closeChangeBoxModal');
        if($this->new_box_id !== $this->old_box_id)
        {
            $status = app()->make(ToolsService::class)->changeOneRecord($this->tool['id'], 'box_id', $this->new_box_id);
        }else{
            $status = true;
        }
        $this->old_box_id = $this->new_box_id;
        $this->checkStatus($status, 'Yuppi', 'alert', true, 'top-end');
    }
}
