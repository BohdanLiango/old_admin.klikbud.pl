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
}
