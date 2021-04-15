<?php

namespace App\Http\Livewire\Warehouses\Tools\Category;

use App\Data\BreadcrumbsData;
use App\Services\Warehouses\ToolsCategoryService;

class EditLivewire extends Category
{
    public $main_categories = NULL, $half_categories = NULL;
    public $editId = NULL, $typeId = NULL, $title = NULL, $oldTitle = NULL, $selected_half_category_id = NULL, $selected_main_category_id = NULL;
    public $typeEditTitle = NULL;
    public $categories_show;

    public function mount($id)
    {
        $get_data = app()->make(ToolsCategoryService::class)->findOneById($id);
        $this->typeId = $get_data->type_id;
        $this->typeEditTitle = $this->typeAddEditTitle($this->typeId);
        $this->oldTitle = $get_data->title;
        $this->selected_half_category_id = $get_data->half_category_id;
        $this->selected_main_category_id = $get_data->main_category_id;
        $this->title = $this->oldTitle;
        $this->editId = $id;
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
            'key' => 3, 'link' => route('warehouses.tools.categories.show'), 'name' => trans('admin_klikbud/warehouse/toolsCategory.add_edit.title_edit') . ' ' .
                $this->typeAddEditTitle($this->typeId) . ' ' . $this->oldTitle
        ]]);
        $page_title = $breadcrumbs[3]['name'];

        return view('livewire.warehouses.tools.category.edit-livewire')
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function update()
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

        $status = app()->make(ToolsCategoryService::class)->update($this->editId, $this->title,
            $this->selected_main_category_id, $this->selected_half_category_id, $this->typeId);

        $this->checkStatus($status, trans('admin_klikbud/warehouse/toolsCategory.add_edit.alert_messages.success_edit_part_1'), 'flash', false, 'center');
        return redirect()->route('warehouses.tools.categories.show');
    }
}
