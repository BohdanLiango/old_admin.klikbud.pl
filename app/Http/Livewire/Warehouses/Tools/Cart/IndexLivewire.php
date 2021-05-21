<?php

namespace App\Http\Livewire\Warehouses\Tools\Cart;

use App\Data\BreadcrumbsData;
use Livewire\Component;

class IndexLivewire extends Component
{
    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->tools(2, NULL);
        $page_title = $breadcrumbs[1]['name'];

        return view('livewire.warehouses.tools.cart.index-livewire')
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }
}
