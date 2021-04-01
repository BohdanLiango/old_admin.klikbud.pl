<?php

namespace App\Http\Livewire\Warehouses\Tools;

use App\Data\BreadcrumbsData;
use App\Http\Livewire\Warehouses\Warehouse;
use App\Services\Business\BusinessService;
use App\Services\Files\FilesDataService;
use App\Services\Warehouses\ToolsCategoryService;
use App\Services\Warehouses\ToolsService;
use Livewire\WithFileUploads;

class AddLivewire extends Warehouse
{
    public $main_category_check = false, $half_category_check = false, $categories_check = false;
    public $category_id_refresh, $category_half_refresh;
    public $tools, $half_categories, $categories, $image, $guarantee_file, $show_categories, $departments, $business;

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

    public function mount()
    {
        $this->show_categories = collect(app()->make(ToolsCategoryService::class)->getCategoriesToForms());
        $show_business = collect(app()->make(BusinessService::class)->getBusinessToForms());
        $this->departments = $show_business->where('type_id', 2);
        $this->business = $show_business->where('type_id', 1);
    }

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->clients(1, NULL);
        $page_title = $breadcrumbs[1]['name'];

        $collect_tools = collect($this->tools);
        $main_categories = $this->show_categories->where('type_id', 1);
        $this->getHalfCategories($collect_tools);
        $this->getCategories($collect_tools);

        return view('livewire.warehouses.tools.add-livewire', compact( 'main_categories'))
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

    public function store($id)
    {
        $this->validate();

        $store_id = app()->make(ToolsService::class)->store($this->tools);

        if($store_id !== false && !is_null($this->guarantee_file))
        {
            $store_file = $this->guarantee_file->store('/public/uploads/tools/' . uniqid('tools', true), config('klikbud.disk_store'));
            $file_id = app()->make(FilesDataService::class)->storeFileTools($store_file, $store_id, 'Guarantee file_' . $this->tools['title']);
            app()->make(ToolsService::class)->storeGuaranteeFile($store_id, $file_id);
        }

        if($store_id !== false && !is_null($this->image))
        {
            $store_image = $this->image->store('/public/uploads/tools/' . uniqid('tools', true), config('klikbud.disk_store'));
            $image_id = app()->make(FilesDataService::class)->storeImageTools($store_image, $store_id);
            app()->make(ToolsService::class)->storeImage($store_id, $image_id);
        }

        if(is_numeric($store_id))
        {
            $status = true;
        }else{
            $status = false;
        }

        $this->checkStatus($status, 'YUPPI', 'flash', false, 'center');
        return redirect()->route('warehouses.tools.show');
    }
}
