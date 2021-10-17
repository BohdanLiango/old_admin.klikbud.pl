<?php

namespace App\Http\Livewire\Data\Address;

use App\Data\DefaultData;
use App\Services\Data\AddressService;
use Livewire\Component;

class AddLivewire extends Component
{
    public $countries = NULL, $states = NULL, $towns = NULL, $typeId, $title = NULL,
        $selectCountryId, $selectStateId = NULL, $selectTownId = NULL, $typeTitle = NULL;

    public function mount($type)
    {
        $types = app()->make(DefaultData::class)->address();
        foreach ($types as $value)
        {
            if((string)$value['route_value'] === (string)$type)
            {
             $this->typeTitle = $value['title'];
             $this->typeId = $value['value'];
            }
        }
    }

    public function render()
    {
        $this->countries = $this->getAddressByType(config('app.address.country'));

        if(!is_null($this->selectCountryId))
        {
            $this->states = $this->getAddressByTypeAddressType(config('app.address_tables.country'), $this->selectCountryId, config('app.address.state'));
        }

        if(!is_null($this->selectStateId))
        {
            $this->towns = $this->getAddressByTypeAddressType(config('app.address_tables.state'), $this->selectStateId, config('app.address.town'));
        }

        return view('livewire.data.address.add-livewire');
    }

    public function getAddressByType($type)
    {
        return app()->make(AddressService::class)->getAllByType($type);
    }

    public function getAddressByTypeAddressType($addressId, $addressParameter, $typeId)
    {
        return app()->make(AddressService::class)->getAllByAddressType($addressId, $addressParameter, $typeId);
    }

    public function save()
    {
        dd($this->selectCountryId);
    }
}
