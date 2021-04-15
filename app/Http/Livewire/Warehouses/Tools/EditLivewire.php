<?php

namespace App\Http\Livewire\Warehouses\Tools;

use App\Data\BreadcrumbsData;
use App\Helper\KlikbudFunctionsHelper;
use App\Http\Livewire\Warehouses\Warehouse;
use App\Services\Business\BusinessService;
use App\Services\Files\FilesDataService;
use App\Services\Warehouses\ToolsCategoryService;
use App\Services\Warehouses\ToolsService;
use Livewire\WithFileUploads;

class EditLivewire extends Warehouse
{
    public $main_category_check = false, $half_category_check = false, $categories_check = false;
    public $category_id_refresh, $category_half_refresh;
    public $tools, $half_categories, $categories, $image, $guarantee_file, $show_categories, $departments, $business, $oldFiles;

    use WithFileUploads;

    protected $rules = [
        'tools.category_id' => 'nullable|integer',
        'tools.half_category_id' => 'nullable|integer',
        'tools.main_category_id' => 'required|integer',
        'tools.title' => 'required|max:255',
        'tools.description' => 'nullable|max:65000',
        'image' => 'nullable|image|max:512',
        'tools.purchase_date' => 'nullable|date_format:d/m/Y',
        'tools.price' => 'nullable|numeric',
        'tools.is_box' => 'nullable|boolean',
        'tools.serial_number' => 'nullable|max:255',
        'tools.business_departments_id' => 'nullable|integer',
        'tools.manufacturer_id' => 'nullable|integer',
        'tools.guarantee_date_end' => 'nullable|date_format:d/m/Y',
        'guarantee_file' => 'nullable|file|mimes:pdf'
    ];

    public function mount($slug)
    {
        $this->show_categories = collect(app()->make(ToolsCategoryService::class)->getCategoriesToForms());
        $show_business = collect(app()->make(BusinessService::class)->getBusinessToForms());
        $this->departments = $show_business->where('type_id', 2);
        $this->business = $show_business->where('type_id', 1);
        $get_data = app()->make(ToolsService::class)->showOneBySlug($slug);
        $collections = collect($get_data);
        $this->oldFiles = $get_data;
        $this->tools['id'] = $collections->get('id');
        $this->tools['title'] = $collections->get('title');
        $this->tools['is_box'] = $collections->get('is_box');
        $this->tools['main_category_id'] = $collections->get('main_category_id');
        $this->tools['half_category_id'] = $collections->get('half_category_id');
        $this->tools['category_id'] = $collections->get('category_id');
        $this->tools['purchase_date'] = app()->make(KlikbudFunctionsHelper::class)->changeFormatDataToShow($collections->get('purchase_date'));
        $this->tools['price'] = $collections->get('price');
        $this->tools['serial_number'] = $collections->get('serial_number');
        $this->tools['business_departments_id'] = $collections->get('business_departments_id');
        $this->tools['manufacturer_id'] = $collections->get('manufacturer_id');
        $this->tools['guarantee_date_end'] = app()->make(KlikbudFunctionsHelper::class)->changeFormatDataToShow($collections->get('guarantee_date_end'));
        $this->tools['description'] = $collections->get('description');
        $this->tools['slug'] = $collections->get('slug');
        $this->tools['old_image_id'] = $collections->get('image_id');
        $this->tools['old_guarantee_file_id'] = $collections->get('guarantee_file_id');
    }

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->tools(3, [
            ['key' => 2, 'link' => route('warehouses.tools.one', $this->tools['slug']), 'name' => $this->tools['title']],
            ['key' => 3, 'link' => route('warehouses.tools.edit', $this->tools['slug']), 'name' => trans('admin_klikbud/warehouse/tools.add_edit.edit_title')]
        ]);
        $page_title = $breadcrumbs[3]['name'];
        $collect_tools = collect($this->tools);
        $main_categories = $this->show_categories->where('type_id', 1);
        $this->getHalfCategories($collect_tools);
        $this->getCategories($collect_tools);
        return view('livewire.warehouses.tools.edit-livewire', compact( 'main_categories'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    private function getHalfCategories($collect_tools)
    {
        if($collect_tools->has('main_category_id'))
        {
            $this->half_categories = $this->show_categories->where('type_id', 2)->where('main_category_id', ((int)$this->tools['main_category_id']));

            if(count($this->half_categories) !== 0)
            {
                $this->half_category_check = true;

            }else{
                $this->half_category_check = false;
            }
        }
    }

    private function getCategories($collect_tools)
    {
        if($collect_tools->has('half_category_id'))
        {
            $this->categories = $this->show_categories->where('type_id', 3)->where('half_category_id', ((int)$this->tools['half_category_id']));

            if(count($this->categories) !== 0)
            {
                $this->categories_check = true;

            }else{
                $this->categories_check = false;
            }
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        $status = app()->make(ToolsService::class)->update($this->tools['id'], $this->tools);

        if(!is_null($this->guarantee_file))
        {
            $store_file = $this->guarantee_file->store('/public/uploads/tools/' . uniqid('tools', true), config('klikbud.disk_store'));
            $file_id = app()->make(FilesDataService::class)->updateFileTools($store_file,  $this->tools['old_guarantee_file_id'], $this->tools['id'], 'Guarantee file_' . $this->tools['title']);
            app()->make(ToolsService::class)->storeGuaranteeFile($this->tools['id'], $file_id);
        }

        if(!is_null($this->image))
        {
            $store_image = $this->image->store('/public/uploads/tools/' . uniqid('tools', true), config('klikbud.disk_store'));
            $image_id = app()->make(FilesDataService::class)->updateImageTool($store_image, $this->tools['old_image_id'], $this->tools['id']);
            app()->make(ToolsService::class)->storeImage($this->tools['id'], $image_id);
        }

        $message = trans('admin_klikbud/warehouse/tools.add_edit.message.edit_form_1') . ' ' . $this->tools['title'] . ' ' . trans('admin_klikbud/warehouse/tools.add_edit.message.edit_form_2');
        $this->checkStatus($status, $message, 'flash', false, 'center');
        return redirect()->route('warehouses.tools.one', $this->tools['slug']);
    }
}
