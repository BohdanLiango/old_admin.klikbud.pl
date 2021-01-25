<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Counter;

use App\Models\KLIKBUD\Counter;
use Livewire\Component;

class Content extends Component
{
    public $count;
    public $project_completed;
    public $happy_clients;
    public $workers_employed;
    public $awards_won;

    /**
     * @var array|string[]
     */
    public array $rules = [
        'project_completed' => 'required|numeric',
        'happy_clients' => 'required|numeric',
        'workers_employed' => 'required|numeric',
        'awards_won' => 'required|numeric',
    ];

    public function mount()
    {
        $count = Counter::findOrFail(1);
        $this->project_completed = $count->project_completed;
        $this->happy_clients = $count->happy_clients;
        $this->workers_employed = $count->workers_employed;
        $this->awards_won = $count->awards_won;
    }
    public function render()
    {
        return view('livewire.settings.klikbud.home.counter.content');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit()
    {
        $this->validate();

        $count = Counter::findOrFail(1);
        $data = [
            'project_completed' => $this->project_completed,
            'happy_clients' => $this->happy_clients,
            'workers_employed' => $this->workers_employed,
            'awards_won' => $this->awards_won
        ];
        $count->fill($data)->save();

        session()->flash('message', 'Licznik zmieniono!');
        session()->flash('alert-type', 'success');

    }


}
