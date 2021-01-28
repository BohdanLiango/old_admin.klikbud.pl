<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Opinions;

use App\Models\KLIKBUD\Opinion;
use App\Models\KLIKBUD\Service;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $name, $service_id, $stars, $portal_opinion_id, $opinion, $date_add;

    /**
     * @var array|string[]
     */
    protected array $rules = [
        'name' => 'required',
        'service_id' => 'required|numeric',
        'stars' => 'required|numeric',
        'portal_opinion_id' => 'required',
        'date_add' => 'required|date_format:d/m/Y',
        'opinion'=> 'max:65000'
    ];

    /**
     * @var array|string[]
     */
    protected array $messages = [
        'name.required' => 'Imię lub nazwa autora wymagana!',
        'service_id.required' => 'Serwis do któregoi była wystawiona opinia wymagany!',
        'service_id.numeric' => 'NIe prawidłówy format!',
        'portal_opinion_id.required' => 'Portal na którym była wustawiona opinia wymagany',
        'date_add.required' => 'Data wystawienia wumagana !'
    ];

    public function save()
    {

        $this->validate();

        $data = [
            'name' => $this->name,
            'service_id' => $this->service_id,
            'stars' => $this->stars,
            'portal_opinion_id' => $this->portal_opinion_id,
            'user_id' => Auth::id(),
            'opinion' => $this->opinion,
            'date_add' => Carbon::createFromFormat('d/m/Y',$this->date_add)->format('Y-m-d')
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
        return view('livewire.settings.klikbud.home.opinions.create', compact('services'));
    }

}
