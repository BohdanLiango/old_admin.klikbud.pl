<?php

namespace App\Http\Livewire\Data\Address;

use Livewire\Component;

class AddLivewire extends Component
{
    public $countries = NULL, $states = NULL, $towns = NULL, $typeId, $title = NULL,
        $selectCountryId = NULL, $selectStateId = NULL, $selectTownId = NULL, $type = NULL;


    public function mount($type)
    {
        $this->type = $type;

    }


    public function render()
    {
        return view('livewire.data.address.add-livewire');
    }
}
