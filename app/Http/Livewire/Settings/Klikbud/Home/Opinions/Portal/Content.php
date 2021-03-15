<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\Opinions\Portal;

use App\Http\Livewire\Settings\Klikbud\Home\Opinions\OpinionLivewire;
use App\Models\KLIKBUD\OpinionPortal;
use App\Services\Files\FilesDataService;
use App\Services\Settings\Klikbud\Home\OpinionPortalService;
use Auth;
use Livewire\WithFileUploads;

class Content extends OpinionLivewire
{
    public $store_edit = false;
    public $id_opinion;
    public $store_title, $store_url, $store_image;
    public $pre_title, $pre_url, $pre_image, $pre_portal_data;
    public $edit_title, $edit_url, $edit_image;
    public $actions, $selectedItem;

    use WithFileUploads;

    protected $rules = [
        'store_edit' => 'required|bool',

        'store_title' => 'exclude_if:store_edit,true|required',
        'store_url' => 'exclude_if:store_edit,true|required',
        'store_image' => 'exclude_if:store_edit,true|nullable|image|max:256',

        'edit_title' => 'exclude_if:store_edit,false|required',
        'edit_url' => 'exclude_if:store_edit,false|required',
        'edit_image' => 'exclude_if:store_edit,false|nullable|image|max:256',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $portals = OpinionPortal::all();
        return view('livewire.settings.klikbud.home.opinions.portal.content',  compact('portals'));
    }

    public function resetInputFieldsStore()
    {
        $this->dispatchBrowserEvent('closeStoreModal');
        $this->store_title = '';
        $this->store_url = '';
        $this->store_image = '';
        $this->selectedItem = '';
        $this->actions = '';
    }

    public function resetInputFieldsEdit()
    {
        $this->dispatchBrowserEvent('closeEditModal');
        $this->pre_title = '';
        $this->pre_url = '';
        $this->pre_image = '';
        $this->pre_portal_data ='';
        $this->edit_title = '';
        $this->edit_url = '';
        $this->edit_image = '';
        $this->store_edit = false;
        $this->selectedItem = '';
        $this->actions = '';
    }

    public function resetInputFieldsDelete()
    {
        $this->dispatchBrowserEvent('closeDeleteModal');
        $this->store_edit = false;
        $this->selectedItem = '';
        $this->actions = '';
        $this->pre_title = '';
        $this->pre_url = '';
        $this->pre_image = '';
        $this->pre_portal_data ='';
    }

    public function store()
    {
        $this->validate();

        $store_id = app()->make(OpinionPortalService::class)->store($this->store_title,$this->store_url);

        try {
            if($store_id !== false)
            {
                if ($this->store_image !== null and $this->store_image !== "")
                {
                    $image_store = $this->store_image->store('/public/uploads/other/' . uniqid('portal', false), config('klikbud.disk_store'));
                    $image_id = app()->make(FilesDataService::class)->storeKlikBudOpinionPortal($image_store, $store_id);
                    app()->make(OpinionPortalService::class)->updateImage($store_id, $image_id);
                }
            }
            $this->checkStatus(
                true, trans('admin_klikbud/settings/klikbud/opinion-portal.session.success'),
                'alert', true, 'top-end'
            );
            $this->resetInputFieldsStore();
        }catch (\Exception){
            $this->checkStatus(
                false, trans('admin_klikbud/settings/klikbud/opinion-portal.session.danger'),
                'alert', true, 'top-end'
            );
        }
    }

    public function selectItem($itemId, $action)
    {
        $this->selectedItem = $itemId;

        $showPreEditData = OpinionPortal::select(['id', 'title', 'url', 'image_id'])->findOrfail($this->selectedItem);
        $this->pre_title = $showPreEditData->title;
        $this->pre_url = $showPreEditData->url;
        $this->pre_image = $showPreEditData->image_id;
        $this->pre_portal_data = $showPreEditData;

        if($action === 'edit')
        {
            $this->store_edit = true;
            $this->resetErrorBag();
            $this->resetValidation();
            $this->edit_title = $showPreEditData->title;
            $this->edit_url = $showPreEditData->url;
            $this->dispatchBrowserEvent('openEditModal');
        }

        if($action === 'delete')
        {
            $this->id_opinion = $showPreEditData->id;
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function edit()
    {
        $this->validate();

        $data = [];

        if($this->edit_image !== NULL and $this->edit_image !== "")
        {
           $image_store = $this->edit_image->store('/public/uploads/other/' . uniqid('portal', false), config('klikbud.disk_store'));
           $image_id = app()->make(FilesDataService::class)->updateKlikBudOpinionPortal($image_store, $this->pre_image, $this->selectedItem);
           $data['image_id'] = $image_id;
        }

        if ($this->edit_title !== $this->pre_title) {
            $data['title'] = $this->edit_title;
        }

        if ($this->edit_url !== $this->pre_url) {
            $data['url'] = $this->edit_url;
        }

        if(count($data)) {
            $data['user_id'] = Auth::id();
            $status_update = app()->make(OpinionPortalService::class)->edit($this->selectedItem, $data);
            $this->checkStatus(
                $status_update, trans('admin_klikbud/settings/klikbud/opinion-portal.session.edit'),
                'alert', true, 'top-end'
            );
            $this->resetInputFieldsEdit();
        }
    }

    public function delete($id)
    {
        $status_delete = app()->make(OpinionPortalService::class)->delete($id);
        $this->resetInputFieldsDelete();
        $this->checkStatus(
            $status_delete, trans('admin_klikbud/settings/klikbud/opinion-portal.session.delete'),
            'alert', true, 'top-end'
        );
    }
}
