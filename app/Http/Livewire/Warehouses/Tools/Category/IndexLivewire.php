<?php

namespace App\Http\Livewire\Warehouses\Tools\Category;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Services\Warehouses\ToolsCategoryService;
use Livewire\WithPagination;

class IndexLivewire extends Category
{
    public $searchQuery = '', $searchType = '', $searchMain = '',
        $searchHalf = '', $orderBy = 'DESC', $orderByTable = 'id', $paginate = 20;

    public $id_category = NULL;
    public $main_categories = NULL, $half_categories = NULL;
    public $class_change = 4;
    public $deleteTitle = NULL, $deleteCategoryTitle = NULL;

    use WithPagination;

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->tools_categories(2, NULL);
        $page_title = $breadcrumbs[2]['name'];
        $types = app()->make(DefaultData::class)->tools_categories_types();

        $countable = app()->make(ToolsCategoryService::class)->selectOneTableGet('type_id');

        if(!is_null($countable))
        {
            $count_types = array();

            foreach ($types as $type)
            {
                $count_types[] = $countable->where('type_id', $type['value'])->count();
            }
        }else{
            $count_types = NULL;
        }


        $this->main_categories = app()->make(ToolsCategoryService::class)->getDataWhereTypeIdTableId(1);

        if($this->searchMain !== '')
        {
            $this->class_change = 3;
            $this->half_categories = app()->make(ToolsCategoryService::class)->searchHalfCategories((int)$this->searchMain);
        }

        if($this->searchMain === '')
        {
            $this->class_change = 4;
            $this->searchHalf = '';
        }

        $categories = app()->make(ToolsCategoryService::class)->showAll($this->searchQuery, $this->searchType,
            $this->searchMain, $this->searchHalf, $this->orderBy, $this->orderByTable, $this->paginate);

        return view('livewire.warehouses.tools.category.index-livewire', compact('types', 'categories', 'count_types'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function resetFields()
    {
        $this->dispatchBrowserEvent('closeDeleteModal');
        $this->id_category = NULL;
        $this->deleteTitle = NULL;
        $this->deleteCategoryTitle = NULL;
    }

    public function selectItem($itemId, $action)
    {
        $get_data = app()->make(ToolsCategoryService::class)->findOneById($itemId);

        if($action === 'delete')
        {
            $this->id_category = $itemId;
            $this->deleteTitle = $get_data->title;
            $this->deleteCategoryTitle = $this->typeAddEditTitle($get_data->type_id);
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function delete()
    {
        $status = app()->make(ToolsCategoryService::class)->delete($this->id_category);
        $this->resetFields();
        $this->checkStatus($status, trans('admin_klikbud/warehouse/toolsCategory.index.alert_messages.delete_success'), 'alert', true, 'top-end');
    }
}
