<?php

namespace App\Http\Livewire\Settings\Klikbud\Newsletter;

use App\Http\Livewire\Settings\Settings;
use App\Models\KLIKBUD\Newsletter;
use App\Services\Settings\Klikbud\Newsletter\NewsletterService;

class ShowLivewire extends Settings
{
    public $pre_id, $pre_email;
    public $searchQuery;

    public function render()
    {
        $newsletters = Newsletter::when($this->searchQuery != '', function ($query) {
            $query->where('email', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('ID', 'DESC')->paginate(20);
        $count_all_active = Newsletter::count();
        return view('livewire.settings.klikbud.newsletter.show-livewire', compact('newsletters', 'count_all_active'));
    }

    public function selectItem($action, $itemId)
    {
        $this->pre_id = $itemId;
        $showPreData = Newsletter::select('email')->findOrFail($itemId);
        $this->pre_email = $showPreData->email;

        if($action === 'delete')
        {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function resetInputFieldsDelete()
    {
        $this->dispatchBrowserEvent('closeDeleteModal');
        $this->pre_id = '';
        $this->pre_email = '';
    }


    public function delete($id)
    {
        $this->resetInputFieldsDelete();
        $this->checkStatus(app()->make(NewsletterService::class)->delete($id),
        trans('admin_klikbud/settings/klikbud/newsletter.delete-modal.success'),
            'alert', true, 'top-end');
    }


}
