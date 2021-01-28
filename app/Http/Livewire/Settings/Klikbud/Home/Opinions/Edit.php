<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Opinions;

use App\Models\KLIKBUD\Opinion;
use App\Models\KLIKBUD\Service;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{
    public $opinion_id;
    public $name, $service_id, $stars, $portal_opinion_id, $opinion, $date_add;
    public $prev_name, $prev_service_id, $prev_stars, $prev_portal_opinion_id, $prev_opinion, $prev_date_add;

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

    public function mount($id)
    {
        $this->opinion_id = $id;

        $opinion_edit = Opinion::findOrFail($id);

        $this->name = $opinion_edit->name;
        $this->service_id = $opinion_edit->service_id;
        $this->stars = $opinion_edit->stars;
        $this->portal_opinion_id = $opinion_edit->portal_opinion_id;
        $this->opinion = $opinion_edit->opinion;
        $this->date_add =  Carbon::createFromFormat('Y-m-d H:i:s',$opinion_edit->date_add)->format('d/m/Y');

        $this->prev_name = $opinion_edit->name;
        $this->prev_service_id = $opinion_edit->service_edit;
        $this->prev_stars = $opinion_edit->stars;
        $this->prev_portal_opinion_id = $opinion_edit->portal_opinion_id;
        $this->prev_opinion = $opinion_edit->opinion;
        $this->prev_date_add =  Carbon::createFromFormat('Y-m-d H:i:s',$opinion_edit->date_add)->format('d/m/Y');
    }

    public function render()
    {
        $services = Service::pluck('title', 'id');

        return view('livewire.settings.klikbud.home.opinions.edit', compact('services'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit()
    {
        $this->validate();

        $data = [
            'user_id' => Auth::id(),
        ];

        // We will check if there are any changes in the fields

        if ($this->name !== $this->prev_name) {
            $data['name'] = $this->name;
        }

        if ($this->service_id !== $this->prev_service_id) {
            $data['service_id'] = $this->service_id;
        }

        if ($this->portal_opinion_id !== $this->prev_portal_opinion_id) {
            $data['portal_opinion_id'] = $this->portal_opinion_id;
        }

        if ($this->opinion !== $this->prev_opinion) {
            $data['opinion'] = $this->opinion;
        }

        if ($this->date_add !== $this->prev_date_add) {
            $data['date_add'] =  Carbon::createFromFormat('d/m/Y',$this->date_add)->format('Y-m-d');
        }

        if(count($data)) {
            Opinion::find($this->opinion_id)->update($data);
            session()->flash('message', 'Opinie edytowano!');
            session()->flash('alert-type', 'success');
            return redirect()->route('settings.klikbud.home.opinion.index');
        }

        session()->flash('message', 'Bez zmian!');
        session()->flash('alert-type', 'primary');

        return redirect()->route('settings.klikbud.home.opinion.index');

    }

}
