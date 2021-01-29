<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Opinions\Portal;

use App\Models\Files\FileAdditionalInformation;
use App\Models\Files\Files;
use App\Models\KLIKBUD\OpinionPortal;
use App\Services\Files\FilesDataService;
use Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Content extends Component
{
    public $store_title, $store_url, $store_image;
    public $pre_title, $pre_url, $pre_image;
    public $edit_title, $edit_url, $edit_image;
    public $actions, $selectedItem;


    use WithFileUploads;

    protected $messages = [
        'store_title.required' => 'Nazwa wymagana!',
        'store_url.required' => 'Link do strony wymagany!',
        'store_image.image' => 'To nie jest obrazek!',
        'store_image.max' => 'Maksymalny rozmiar obrazku 256 kb!',

        'edit_title.required' => 'Nazwa wymagana!',
        'edit_url.required' => 'Link do strony wymagany!',
        'edit_image.image' => 'To nie jest obrazek!',
        'edit_image.max' => 'Maksymalny rozmiar obrazku 256 kb!',
    ];

    public function render()
    {
        $portals = OpinionPortal::all();
        return view('livewire.settings.klikbud.home.opinions.portal.content',  compact('portals'));
    }

    private function resetInputFieldsStore()
    {
        $this->store_title = '';
        $this->store_url = '';
        $this->store_image = '';
    }

    public function store()
    {
        $this->validate([
            'store_title' => 'required',
            'store_url' => 'required',
            'store_image' => 'image|max:256',
        ]);

        $store = new OpinionPortal();

        $data = [
            'title' => $this->store_title,
            'url' => $this->store_url,
            'user_id' => Auth::id(),
        ];

        $store->fill($data);
        $store->save();

        $image_store = $this->store_image->store('/public/uploads/other/' . uniqid('portal', false));
        $class_make = app()->make(FilesDataService::class);
        $image_id = $class_make->storeKlikBudOpinionPortal($image_store, $store->id);
        OpinionPortal::findOrFail($store->id)->update(['image_id' => $image_id]);
        $this->resetInputFieldsStore();
        $this->dispatchBrowserEvent('closeStoreModal');
        session()->flash('message', 'Proszę wchodzić: Portal stworzony;)');
        session()->flash('alert-type', 'success');

    }

    public function selectItem($itemId, $action)
    {
        $this->selectedItem = $itemId;

        $showPreEditData = OpinionPortal::select(['title', 'url', 'image_id'])->findOrfail($this->selectedItem);
        $this->pre_title = $showPreEditData->title;
        $this->pre_url = $showPreEditData->url;
        $this->pre_image = $showPreEditData->image_id;

        if($action === 'edit')
        {
            $this->dispatchBrowserEvent('openEditModal');
        }

        if($action === 'delete')
        {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function edit()
    {
       $this->validate([
           'edit_title' => 'required',
           'edit_url' => 'required',
           'edit_image' => 'image|max:256',
       ]);

       $data = [];

        if ($this->edit_title !== $this->pre_title) {
            $data['title'] = $this->edit_title;
        }

        if ($this->edit_url !== $this->pre_url) {
            $data['url'] = $this->edit_title;
        }

        if ($this->edit_image !== $this->pre_image) {
            $image_store = $this->store_image->store('/public/uploads/other/' . uniqid('portal', false));
            $class_make = app()->make(FilesDataService::class);
            $image_id = $class_make->updateKlikBudOpinionPortal($image_store, $this->pre_image ,$this->selectedItem);
            $data['image_id'] = $image_id;
        }

        if(count($data)) {
            $data['user_id'] = Auth::id();
            OpinionPortal::findOrFail($this->selectedItem)->update($data);
            session()->flash('message', 'Portal edytowano!');
            session()->flash('alert-type', 'success');
            $this->dispatchBrowserEvent('closeEditModal');
        }

    }


    public function delete()
    {
        FileAdditionalInformation::where('file_id', '=', $this->pre_image)->delete();
        Files::where($this->pre_image)->delete();
        OpinionPortal::findOrFail($this->selectedItem)->delete();
        session()->flash('message', 'Suwak usunięty!');
        session()->flash('alert-type', 'success');
        $this->dispatchBrowserEvent('closeDeleteModal');
    }
}
