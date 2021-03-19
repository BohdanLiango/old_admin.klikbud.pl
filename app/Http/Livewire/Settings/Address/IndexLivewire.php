<?php

namespace App\Http\Livewire\Settings\Address;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Models\Address;
use Livewire\WithPagination;

class IndexLivewire extends AddressLivewire
{
    public $deleteTitle = NULL, $deleteTypeId = NULL, $deleteCountryId = NULL, $deleteStateId = NULL, $deleteTownId = NULL;
    public $searchQuery = '', $searchType = '';

    use WithPagination;

    public function render()
    {
        $address = Address::when($this->searchQuery != '', function ($query) {
            $query->where('title', 'like', '%' . $this->searchQuery . '%');
        })->when($this->searchType != '', function ($query) {
            $query->where('type_id', $this->searchType);
        })->orderBy('id', 'DESC')->paginate(12);

        $breadcrumbs = app()->make(BreadcrumbsData::class)->settings_address(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $types = app()->make(DefaultData::class)->address();

        $countable = Address::select('type_id')->get();

        $count_types = array();

        foreach ($types as $type)
        {
            $count_types[] = $countable->where('type_id', '=', $type['value'])->count();
        }

        return view('livewire.settings.address.index-livewire', compact('address', 'types', 'count_types'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }
}
