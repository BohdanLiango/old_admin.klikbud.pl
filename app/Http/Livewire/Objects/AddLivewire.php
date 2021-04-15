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
        'title' => 'required|unique:objects,title|max:255',
        'description' => 'nullable|max:65535',
        'price_start' => 'nullable|numeric',
        'm2' => 'nullable|numeric',
        'date_start' => 'nullable|date_format:d/m/Y',
        'date_end' => 'nullable|date_format:d/m/Y',
        'street_id' => 'required|integer',
        'number' => 'nullable|max:255',
        'apartment_number' => 'nullable|max:255',
        'zip_code' => 'nullable|max:255',
        'address_add_info' => 'nullable|max:255',
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

        $redirect_id = $status;

        if(is_numeric($status))
        {
            $status = true;
        }
        $title_success = trans('admin_klikbud/objects.add_edit_page.messages.success_add')
            . ' ' . $this->title . ' ' . trans('admin_klikbud/objects.add_edit_page.messages.success_add_continue') . '!';
        $this->checkStatus($status,  $title_success, 'flash', false, 'center');

        switch ($type_store_id) {
            case 1:
                return redirect()->route('objects.all');
            case 2:
                $slug = app()->make(ObjectsService::class)->showOneById($redirect_id);
                return redirect()->route('objects.one', $slug->slug); // To object profil
            case 3:
                return redirect()->route('objects.add');
        }

        abort(403);
        return false;

    }
}
