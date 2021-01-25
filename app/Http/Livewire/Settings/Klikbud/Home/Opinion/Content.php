<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Opinion;

use App\Models\KLIKBUD\Opinion;
use Livewire\Component;
use Livewire\WithPagination;

class Content extends Component
{
    use WithPagination;

    public $searchQuery;
    public $searchStars;

    public $actions;
    public $selectedItem;

    public $prompt;

    protected $listeners =[
        'refreshParent'
    ];

    public function refreshParent()
    {
        $this->prompt = "The parent has be refreshed";
    }


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
        })->orderBy('ID', 'desc')->paginate(12);

        $count = Opinion::count();

        $countStars = Opinion::whereIn('stars', [1,2,3,4,5])->get();
        $countOne = $countStars->where('stars', '=', 1)->count();

        return view('livewire.settings.klikbud.home.opinion.content', compact('opinions', 'count', 'countOne'));
    }
}
