<?php

namespace App\Http\Livewire\Data\Address;

use App\Services\Data\AddressService;
use Livewire\Component;
use Livewire\WithPagination;

class IndexLivewire extends Component
{
    public $searchQuery, $searchType, $orderBy = 'ID', $orderArgument = 'DESC', $paginate = 10, $types, $countAddress;

    protected $listeners = ['searchType'];

    use WithPagination;

    public function render()
    {
        $address = $this->getAddress();
        $count_results= count($address);
        return view('livewire.data.address.index-livewire', compact('address', 'count_results'));
    }

    public function mount($types, $countAddress)
    {
        $this->types = $types;
        $this->countAddress = $countAddress;
    }

    private function getAddress()
    {
        return app()->make(AddressService::class)->getAllByParameters($this->searchQuery,
            $this->searchType, $this->orderBy, $this->orderArgument, $this->paginate);
    }

}
