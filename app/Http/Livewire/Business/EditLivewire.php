<?php

namespace App\Http\Livewire\Business;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Services\Business\BusinessService;
use App\Services\Files\FilesDataService;
use App\Services\Settings\Other\AddressService;
use Livewire\WithFileUploads;

class EditLivewire extends Business
{
    public $business_data = NULL, $type_id = NULL, $type_id_update;
    public $business, $business_id, $old_business_data, $business_slug;
    public $image, $oldImage;

    public $business_form_class = 9;

    use WithFileUploads;

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->clients(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
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
        return view('livewire.business.edit-livewire', compact('address_street', 'categories', 'business_form'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function mount($slug)
    {
        $get_data = app()->make(BusinessService::class)->getDataOneBySlug($slug);
        $type = $get_data->type_id;
        $this->type_id_update = $type;
        if((int)$type === 1 || (int)$type === 2)
        {
            $this->type_id = match ($type) {
                1 => 'business',
                2 => 'department'
            };

            if((int)$type === 2)
            {
                $this->business_data = app()->make(BusinessService::class)->getBusinessByTypeId(1);
            }
            $this->business_slug = $slug;
            $this->old_business_data = $get_data;
            $this->business_id = $get_data->id;
            $this->oldImage = $get_data->image_id;
            $this->business['title'] = $get_data->title;
            $this->business['title_short'] = $get_data->title_short;
            $this->business['business_form_id'] = $get_data->business_form_id;
            $this->business['business_form_other'] = $get_data->business_form_other;
            $this->business['is_manufacturer'] = $get_data->is_manufacturer;
            $this->business['description'] = $get_data->description;
            $this->business['category_id'] = $get_data->category_id;
            $this->business['street_id'] = $get_data->street_id;
            $this->business['number'] = $get_data->number;
            $this->business['apartment_number'] = $get_data->apartment_number;
            $this->business['zip_code'] = $get_data->zip_code;
            $this->business['nip'] = $get_data->NIP;
            $this->business['regon'] = $get_data->REGON;
            $this->business['bdo'] = $get_data->BDO;
            $this->business['email'] = $get_data->email;
            $this->business['phone'] = $get_data->phone;
            $this->business['site'] = $get_data->site;
            $this->business['business_id'] = $get_data->business_id;
        }else{
            abort(403);
        }
    }

    private function validateBusiness()
    {
        return $this->validate([
            'business.title'  => 'required|max:255|unique:business_list,title,' . $this->business_id,
            'business.title_short'  => 'required|max:255|unique:business_list,title_short,' . $this->business_id,
            'business.business_form_id' => 'required|numeric',
            'business.is_manufacturer' => 'nullable|boolean',
            'business.category_id' => 'required|numeric',
            'business.street_id' => 'required|numeric',
            'business.number' => 'nullable|max:255',
            'business.apartment_number' => 'nullable|max:255',
            'business.zip_code' => 'nullable|max:255',
            'business.nip' => 'required|numeric|max:9999999999|unique:business_list,NIP,' . $this->business_id,
            'business.regon' => 'nullable|numeric|max:999999999|unique:business_list,REGON,' . $this->business_id,
            'business.bdo' => 'nullable|numeric|max:999999999|unique:business_list,BDO,' . $this->business_id,
            'business.email' => 'nullable|email|max:255',
            'business.phone' => 'nullable|max:255',
            'business.site' => 'nullable|max:255'
        ]);
    }

    private function validateDepartments()
    {
        return $this->validate([
            'business.title'  => 'required|max:255|unique:business_list,title,'  . $this->business_id,
            'business.title_short'  => 'required|max:255|unique:business_list,title_short,'  . $this->business_id,
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
    }


    public function edit()
    {
        if($this->type_id === 'business')
        {
            if($this->image === null || $this->image === "")
            {
                $this->validateBusiness();
            }else{
                $this->validateBusiness();
                $this->validate([
                    'image' => 'nullable|image|max:256',
                ]);
                $store_image = $this->image->store('/public/uploads/business/' . uniqid('business', false), config('klikbud.disk_store'));
                $image_id = app()->make(FilesDataService::class)->updateBusiness($store_image, $this->oldImage, $this->business_id);
                app()->make(BusinessService::class)->store_image($this->business_id, $image_id);
            }

        }else{
            $this->validateDepartments();
        }

        $status = app()->make(BusinessService::class)->update($this->business_id, $this->type_id_update, $this->business);
        $this->checkStatus($status, 'Yuppi', 'flash', false, 'center');
        return redirect()->route('business.one', $this->business_slug);
    }
}
