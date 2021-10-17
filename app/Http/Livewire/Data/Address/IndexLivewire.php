<?php

namespace App\Http\Livewire\Data\Address;

use App\Services\Data\AddressService;
use Livewire\Component;
use Livewire\WithPagination;

class IndexLivewire extends Component
{
    public $searchQuery, $searchType, $orderBy = 'ID', $orderArgument = 'DESC', $paginate = 10, $types, $countAddress,
        $addTitle = NULL, $modalInfo = NULL, $parentId = NULL, $addTypeId = NULL, $addModalTitle = NULL;

    protected $listeners = ['searchType'];

    use WithPagination;

    public function render()
    {
        $address = $this->getAddress();
        $count_results= count($address);
        return view('livewire.data.address.index-livewire', compact('address', 'count_results'));
    }

    /**
     * Get Types and countAddress (int) with AddressController
     */
    public function mount($types, $countAddress)
    {
        $this->types = $types;
        $this->countAddress = $countAddress;
    }

    /**
     * Get & Show all address
     */
    private function getAddress()
    {
        return app()->make(AddressService::class)->getAllByParameters($this->searchQuery,
            $this->searchType, $this->orderBy, $this->orderArgument, $this->paginate);
    }

    public function selectModal($modal, $parentId, $addressTypeId)
    {
        $this->modalInfo = $modal;
        $this->parentId = $parentId;
        $this->addTypeId = $addressTypeId;

        switch ($modal){
            case 'openAddNewAddress':
                $this->getTitleToModalAdd($addressTypeId);
                $this->dispatchBrowserEvent('openAddNewAddressModal');
                break;
            case 'closeAddNewAddress':
                $this->dispatchBrowserEvent('closeAddNewAddressModal');
                $this->clearVarsAdd();
                break;
        }
    }

    /**
     * Clear vars to modal add
     */
    private function clearVarsAdd()
    {
        $this->addTitle = NULL;
        $this->parentId = NULL;
        $this->modalInfo = NULL;
        $this->addTypeId = NULL;
        $this->addModalTitle = NULL;
    }

    /**
     * Get add modal title
     */
    private function getTitleToModalAdd($addressTypeId)
    {
        foreach ($this->types as $type)
        {
            if((int)$type['value'] === (int)$type)
            {
                $this->addModalTitle = $type['title'];
            }
        }
    }

    public function save()
    {
        dd($this->parentId);
    }
}
