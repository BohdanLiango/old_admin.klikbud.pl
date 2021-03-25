<?php

namespace App\Http\Livewire\Objects;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Services\Objects\ObjectsService;
use Illuminate\Support\Str;

class OneLivewire extends ObjectLivewire
{
    public $object_id, $title, $image_id, $description, $price_start, $price_end, $m2, $date_start, $date_end, $final_date_end,
    $guarantee_date_end, $country_title, $state_title, $town_title, $street_id, $street_title, $address_add_info, $number, $apartment_number, $zip_code,
    $status_object_id, $type_object_id, $type_repair_id, $client_first_name, $client_last_name, $client_id, $user_id, $user_add_first_name, $user_add_last_name,
        $manager_id, $agreement_id, $status_success_id, $created_date, $price_to_m2_start;

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->objects(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $status_finished = app()->make(DefaultData::class)->status_object_finished();
        $status_object = app()->make(DefaultData::class)->status_object();
        $type_object = app()->make(DefaultData::class)->type_object();
        $type_repair_object = app()->make(DefaultData::class)->type_repair_object();
        return view('livewire.objects.one-livewire', compact('status_finished', 'status_object', 'type_object', 'type_repair_object'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function mount($id)
    {
        $get_data = app()->make(ObjectsService::class)->showOne($id);
        $this->object_id = $get_data->id;
        $this->title = Str::limit($get_data->title, 25);
        $this->image_id = $get_data->image_id;
        $this->description = Str::limit($get_data->description, 500);
        $this->price_start = $get_data->price_start;
        $this->price_end = $get_data->price_end;
        $this->m2 = $get_data->m2;

        $this->date_start = date('d/m/Y', strtotime($get_data->date_start));
        $this->date_end = date('d/m/Y', strtotime($get_data->date_end));

        if(!is_null($get_data->final_date_end))
        {
            $this->final_date_end = date('d/m/Y', strtotime($get_data->final_date_end));
        }else{
            $this->final_date_end = NULL;
        }

        if(!is_null($get_data->guarantee_date_end))
        {
            $this->guarantee_date_end = date('d/m/Y', strtotime($get_data->guarantee_date_end));
        }else{
            $this->guarantee_date_end = NULL;
        }


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
            $this->street_title = Str::limit($get_data->street->title, 25);
            $this->street_id = $get_data->street_id;
        }

        $this->address_add_info = Str::limit($get_data->address_add_info, 200);
        $this->number = Str::limit($get_data->number, 5);
        $this->apartment_number = Str::limit($get_data->apartment_number, 5);
        $this->zip_code = Str::limit($get_data->zip_code, 10);
        $this->status_object_id = $get_data->status_object_id;
        $this->type_object_id = $get_data->type_object_id;
        $this->type_repair_id = $get_data->type_repair_id;

        if(!is_null($get_data->client_id) && !is_null($get_data->client))
        {
            $this->client_id = $get_data->client_id;
            $this->client_first_name = $get_data->client->first_name;
            $this->client_last_name = $get_data->client->last_name;
        }

        $this->user_id = $get_data->user_id;
        $this->user_add_first_name = $get_data->user->name;
        $this->user_add_last_name = $get_data->user->surname;
        $this->manager_id = $get_data->manager_id;
        $this->agreement_id = $get_data->agreement_id;
        $this->status_success_id = $get_data->status_success_id;
        $this->created_date = date('H:i:s d/m/Y', strtotime($get_data->created_at));

        if(!is_null($this->price_start) && !is_null($this->m2))
        {
            $this->price_to_m2_start = number_format($this->price_start / $this->m2, 2);
        }

        $this->price_start = number_format(Str::limit($get_data->price_start, 20), 2);
        $this->price_end = number_format(Str::limit($get_data->price_end, 20),2);
        $this->m2 = number_format(Str::limit($get_data->m2, 20), 2);
    }

    public function opensModals($modal)
    {
        switch ($modal){
            case 'delete':
                $this->dispatchBrowserEvent('openDeleteModal');
                break;
        }
    }

    public function delete()
    {
        $this->dispatchBrowserEvent('closeDeleteModal');
        $status = app()->make(ObjectsService::class)->delete($this->object_id);
        $this->checkStatus($status, trans('admin_klikbud/clients.one.messages.delete'), 'flash', false, 'center');
        return redirect()->route('objects.all');
    }
}
