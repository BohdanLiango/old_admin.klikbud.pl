<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Opinions;

use App\Models\KLIKBUD\Opinion;
use App\Models\KLIKBUD\OpinionPortal;
use App\Models\KLIKBUD\Service;
use App\Services\Settings\Klikbud\Home\OpinionService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Create extends OpinionLivewire
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

    public function save()
    {
        $this->validate();

        $status = app()->make(OpinionService::class)->store($this->name,$this->service_id, $this->stars, $this->portal_opinion_id, $this->opinion, $this->date_add);
        $message = trans('admin_klikbud/settings/klikbud/opinion.sessions.store');

        if($status === false)
        {
            $message = trans('admin_klikbud/settings/klikbud/opinion.sessions.error');
        }

        $this->checkStatus($status, $message, 'flash', false, 'center');
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
        $portals = OpinionPortal::pluck('title', 'id');
        return view('livewire.settings.klikbud.home.opinions.create', compact('services', 'portals'));
    }

}
