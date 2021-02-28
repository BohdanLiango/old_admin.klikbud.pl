<?php

namespace App\Services\Settings\Klikbud\Contact;

use App\Models\KLIKBUD\Contact;
use App\Services\Services;
use Exception;

class ContactService extends Services
{
    /**
     * @param $id
     */
    public function changeStatusToRead($id): void
    {
        $update = Contact::findOrFail($id);
        $data = [
            'user_read_id' => \Auth::user()->id,
            'status_id' => config('klikbud.klikbud.status_contact.read')
        ];
        $update->fill($data);
        $update->save();
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        try {
            $delete = Contact::findOrFail($id);
            $delete->delete();
            return true;
        }catch (Exception){
            return false;
        }
    }
}
