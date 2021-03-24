<?php

namespace App\Http\Livewire\Objects;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Services\Clients\ClientService;
use App\Services\Objects\ObjectsService;
use App\Services\Settings\Other\AddressService;

class AddLivewire extends ObjectLivewire
{
    public $title, $description, $price_start,  $m2, $date_start, $date_end,
    $street_id, $number, $apartment_number, $address_add_info,  $zip_code, $status_object_id, $type_object_id, $type_repair_id,
    $client_id;

    protected $rules = [
        'title' => 'required',
        'description' => 'nullable',
        'price_start' => 'nullable|numeric',
        'm2' => 'nullable|numeric',
        'date_start' => 'nullable|date_format:d/m/Y',
        'date_end' => 'nullable|date_format:d/m/Y',
        'street_id' => 'required|integer',
        'number' => 'nullable',
        'apartment_number' => 'nullable',
        'zip_code' => 'nullable',
        'address_add_info' => 'nullable',
        'status_object_id' => 'required|integer',
        'type_object_id' => 'required|integer',
        'type_repair_id' => 'required|integer',
        'client_id' => 'required|integer'
    ];

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->objects(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $clients_object = app()->make(ClientService::class)->showClientSelectIdName();
        $status_object = app()->make(DefaultData::class)->status_object();
        $type_object = app()->make(DefaultData::class)->type_object();
        $type_repair_object = app()->make(DefaultData::class)->type_repair_object();
        $object_address = app()->make(AddressService::class)->selectAddressToGetData();
        return view('livewire.objects.add-livewire', compact('clients_object', 'status_object',
            'type_object', 'type_repair_object', 'object_address'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store($type_store_id)
    {
        $this->validate();
        if (!is_null($this->street_id)) {
            $get_street_info = app()->make(AddressService::class)->showOneDataStreet($this->street_id);
            $country_id = $get_street_info->country_id;
            $state_id = $get_street_info->state_id;
            $town_id = $get_street_info->town_id;
        } else {
            $country_id = NULL;
            $state_id = NULL;
            $town_id = NULL;
        }

        $status = app()->make(ObjectsService::class)->store($this->title, $this->description, $this->price_start,
        $this->m2, $this->date_start, $this->date_end, $country_id, $state_id, $town_id, $this->street_id, $this->number, $this->apartment_number,
        $this->zip_code, $this->status_object_id, $this->type_object_id, $this->type_repair_id, $this->client_id, $this->address_add_info);

        if(is_numeric($status))
        {
            $status = true;
        }

        $this->checkStatus($status, 'Udało się', 'flash', false, 'center');

        switch ($type_store_id) {
            case 1:
                return redirect()->route('objects.all');
            case 2:
                return redirect()->route('objects.all'); // To object profil
            case 3:
                return redirect()->route('objects.add');
        }

        return abort(403);

    }
}
