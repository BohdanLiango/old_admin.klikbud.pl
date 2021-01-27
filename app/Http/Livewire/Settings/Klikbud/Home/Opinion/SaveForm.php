<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Opinion;

use App\Models\KLIKBUD\Opinion;
use App\Models\KLIKBUD\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SaveForm extends Component
{
    public $storeOpinion;

    /**
     * @var array|string[]
     */
    protected array $rules = [
        'storeOpinion.name' => 'required',
        'storeOpinion.service_id' => 'required|numeric',
        'storeOpinion.stars' => 'required|numeric',
        'storeOpinion.portal_opinion_id' => 'required',
        'storeOpinion.date_add' => 'required|date_format:d/m/Y',
        'storeOpinion.opinion'=> 'max:65000'
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

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->storeOpinion['name'],
            'service_id' => $this->storeOpinion['service_id'],
            'stars' => $this->storeOpinion['stars'],
            'portal_opinion_id' => $this->storeOpinion['portal_opinion_id'],
            'user_id' => Auth::id(),
            'opinion' => $this->storeOpinion['opinion'],
            'date_add' => date("Y-m-d H:i:s", strtotime($this->storeOpinion['date_add']))
        ];

        Opinion::create($data);
        session()->flash('message', 'Opinia zapisana!');
        session()->flash('alert-type', 'success');
        $this->cleanVars();
        return redirect()->route('settings.klikbud.home.opinion.index');

    }

    private function cleanVars()
    {
        $this->storeOpinion = null;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        $services = Service::pluck('title', 'id');

        return view('livewire.settings.klikbud.home.opinion.save-form', compact('services'));
    }
}
