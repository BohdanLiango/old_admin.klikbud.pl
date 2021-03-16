<?php

namespace App\Http\Livewire\Settings\Klikbud\Contact;

use App\Http\Livewire\Settings\Settings;
use App\Models\KLIKBUD\Contact;
use Livewire\WithPagination;

class IndexLivewire extends Settings
{
    use WithPagination;

    public function render()
    {
        $contacts = Contact::orderBy('status_id', 'DESC')->paginate(12);

        $count = Contact::select('status_id')->get();
        $count_new = $count->where('status_id', '=', config('klikbud.klikbud.status_contact.new'))->count();
        $count_read = $count->where('status_id', '=', config('klikbud.klikbud.status_contact.read'))->count();
        $count_deleted = Contact::onlyTrashed()->count();
        $count_all = $count_deleted + $count_new + $count_read;

        return view('livewire.settings.klikbud.contact.index-livewire', compact('contacts', 'count_new', 'count_read', 'count_deleted', 'count_all'));
    }
}
