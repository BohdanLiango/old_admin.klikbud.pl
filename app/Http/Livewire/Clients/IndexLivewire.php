<?php

namespace App\Http\Livewire\Clients;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Models\Clients\Clients;
use Livewire\WithPagination;

class IndexLivewire extends ClientLivewire
{
    public $paginate = 10;
    public $searchQuery = '';
    public $searchStatus = '';

    use WithPagination;

    public function render()
    {
        $clients = Clients::when($this->searchQuery != '', function ($query) {
            $query->where('first_name', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('last_name', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('mobile', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('email', 'like', '%' . $this->searchQuery . '%');
        })->when($this->searchStatus != '', function ($query) {
        $query->where('status_id', '=', $this->searchStatus);
    })->orderBy('id', 'DESC')->paginate($this->paginate);

        $client_status = app()->make(DefaultData::class)->client_status();
        $breadcrumbs = app()->make(BreadcrumbsData::class)->clients(1, NULL);
        $page_title = $breadcrumbs[1]['name'];

        $get_clients_to_count = Clients::select('status_id')->get();
        $count_all = $get_clients_to_count->count();

        $count_status = array();

        foreach ($client_status as $status)
        {
            $count_status[] = $get_clients_to_count->where('status_id', '=', $status['value'])->count();
        }

        return view('livewire.clients.index-livewire', compact('clients', 'client_status', 'count_all', 'count_status'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function searchStatusData($value)
    {
        $this->searchStatus = (int)$value;
    }

    public function searchStatusNull()
    {
        $this->searchStatus = '';
    }
}
