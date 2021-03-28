<?php

namespace App\Http\Livewire\Warehouses\Tools\Category;

use App\Data\BreadcrumbsData;
use App\Services\Warehouses\ToolsCategoryService;

class AddLivewire extends Category
{
    public $categories_show;
    public $title = NULL, $selected_main_category_id = NULL, $selected_half_category_id = NULL, $typeId;
    public $type_add_title = NULL;

    public function mount($id)
    {
        if((int)$id >= 4)
        {
            abort(403);
        }

        $this->typeId = $id;

        $this->type_add_title = $this->typeAddEditTitle($this->typeId);
    }

    public function render()
    {
        if((int)$this->typeId === 2 || (int)$this->typeId === 3)
        {
            if((int)$this->typeId === 2)
            {
                $type_id = 1;
            }elseif ((int)$this->typeId === 3){
                $type_id = 2;
            }else{
                abort(403);
            }

            $this->categories_show = app()->make(ToolsCategoryService::class)
                ->getDataWhereTypeIdTableId($type_id);
        }

        $breadcrumbs = app()->make(BreadcrumbsData::class)->tools_categories(3, [[
            'key' => 3, 'link' => route('warehouses.tools.categories.show'), 'name' => trans('admin_klikbud/warehouse/toolsCategory.add_edit.title_add') . ' ' . $this->typeAddEditTitle($this->typeId)
        ]]);
        $page_title = $breadcrumbs[3]['name'];

        return view('livewire.warehouses.tools.category.add-livewire')
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|max:255'
        ]);
        switch ($this->typeId){
            case 2:
                $this->validate([
                    'selected_main_category_id' => 'required|integer'
                ]);
                break;
            case 3:
                $this->validate([
                    'selected_half_category_id' => 'required|integer'
                ]);
                break;
        }

        $status = app()->make(ToolsCategoryService::class)->store($this->title, $this->selected_main_category_id,
            $this->selected_half_category_id, $this->typeId);
        $message =  trans('admin_klikbud/warehouse/toolsCategory.add_edit.alert_messages.success_add_part_1') . ' ' . $this->typeAddEditTitle($this->typeId) . ' ' . trans('admin_klikbud/warehouse/toolsCategory.add_edit.alert_messages.success_add_part_2');
        $this->checkStatus($status, $message, 'flash', false, 'center');
        return redirect()->route('warehouses.tools.categories.show');
    }
}
