<?php

namespace App\Http\Livewire\Clients;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Models\Address;
use App\Models\Clients\Clients;
use App\Services\Clients\ClientService;
use App\Services\Settings\Other\AddressService;

class EditLivewire extends ClientLivewire
{
    public $first_name = NULL, $last_name = NULL, $gender = NULL, $site = NULL;
    public $timezone_id = NULL;
    public $street_id = NULL, $zip_code = NULL, $number_house = NULL, $number_flat = NULL, $add_info = NULL;
    public $client_id = NULL;
    public $client_slug = NULL;


    public function render()
    {
        $time_zone = app()->make(DefaultData::class)->time_zone();
        $address_street = Address::where('type_id', 4)->select('id', 'title', 'town_id', 'state_id', 'country_id')->get();
        $client_gender = app()->make(DefaultData::class)->gender();
        $breadcrumbs = app()->make(BreadcrumbsData::class)->clients(2, [['key' => 2, 'link' => route('clients.edit', $this->client_slug),
            'name' => trans('admin_klikbud/clients.edit.breadcrumbs') . ' ' . $this->first_name . ' ' . $this->last_name  ]]);
        $page_title = $breadcrumbs[2]['name'];
        return view('livewire.clients.edit-livewire', compact('time_zone', 'address_street', 'client_gender'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function mount($slug)
    {
        $get_data = app()->make(ClientService::class)->showOneBySlug($slug);
        $this->first_name = $get_data->first_name;
        $this->last_name = $get_data->last_name;
        $this->gender = $get_data->gender_id;
        $this->site = $get_data->site;
        $this->timezone_id = $get_data->timezone;
        $this->add_info = $get_data->add_info_address;
        $this->zip_code = $get_data->zip_code;
        $this->number_house = $get_data->number_house;
        $this->number_flat = $get_data->number_flat;
        $this->client_id = $get_data->id;
        $this->client_slug = $slug;

        if(!is_null($get_data->street_id))
        {
            $this->street_id = $get_data->street_id;
        }
    }


    protected array $rules = [
        'first_name' => 'string|max:255|required',
        'last_name' => 'string|max:255|required',
        'gender' => 'integer|max:10|nullable',
        'site' => 'max:255|nullable',
        'timezone_id' => 'string|max:255|nullable',
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

    public function update()
    {
        $this->validate();

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
        $status = app()->make(ClientService::class)->updateContactDetails($this->client_id, $this->first_name, $this->last_name, $this->gender,
        $this->site, $this->timezone_id, $country_id, $state_id, $town_id, $this->street_id, $this->add_info,
            $this->zip_code, $this->number_house, $this->number_flat);
        $this->checkStatus($status, trans('admin_klikbud/clients.message_success'), 'flash', false, 'center');
        return redirect()->route('clients.one', $this->client_slug);
    }

}

