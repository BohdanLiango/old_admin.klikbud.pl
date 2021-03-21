<?php

namespace App\Http\Livewire\Clients;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Models\Address;
use App\Services\Clients\ClientService;
use App\Services\Settings\Other\AddressService;

class AddLivewire extends ClientLivewire
{
    public $first_name = NULL, $last_name = NULL, $gender = NULL,
        $mobile = NULL, $email = NULL, $site = NULL;
    public $language_id = NULL, $timezone_id = NULL;
    public $email_check = NULL, $phone_check = NULL, $sms_check = NULL;
    public $street_id = NULL, $zip_code = NULL, $number_house = NULL, $number_flat = NULL, $add_info = NULL;

    public $company_check = false;


    public function render()
    {
        $language = app()->make(DefaultData::class)->language();
        $time_zone = app()->make(DefaultData::class)->time_zone();
        $client_communication = app()->make(DefaultData::class)->client_communication();
        $address_street = Address::where('type_id', 4)->select('id', 'title', 'town_id', 'state_id', 'country_id')->get();
        $client_gender = app()->make(DefaultData::class)->gender();
        $breadcrumbs = app()->make(BreadcrumbsData::class)->clients(2, [['key' => 2, 'link' => route('clients.add'), 'name' => trans('admin_klikbud/clients.title')]]);
        $page_title = $breadcrumbs[2]['name'];
        return view('livewire.clients.add-livewire', compact('language', 'time_zone', 'client_communication', 'address_street', 'client_gender'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    protected array $rules = [
        'first_name' => 'string|max:255|required',
        'last_name' => 'string|max:255|required',
        'gender' => 'integer|max:10|nullable',
        'mobile' => 'max:100|nullable',
        'email' => 'email|max:255|nullable',
        'site' => 'max:255|nullable',
        'language_id' => 'string|max:255|nullable',
        'timezone_id' => 'string|max:255|nullable',
        'email_check' => 'integer|max:10|nullable',
        'phone_check' => 'integer|max:10|nullable',
        'sms_check' => 'integer|max:10|nullable',
        'street_id' => 'integer|nullable',
        'zip_code' => 'max:255|nullable',
        'number_house' => 'max:255|nullable',
        'number_flat' => 'max:255|nullable',
        'add_info' => 'max:255|nullable'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    private function resetFields()
    {
        $first_name = NULL;
        $last_name = NULL;
        $gender = NULL;
        $mobile = NULL;
        $email = NULL;
        $site = NULL;
        $language_id = NULL;
        $timezone_id = NULL;
        $email_check = NULL;
        $phone_check = NULL;
        $sms_check = NULL;
        $street_id = NULL;
        $zip_code = NULL;
        $number_house = NULL;
        $number_flat = NULL;
        $add_info = NULL;
    }

    public function add_company()
    {
        $this->company_check = true;
    }

    public function store($type_store_id)
    {
        $this->validate();
        $mobile = array($this->mobile);
        $email = array($this->email);
        $language = array($this->language_id);
        $communication = array($this->email_check, $this->phone_check, $this->sms_check);
        if(!is_null($this->street_id))
        {
            $get_street_info = app()->make(AddressService::class)->showOneDataStreet($this->street_id);
            $country_id = $get_street_info->country_id;
            $state_id = $get_street_info->state_id;
            $town_id = $get_street_info->town_id;
        }else{
            $country_id = NULL;
            $state_id = NULL;
            $town_id = NULL;
        }

        $status = app()->make(ClientService::class)->store($this->first_name, $this->last_name, $this->gender, $mobile, $email, $this->site, $language, $this->timezone_id,
            $communication, $country_id, $state_id, $town_id,
            $this->street_id, $this->add_info, $this->zip_code, $this->number_house, $this->number_flat);
        $this->resetFields();
        $this->checkStatus($status, trans('admin_klikbud/clients.message_success'), 'flash', false, 'center');

        switch ($type_store_id){
            case 1:
                return redirect()->route('clients.show');
                break;
            case 2:
//                return redirect()->route('clients.add'); // To client profil
                break;
            case 3:
                return redirect()->route('clients.add');
                break;
        }
    }
}
