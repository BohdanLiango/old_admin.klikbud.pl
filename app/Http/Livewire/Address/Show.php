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
        return view('livewire.address.show', [
            'address' => Address::paginate(10),
        ]);
    }
}
