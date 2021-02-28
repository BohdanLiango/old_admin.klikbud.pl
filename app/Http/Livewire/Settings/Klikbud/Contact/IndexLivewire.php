<?php

namespace App\Http\Livewire\Settings\Klikbud\Contact;

use App\Http\Livewire\Settings\Settings;
use App\Models\KLIKBUD\Contact;

class IndexLivewire extends Settings
{
    public function render()
    {
        $contacts = Contact::all()->orderBy('id', 'DESC')->paginate(12);
        return view('livewire.settings.klikbud.contact.index-livewire', compact('contacts'));
    }
}
