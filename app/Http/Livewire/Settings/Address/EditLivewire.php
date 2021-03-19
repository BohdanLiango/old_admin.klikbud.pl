<?php

namespace App\Http\Livewire\Settings\Address;

use App\Data\BreadcrumbsData;
use App\Models\Address;
use App\Services\Settings\Other\AddressService;

class EditLivewire extends AddressLivewire
{
    public $countries = NULL, $states = NULL, $towns = NULL;
    public $editId = NULL, $typeId = NULL, $title = NULL, $selectCountryId = NULL, $selectStateId = NULL, $selectTownId = NULL, $oldTitle = NULL;
    public $typeEditTitle = NULL;

    public function mount($id)
    {
        $get_data = Address::findOrFail($id);

        $this->typeId = $get_data->type_id;

        $this->typeEditTitle = match ((int)$this->typeId) {
            2 => trans('admin_klikbud/settings/address.add-button-state'),
            3 => trans('admin_klikbud/settings/address.add-button-town'),
            4 => trans('admin_klikbud/settings/address.add-button-street'),
        };

        $this->oldTitle = $get_data->title;
        $this->selectCountryId = $get_data->country_id;
        $this->selectStateId = $get_data->state_id;
        $this->selectTownId = $get_data->town_id;
        $this->title = $get_data->title;
        $this->editId = $id;

    }

    public function render()
    {
        $this->countries = Address::where('type_id', 1)->select('id', 'title')->get();

        if(!is_null($this->selectCountryId))
        {
            $this->states = Address::where('country_id', $this->selectCountryId)->where('type_id', 2)->select('id', 'title')->get();
        }

        if(!is_null($this->selectStateId))
        {
            $this->towns = Address::where('state_id', $this->selectStateId)->where('type_id', 3)->select('id', 'title')->get();
        }

        $breadcrumbs = app()->make(BreadcrumbsData::class) ->settings_address(2,
            [['key' => 2, 'link' => route('settings.address.edit', $this->editId), 'name' => trans('admin_klikbud/settings/address.edit')  . ' ' . strtolower($this->typeEditTitle) . ' ' .$this->oldTitle]]
        );
        $page_title = $breadcrumbs[2]['name'];
        return view('livewire.settings.address.edit-livewire')
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');;
    }

    public function resetFields()
    {
        $countries = NULL;
        $states = NULL;
        $towns = NULL;
        $id = NULL;
        $typeId = NULL;
        $title = NULL;
        $selectCountryId = NULL;
        $selectStateId = NULL;
        $selectTownid = NULL;
        $oldTitle = NULL;
        $typeEditTitle = NULL;
    }

    public function edit()
    {
        switch ($this->typeId){
            case 2:
                $this->validate([
                    'title' => 'required|max:255',
                    'selectCountryId' => 'required|integer'
                ]);
                break;
            case 3:
                $this->validate([
                    'title' => 'required|max:255',
                    'selectCountryId' => 'required|integer',
                    'selectStateId' => 'required|integer',
                ]);
                break;
            case 4:
                $this->validate([
                    'title' => 'required|max:255',
                    'selectCountryId' => 'required|integer',
                    'selectStateId' => 'required|integer',
                    'selectTownId' => 'required|integer',
                ]);
                break;
        }

        $status = app()->make(AddressService::class)->update($this->editId, $this->title, $this->typeId, $this->selectCountryId, $this->selectStateId, $this->selectTownId);

        $this->resetFields();

        $this->checkStatus($status, trans('admin_klikbud/settings/address.message_success'), 'flash', false, 'center');
        return redirect()->route('settings.address.show');
    }
}
