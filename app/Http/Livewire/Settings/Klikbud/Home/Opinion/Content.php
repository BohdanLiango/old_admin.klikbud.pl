<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Opinion;

use App\Models\KLIKBUD\Opinion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Content extends Component
{
    use WithPagination;

    public $searchQuery;
    public $searchStars;

    public $actions;
    public $selectedItem;

    public $storeOpinion;

    public $name_edit, $service_id_edit, $stars_edit,
        $status_to_main_page_id_edit, $portal_opinion_id_edit,
        $opinion_edit, $date_add_edit; //To edit

    /**
     * @var array|string[]
     */
    protected array $rules = [
        'storeOpinion.name' => 'required',
        'storeOpinion.service_id' => 'required|numeric',
        'storeOpinion.portal_opinion_id' => 'required',
        'storeOpinion.date_add' => 'required|date'
    ];

    /**
     * @var array|string[]
     */
    protected array $messages = [
        'storeOpinion.name.required' => 'Imię lub nazwa autora wymagana!',
        'storeOpinion.service_id.required' => 'Serwis do któregoi była wystawiona opinia wymagany!',
        'storeOpinion.service_id.numeric' => 'NIe prawidłówy format!',
        'storeOpinion.portal_opinion_id.required' => 'Portal na którym była wustawiona opinia wymagany',
        'storeOpinion.date_add.required' => 'Data wystawienia wumagana !'
    ];


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

    public function openSaveModal($action)
    {
        if($action === 'save')
        {
            $this->dispatchBrowserEvent('openSaveModal');
        }
    }

    public function save()
    {
        $this->validate();

        $create = new Opinion();

        $data = [
            'name' => $this->storeOpinion['name'],
            'service_id' => $this->storeOpinion['service_id'],
            'stars' => $this->storeOpinion['stars'],
            'portal_opinion_id' => $this->storeOpinion['portal_opinion_id'],
            'user_id' => Auth::id(),
            'opinion' => $this->storeOpinion['opinion'],
            'date_add' => $this->storeOpinion['date_add']
        ];

        $create->fill($data)->save();

        $this->dispatchBrowserEvent('closeSaveModal');

        session()->flash('message', 'Opinia zapisana!');
        session()->flash('alert-type', 'success');
    }
}
