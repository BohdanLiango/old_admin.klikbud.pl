<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Service;

use App\Services\Files\FilesDataService;
use App\Services\Settings\Klikbud\Home\ServicesService;
use Livewire\WithFileUploads;

class Add extends ServiceLivewire
{
    use WithFileUploads;

    public $photo;
    public $service;

    /**
     * @var array|string[]
     */
    protected array $rules = [
        'photo' => 'image|max:256|required',

        'service.title_pl' => 'required',
        'service.description_pl' => 'required',
        'service.alt_pl' => 'required',

        'service.title_en' => 'required',
        'service.description_en' => 'required',
        'service.alt_en' => 'required',

        'service.title_ua' => 'required',
        'service.description_ua' => 'required',
        'service.alt_ua' => 'required',

        'service.title_ru' => 'required',
        'service.description_ru' => 'required',
        'service.alt_ru' => 'required',
    ];

    public function save()
    {
        $this->validate();

        $store_id = app()->make(ServicesService::class)->store($this->service);

        if($store_id !== false)
        {
            $store_image = $this->photo->store('/public/uploads/service/' . uniqid('service', false));
            $image_id = app()->make(FilesDataService::class)->storeKlikBudService($store_image, $store_id);
            $store_image = app()->make(ServicesService::class)->storeImage($store_id, $image_id);
            if ($store_image === true) {
                $this->checkStatus(true, trans('admin_klikbud/settings/klikbud/service.sessions.store'), 'flash', false, 'center');
                return redirect()->route('settings.klikbud.home.service.index');
            }

            if ($store_image === false) {
                $this->checkStatus(false, trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.store'), 'flash', false, 'center');
                return redirect()->route('settings.klikbud.home.service.index');
            }
            abort(403);
        }
        abort(403);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.settings.klikbud.home.service.add');
    }


}
