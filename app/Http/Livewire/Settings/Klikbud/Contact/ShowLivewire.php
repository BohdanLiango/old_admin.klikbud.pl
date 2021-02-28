<?php

namespace App\Http\Livewire\Settings\Klikbud\Contact;

use App\Http\Livewire\Settings\Settings;
use App\Models\KLIKBUD\Contact;
use App\Services\Settings\Klikbud\Contact\ContactService;

class ShowLivewire extends Settings
{
    public $contact;
    public $contact_id;

    public function render()
    {
        sleep(0.4);
        return view('livewire.settings.klikbud.contact.show-livewire');
    }

    public function mount($id)
    {
        $this->contact = Contact::findOrFail($id);
        $this->contact_id = $id;
    }

    public function selectItem($action)
    {
        if($action === 'delete')
        {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function delete()
    {
        $this->checkStatus(
            app()->make(ContactService::class)->delete($this->contact_id),
            trans('admin_klikbud/settings/klikbud/contact.session.deleted'),
            'flash', false, 'center'
        );

        return redirect()->route('settings.klikbud.contact.index');
    }

}
