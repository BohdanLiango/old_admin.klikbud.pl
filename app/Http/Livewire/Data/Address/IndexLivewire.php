<?php

namespace App\Http\Livewire\Data\Address;

use App\Services\Data\AddressService;
use Livewire\Component;

class IndexLivewire extends Component
{
    public $searchQuery, $searchType, $orderBy = 'ID', $orderArgument = 'DESC', $paginate = 12, $types;


    public function render()
    {
        $address = $this->getAddress();
        return view('livewire.data.address.index-livewire', compact('address'));
    }

    public function mount($types)
    {
        $this->types = $types;
    }

    private function getAddress()
    {
        return app()->make(AddressService::class)->getAllByParameters($this->searchQuery,
            $this->searchType, $this->orderBy, $this->orderArgument, $this->paginate);
    }
}
