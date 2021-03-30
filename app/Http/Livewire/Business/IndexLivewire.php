<?php

namespace App\Http\Livewire\Business;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Services\Business\BusinessService;
use Livewire\Component;

class IndexLivewire extends Component
{
    public $paginate = 10;
    public $searchQuery = '',  $searchCategory = '';

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->business(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $forms = app()->make(DefaultData::class)->form_business();
        $business = app()->make(BusinessService::class)->getToIndex($this->paginate, $this->searchQuery, $this->searchCategory);
        $categories = app()->make(DefaultData::class)->categories_business();
        $types = app()->make(DefaultData::class)->business_types();
        return view('livewire.business.index-livewire', compact('forms', 'business', 'categories', 'types'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }
}
