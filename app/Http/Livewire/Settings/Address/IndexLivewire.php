<?php

namespace App\Http\Livewire\Settings\Address;

use App\Data\BreadcrumbsData;
use Livewire\Component;

class IndexLivewire extends Component
{
    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->settings_address(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        return view('livewire.settings.address.index-livewire')
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }
}
