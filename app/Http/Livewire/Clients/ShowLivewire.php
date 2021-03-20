<?php

namespace App\Http\Livewire\Clients;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Services\Clients\ClientService;

class ShowLivewire extends ClientLivewire
{
    public $status_id, $first_name, $last_name, $gender_id, $company_id, $mobile, $email, $site, $language, $timezone,
    $communication, $add_info_address, $zip_code, $number_house, $number_flat,
    $description, $client_id, $country_title, $state_title, $town_title, $street_title;


    public function render()
    {
        $client_status = app()->make(DefaultData::class)->client_status();
        $client_communication = app()->make(DefaultData::class)->client_communication();
        $client_gender = app()->make(DefaultData::class)->gender();
        $client_time_zone = app()->make(DefaultData::class)->time_zone();
        $client_languages = app()->make(DefaultData::class)->language();
        $breadcrumbs = app()->make(BreadcrumbsData::class)->clients(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        return view('livewire.clients.show-livewire', compact('client_status', 'client_communication', 'client_gender', 'client_time_zone',
        'client_languages'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function mount($id)
    {
       $get_data = app()->make(ClientService::class)->showOne($id);
        $this->status_id = $get_data->status_id;
        $this->first_name = $get_data->first_name;
        $this->last_name = $get_data->last_name;
        $this->gender_id = $get_data->gender_id;
        $this->company_id = $get_data->company_id;
        $this->mobile = $get_data->mobile;
        $this->email = $get_data->email;
        $this->site = $get_data->site;
        $this->language = $get_data->language;
        $this->timezone = $get_data->timezone;
        $this->communication = $get_data->communication;
        $this->add_info_address = $get_data->add_info_address;
        $this->zip_code = $get_data->zip_code;
        $this->number_house = $get_data->number_house;
        $this->number_flat = $get_data->number_flat;
        $this->description = $get_data->description;
        $this->client_id = $id;

        if(!is_null($get_data->country_id))
        {
            $this->country_title = $get_data->country->title;
        }

        if(!is_null($get_data->state_id))
        {
            $this->state_title = $get_data->state->title;
        }

        if(!is_null($get_data->town_id))
        {
            $this->town_title = $get_data->town->title;
        }

        if(!is_null($get_data->street_id))
        {
            $this->street_title = $get_data->street->title;
        }

    }

    public function changeStatus($status_id)
    {
        $status = app()->make(ClientService::class)->changeStatus($this->client_id, $status_id);
        $this->checkStatus($status, trans('admin_klikbud/clients.one.message_success_status'), 'alert', true, 'top-end');
        $this->status_id = $status_id;
    }
}
