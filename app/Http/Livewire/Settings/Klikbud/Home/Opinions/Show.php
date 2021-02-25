<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Opinions;

use App\Models\KLIKBUD\Opinion;
use App\Models\KLIKBUD\OpinionPortal;
use App\Services\Settings\Klikbud\Home\OpinionService;
use Livewire\WithPagination;

class Show extends OpinionLivewire
{
    use WithPagination;

    public $searchQuery;
    public $searchStars;

    public $actions;
    public $selectedItem;
    public $data_name, $data_opinion;

    public function mount()
    {
        $this->searchQuery = '';
        $this->searchStars= '';
    }

    public function render()
    {
        $opinions = Opinion::when($this->searchQuery != '', function ($query) {
            $query->where('name', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('opinion', 'like', '%' . $this->searchQuery . '%');
        })->when($this->searchStars != '', function ($query){
            $query->where('stars', '=', $this->searchStars);
        })->orderBy('ID', 'desc')->paginate(6);

        $countStars = Opinion::select('stars', 'status_to_main_page_id')->get();
        $countOne = $countStars->where('stars', '=', 1)->count();
        $countTwo = $countStars->where('stars', '=', 2)->count();
        $countThree = $countStars->where('stars', '=', 3)->count();
        $countFour = $countStars->where('stars', '=', 4)->count();
        $countFive = $countStars->where('stars', '=', 5)->count();
        $count = $countOne + $countTwo + $countThree + $countFour + $countFive;
        $portals = OpinionPortal::all();

        $count_all = Opinion::count();

        if($count_all === 0)
        {
            $ocena_half = 0;
            $status_active = 0;
            $status_disable = 0;
            $percent_active = 0;
            $percent_disable = 0;

        }else{
            $ocena_half = round(Opinion::sum('stars') / $count_all, 2);
            $status_active = $countStars->where('status_to_main_page_id', '=', config('klikbud.klikbud.status_to_main_page.visible'))->count();
            $status_disable = $countStars->where('status_to_main_page_id', '=', config('klikbud.klikbud.status_to_main_page.not_visible'))->count();
            $percent_active = round($status_active / $count_all * 100, 2);
            $percent_disable = round($status_disable / $count_all * 100, 2);
        }

        return view('livewire.settings.klikbud.home.opinions.show',
            compact('opinions', 'count', 'countOne', 'countTwo', 'countThree', 'countFour', 'countFive', 'portals',
            'ocena_half', 'status_active', 'status_disable', 'percent_active', 'percent_disable', 'count_all'));
    }


    public function changeStatusInMainPage($opinion_id, $status_id)
    {
        $status = app()->make(OpinionService::class)->changeStatusToMainPage($opinion_id, $status_id);

        $message = trans('admin_klikbud/settings/klikbud/opinion.sessions.update_status_success');

        if($status === false)
        {
            $message = trans('admin_klikbud/settings/klikbud/opinion.sessions.error');
        }

        $this->checkStatus(
            $status, $message,
            'alert', true, 'top-end'
        );
    }

    public function selectItem($itemId, $action)
    {
        $this->selectedItem = $itemId;

        if($action === 'delete')
        {
            $showPreDeleteData = Opinion::select(['name', 'opinion'])->findOrfail($itemId);
            $this->data_name = $showPreDeleteData->name;
            $this->data_opinion = $showPreDeleteData->opinion;
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function delete()
    {
        $status = app()->make(OpinionService::class)->delete($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');

        $message = trans('admin_klikbud/settings/klikbud/opinion.sessions.delete');

        if($status === false)
        {
            $message = trans('admin_klikbud/settings/klikbud/opinion.sessions.error');
        }

        $this->checkStatus(
            $status, $message,
            'alert', true, 'top-end'
        );
    }
}
