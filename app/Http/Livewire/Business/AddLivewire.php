<?php

namespace App\Http\Livewire\Business;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Services\Business\BusinessService;
use App\Services\Files\FilesDataService;
use App\Services\Settings\Other\AddressService;
use Livewire\WithFileUploads;

class AddLivewire extends Business
{
    public $business_data = NULL, $type_id = NULL, $type_id_store, $breadcrumbs_title;
    public $business;
    public $image;

    public $business_form_class = 9;

    use WithFileUploads;

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->business(2, [[
            'key' => 2, 'link' => route('business.add', $this->type_id), 'name' => trans('admin_klikbud/business.add_edit_form.breadcrumbs_title.form_add') . ' ' . $this->breadcrumbs_title
        ]]);
        $page_title = $breadcrumbs[2]['name'];
        $address_street = app()->make(AddressService::class)->selectAddressToGetData();
        $categories = app()->make(DefaultData::class)->categories_business();
        $business_form = app()->make(DefaultData::class)->form_business();

        if(!empty($this->business['business_form_id']))
        {
            if((int)$this->business['business_form_id'] === 99)
            {
                $this->business_form_class = 4;
            }else{
                $this->business_form_class = 9;
            }
        }
        return view('livewire.business.add-livewire', compact('address_street', 'categories', 'business_form'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function mount($type)
    {
        if($type !== 'business' || $type !== 'department')
        {
            $this->type_id = $type;

            $this->breadcrumbs_title = match ($type) {
                  'business' => trans('admin_klikbud/business.add_edit_form.breadcrumbs_title.business'),
                  'department' => trans('admin_klikbud/business.add_edit_form.breadcrumbs_title.departments')
            };

            $this->type_id_store = match ($type) {
                'business' => 1,
                'department' => 2,
            };

            if((int)$this->type_id_store === 2)
            {
                $this->business_data = app()->make(BusinessService::class)->getBusinessByTypeId(1);
            }
        }else{
            abort(403);
        }
    }

    public function store()
    {

        $collect_business= collect($this->business);

        if($collect_business->has('business_form_id'))
        {
            if((int)$collect_business['business_form_id'] === 99)
            {
                $this->validate([
                    'business.business_form_other' => 'required|max:255'
                ]);
            }

        }

        switch ($this->type_id){
            case 'business':
                $this->validate([
                    'business.title'  => 'required|max:255|unique:business_list,title',
                    'business.title_short'  => 'required|max:255|unique:business_list,title_short',
                    'business.business_form_id' => 'required|numeric',
                    'image' => 'nullable|image|max:256',
                    'business.is_manufacturer' => 'nullable|boolean',
                    'business.category_id' => 'required|numeric',
                    'business.street_id' => 'required|numeric',
                    'business.number' => 'nullable|max:255',
                    'business.apartment_number' => 'nullable|max:255',
                    'business.zip_code' => 'nullable|max:255',
                    'business.nip' => 'required|numeric|max:9999999999|unique:business_list,NIP',
                    'business.regon' => 'nullable|numeric|max:999999999|unique:business_list,REGON',
                    'business.bdo' => 'nullable|numeric|max:999999999|unique:business_list,BDO',
                    'business.email' => 'nullable|email|max:255',
                    'business.phone' => 'nullable|max:255',
                    'business.site' => 'nullable|max:255'
                ]);
                break;
            case 'department':
                $this->validate([
                    'business.title'  => 'required|max:255|unique:business_list,title',
                    'business.title_short'  => 'required|max:255|unique:business_list,title_short',
                    'business.category_id' => 'required|numeric',
                    'business.business_id' => 'required|numeric',
                    'business.street_id' => 'required|numeric',
                    'business.number' => 'nullable|max:255',
                    'business.apartment_number' => 'nullable|max:255',
                    'business.zip_code' => 'nullable|max:255',
                    'business.email' => 'nullable|email|max:255',
                    'business.phone' => 'nullable|max:255',
                    'business.site' => 'nullable|max:255'
                ]);
                break;
        }

        $store_id = app()->make(BusinessService::class)->store($this->type_id_store, $this->business);

        $message = $this->business['title'] . ' ' . trans('admin_klikbud/business.add_edit_form.messages.store_1');

        if($store_id !== false && !is_null($this->image))
        {
            $store_image = $this->image->store('/public/uploads/business/' . uniqid('business', false), config('klikbud.disk_store'));
            $image_id = app()->make(FilesDataService::class)->storeBusiness($store_image, $store_id);
            $store_image_to_business = app()->make(BusinessService::class)->store_image($store_id, $image_id);
            $this->checkStatus($store_image_to_business, $message, 'flash', false, 'center');
            return redirect()->route('business.show');
        }

        if(is_numeric($store_id))
        {
            $status = true;
        }else{
            $status = false;
        }

        $this->checkStatus($status, $message, 'flash', false, 'center');
        return redirect()->route('business.show');
    }
}
