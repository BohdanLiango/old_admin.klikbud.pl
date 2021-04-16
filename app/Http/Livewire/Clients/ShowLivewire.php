<?php

namespace App\Http\Livewire\Clients;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Models\Address;
use App\Services\Clients\ClientNoteService;
use App\Services\Clients\ClientService;
use App\Services\Objects\ObjectsService;
use Livewire\WithPagination;

class ShowLivewire extends ClientLivewire
{
    public $status_id, $first_name, $last_name, $gender_id, $company_id, $mobile, $email, $site, $language, $timezone,
    $communication, $add_info_address, $zip_code, $number_house, $number_flat,
    $description, $client_id, $country_title, $state_title, $town_title, $street_title, $client_slug;

    public $add_number = NULL, $add_email = NULL;
    public $modal_info = NULL, $modal_title = '';

    public $store_note;

    use WithPagination;

    public function render()
    {
        $address_street = Address::where('type_id', 4)->select('id', 'title', 'town_id', 'state_id', 'country_id')->get();
        $client_status = app()->make(DefaultData::class)->client_status();
        $client_communication = app()->make(DefaultData::class)->client_communication();
        $client_gender = app()->make(DefaultData::class)->gender();
        $client_time_zone = app()->make(DefaultData::class)->time_zone();
        $client_languages = app()->make(DefaultData::class)->language();
        $notes = app()->make(ClientNoteService::class)->showNotes($this->client_id);
        $objects = app()->make(ObjectsService::class)->selectObjectsToCLient($this->client_id);
        $breadcrumbs = app()->make(BreadcrumbsData::class)->clients(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        return view('livewire.clients.show-livewire', compact('client_status', 'client_communication', 'client_gender', 'client_time_zone',
        'client_languages', 'address_street', 'notes', 'objects'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function mount($slug)
    {
        $get_data = app()->make(ClientService::class)->showOneBySlug($slug);
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
        $this->client_id = $get_data->id;
        $this->client_slug = $slug;

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
        $this->status_id = $status_id;
        $status = app()->make(ClientService::class)->changeStatus($this->client_id, $status_id);
        $this->checkStatus($status, trans('admin_klikbud/clients.one.message_success_status'), 'alert', true, 'top-end');

    }

    public function resetInputFields()
    {
        $this->dispatchBrowserEvent('closeAddModal');
        $this->add_email = NULL;
        $this->add_number = NULL;
        $this->modal_title = '';
    }

    public function openAddModal($modal)
    {
        $this->modal_info = $modal;

        switch ($modal){
            case 'number':
                $this->modal_title = trans('admin_klikbud/clients.one.add_modal.phone');
                $this->dispatchBrowserEvent('openAddModal');
                break;
            case 'email':
                $this->modal_title =  trans('admin_klikbud/clients.one.add_modal.email');
                $this->dispatchBrowserEvent('openAddModal');
                break;
        }
    }

    public function updateMobilesEmailsShow()
    {
        $update = app()->make(ClientService::class)->updateInfoShow($this->client_id);
        $this->email = $update->email;
        $this->mobile = $update->mobile;
    }

    public function store()
    {
        switch ($this->modal_info){
            case 'number':
                $this->validate([
                    'add_number' => 'string|required|max:100'
                ]);
                $status = app()->make(ClientService::class)->updateCollectionData($this->client_id, $this->add_number, 'mobile');
                $this->checkStatus($status, trans('admin_klikbud/clients.one.messages.phone'), 'alert', true, 'top-end');
                $this->modal_info = NULL;
                $this->updateMobilesEmailsShow();
                $this->resetInputFields();
                break;
            case 'email':
                $this->validate([
                    'add_email' => 'email|required|max:255'
                ]);
                $status = app()->make(ClientService::class)->updateCollectionData($this->client_id, $this->add_email, 'email');
                $this->checkStatus($status, trans('admin_klikbud/clients.one.messages.email'), 'alert', true, 'top-end');
                $this->modal_info = NULL;
                $this->updateMobilesEmailsShow();
                $this->resetInputFields();
                break;
        }
    }

    public function opensModals($modal)
    {
        switch ($modal){
            case 'delete':
                $this->dispatchBrowserEvent('openDeleteModal');
                break;
        }
    }

    public function storeNote()
    {
        $this->validate([
            'store_note' => 'required'
        ]);

        if(!is_null($this->store_note))
        {
            $status = app()->make(ClientNoteService::class)->store($this->client_id, $this->store_note);
            $this->store_note = '';
        }else{
            $status = false;
        }

        $this->checkStatus($status, 'YUPPI', 'alert', true, 'top-end');
    }

    public function clearValueNotes()
    {
        $this->store_note = '';
    }

    public function deleteNote($id)
    {
        $status = app()->make(ClientNoteService::class)->delete($id);
        $this->checkStatus($status, 'YUPPI', 'alert', true, 'top-end');
    }

    public function delete()
    {
        $this->dispatchBrowserEvent('closeDeleteModal');
        $status = app()->make(ClientService::class)->delete($this->client_id);
        $this->checkStatus($status, trans('admin_klikbud/clients.one.messages.delete'), 'flash', false, 'center');
        return redirect()->route('clients.show');
    }
}
