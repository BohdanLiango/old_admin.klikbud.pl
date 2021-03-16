<?php

namespace App\Http\Livewire\Address;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Models\Address;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $types;
    public $actions, $selectedItem, $selectedType;

    public function render()
    {
        $address = Address::orderBy('id', 'desc')->paginate(10);
        $type_of_address = app()->make(DefaultData::class)->address();
        $breadcrumbs = app()->make(BreadcrumbsData::class)->address(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        return view('livewire.address.show', compact('address', 'type_of_address'))
            ->extends('layout.default', ['page_title' => $page_title, 'breadcrumbs' => $breadcrumbs])
            ->section('content');
    }

    protected $rules = [
        'store_title' => 'string|required',
        'store_country_id' => 'required|integer',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function selectItem($itemId, $action, $type)
    {
        $this->selectedItem = $itemId;
        $this->selectedType = $type;
        $this->actions = $action;

        if($itemId !== NULL)
        {
            $showPreEditData = Address::select(['id', 'title'])->findOrFail($this->selectedItem);
        }

        if($action === 'store')
        {
            $this->dispatchBrowserEvent('openStoreModal');
        }
    }

}
