<?php

namespace App\Http\Livewire\Objects;

use App\Data\BreadcrumbsData;
use App\Services\Clients\ClientService;
use App\Services\Objects\ObjectsService;
use App\Services\Settings\Other\AddressService;
use Illuminate\Support\Carbon;

class EditLivewire extends ObjectLivewire
{
    public $object_id, $title, $description, $price_start,  $m2, $date_start, $date_end, $street_id, $number,
        $apartment_number, $address_add_info,  $zip_code, $client_id, $object_slug;

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->objects(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $clients_object = app()->make(ClientService::class)->showClientSelectIdName();
        $object_address = app()->make(AddressService::class)->selectAddressToGetData();
        return view('livewire.objects.edit-livewire', compact('clients_object', 'object_address'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function mount($slug)
    {
        $this->object_slug = $slug;
        $get_data = app()->make(ObjectsService::class)->showOneBySlug($slug);
        $this->object_id = $get_data->id;
        $this->title = $get_data->title;
        $this->description = $get_data->description;
        $this->price_start = $get_data->price_start;
        $this->m2 = $get_data->m2;
        if(!is_null($get_data->date_start))
        {
            $this->date_start = Carbon::createFromFormat('Y-m-d', $get_data->date_start)->format('d/m/Y');
        }
        if(!is_null($get_data->date_end))
        {
            $this->date_end = Carbon::createFromFormat('Y-m-d', $get_data->date_end)->format('d/m/Y');
        }
        $this->street_id = $get_data->street_id;
        $this->number = $get_data->number;
        $this->apartment_number = $get_data->apartment_number;
        $this->address_add_info = $get_data->address_add_info;
        $this->zip_code = $get_data->zip_code;
        $this->client_id = $get_data->client_id;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|max:255|unique:objects,title,' . $this->object_id,
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
            'client_id' => 'required|integer'
        ]);
        $status = app()->make(ObjectsService::class)->update($this->object_id, $this->title, $this->description, $this->price_start,
        $this->m2, $this->date_start, $this->date_end, $this->street_id, $this->number, $this->apartment_number, $this->zip_code,
        $this->client_id, $this->address_add_info);
        $this->checkStatus($status,  trans('admin_klikbud/objects.add_edit_page.messages.success_edit') . '!', 'flash', false, 'center');
        return redirect()->route('objects.one', $this->object_slug);
    }


}
