<?php

namespace App\Http\Livewire\Address;

use App\Models\Address;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $types;

    public function render()
    {
        $address = Address::paginate(10);

        return view('livewire.address.show', compact('address'));
    }
}
