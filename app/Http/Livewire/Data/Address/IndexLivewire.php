<?php

namespace App\Http\Livewire\Data\Address;

use App\Services\Data\AddressService;
use Livewire\Component;
use Livewire\WithPagination;

class IndexLivewire extends Component
{
    public $searchQuery, $searchType, $orderBy = 'ID', $orderArgument = 'DESC', $paginate = 10, $types, $countAddress,
        $addTitle = NULL, $modalInfo = NULL, $parentId = NULL, $parentTypeId = NULL, $addModalTitle = NULL, $editId = NULL,
        $editTitle = NULL, $editNewTitle = NULL;

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
        $this->parentTypeId = $addressTypeId;

        switch ($modal){
            case 'openAddNewAddress':
                $this->getTitleToModalAdd($addressTypeId);
                $this->dispatchBrowserEvent('openAddNewAddressModal');
                break;
            case 'closeAddNewAddress':
                $this->dispatchBrowserEvent('closeAddNewAddressModal');
                $this->clearVars();
                break;
        }
    }

    public function selectEditModal($modal, $id, $oldTitle)
    {
        dd($modal);
        $this->editId = $id;
        $this->editTitle = $oldTitle;

        switch ($modal){
            case 'openEditAddress':
                $this->dispatchBrowserEvent('openEditAddressModel');
                break;
            case 'closeEditAddress':
                $this->dispatchBrowserEvent('closeEditAddressModel');
                $this->clearVars();
                break;
        }
    }

    /**
     * Clear vars to modal add
     */
    private function clearVars()
    {
        $this->addTitle = NULL;
        $this->parentId = NULL;
        $this->modalInfo = NULL;
        $this->parentTypeId = NULL;
        $this->addModalTitle = NULL;
        $this->editId = NULL;
        $this->editTitle = NULL;
        $this->editNewTitle = NULL;
    }

    /**
     * Get add modal title
     */
    private function getTitleToModalAdd($addressTypeId)
    {
        ++$addressTypeId;
        foreach ($this->types as $type)
        {
            if((int)$type['value'] === (int)$addressTypeId)
            {
                $this->addModalTitle = $type['title'];
                break;
            }
        }
    }

    public function save()
    {
        app()->make(AddressService::class)->save($this->addTitle, $this->parentTypeId, $this->parentId);
    }

    public function edit()
    {
        app()->make(AddressService::class)->update($this->editId, $this->editTitle);
    }
}
