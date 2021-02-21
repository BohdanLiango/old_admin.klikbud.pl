<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Service;

use App\Models\KLIKBUD\Service;
use App\Services\Files\FilesDataService;
use App\Services\Settings\Klikbud\Home\ServicesService;
use Livewire\WithFileUploads;

class Edit extends ServiceLivewire
{
    use WithFileUploads;

    public $service;
    public $photo;
    public $oldPhoto_id;

    public $title_pl;
    public $description_pl;
    public $alt_pl;

    public $title_en;
    public $description_en;
    public $alt_en;

    public $title_ua;
    public $description_ua;
    public $alt_ua;

    public $title_ru;
    public $description_ru;
    public $alt_ru;

    /**
     * @var array|string[]
     */
    protected array $rules = [

        'title_pl' => 'required',
        'description_pl' => 'required',
        'alt_pl' => 'required',

        'title_en' => 'required',
        'description_en' => 'required',
        'alt_en' => 'required',

        'title_ua' => 'required',
        'description_ua' => 'required',
        'alt_ua' => 'required',

        'title_ru' => 'required',
        'description_ru' => 'required',
        'alt_ru' => 'required',
    ];

    public function mount($id)
    {
        $this->service = Service::findOrFail($id);

        $this->title_pl = $this->service->title['pl'];
        $this->description_pl = $this->service->description['pl'];
        $this->alt_pl = $this->service->alt['pl'];

        $this->title_en = $this->service->title['en'];
        $this->description_en = $this->service->description['en'];
        $this->alt_en = $this->service->alt['en'];

        $this->title_ua = $this->service->title['ua'];
        $this->description_ua = $this->service->description['ua'];
        $this->alt_ua = $this->service->alt['ua'];

        $this->title_ru = $this->service->title['ru'];
        $this->description_ru = $this->service->description['ru'];
        $this->alt_ru = $this->service->alt['ru'];

        $this->oldPhoto_id = $this->service->image_id;
    }

    public function render()
    {
        return view('livewire.settings.klikbud.home.service.edit');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit()
    {

        $this->validate();

        $update = app()->make(ServicesService::class)->update(
            $this->service->id, $this->title_pl, $this->title_en, $this->title_ua, $this->title_ru, $this->description_pl,
            $this->description_en, $this->description_ua, $this->description_ru, $this->alt_pl, $this->alt_en, $this->alt_ua, $this->alt_ru
        );

        if($update === true)
        {
            if($this->photo !== null)
            {
                $this->validate([
                    'photo' => 'image|max:256'
                ]);

                $store = $this->photo->store('/public/uploads/slider/' . uniqid('slider', false), 's3');

                if($this->service->image !== null)
                {
                    $image_id = app()->make(FilesDataService::class)->updateKlikBudService($store, $this->service->image_id, $this->service->id);
                }else{
                    $image_id = app()->make(FilesDataService::class)->storeKlikBudService($store, $this->service->id);
                }

                $update_image = app()->make(ServicesService::class)->storeImage($this->service->id, $image_id);

                $this->checkStatus($update_image, trans('admin_klikbud/settings/klikbud/service.sessions.edit'), 'flash', false, 'center');

                return redirect()->route('settings.klikbud.home.service.show', $this->service->id);
            }
            $this->checkStatus(true, trans('admin_klikbud/settings/klikbud/service.sessions.edit'), 'flash', false, 'center');
            return redirect()->route('settings.klikbud.home.service.show', $this->service->id);
        }

        $this->checkStatus(false, trans('admin_klikbud/settings/klikbud/service.sessions.messageDanger'), 'flash', false, 'center');
        return redirect()->route('settings.klikbud.home.service.show', $this->service->id);

    }

}
