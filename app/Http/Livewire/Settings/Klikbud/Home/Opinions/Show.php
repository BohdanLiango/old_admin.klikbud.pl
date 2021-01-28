<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Opinions;

use App\Models\KLIKBUD\Opinion;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
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

        $countStars = Opinion::whereIn('stars', [1,2,3,4,5])->get();
        $countOne = $countStars->where('stars', '=', 1)->count();
        $countTwo = $countStars->where('stars', '=', 2)->count();
        $countThree = $countStars->where('stars', '=', 3)->count();
        $countFour = $countStars->where('stars', '=', 4)->count();
        $countFive = $countStars->where('stars', '=', 5)->count();
        $count = $countOne + $countTwo + $countThree + $countFour + $countFive;

        return view('livewire.settings.klikbud.home.opinions.show',
            compact('opinions', 'count', 'countOne', 'countTwo', 'countThree', 'countFour', 'countFive'));
    }

    /**
     * @param $slider_id
     * @param $status_id
     */
    public function changeStatusInMainPage($opinion_id, $status_id)
    {
        $update = Opinion::findOrFail($opinion_id);
        $update->status_to_main_page_id = $status_id;
        $update->save();

        session()->flash('message', 'Status na głownej stronie zmieniony!');
        session()->flash('alert-type', 'warning');
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

    /**
     * @param $id
     */
    public function delete()
    {
        Opinion::findOrFail($this->selectedItem)->delete();
        $this->dispatchBrowserEvent('closeDeleteModal');
        session()->flash('message', 'Suwak usunięty!');
        session()->flash('alert-type', 'success');
    }
}
