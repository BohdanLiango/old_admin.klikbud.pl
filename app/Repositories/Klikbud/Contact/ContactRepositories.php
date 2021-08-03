<?php

namespace App\Repositories\Klikbud\Contact;

use App\Models\Klikbud\Contact\Contact;
use Auth;

class ContactRepositories
{
    /**
     * @param $id
     * @param $status
     */
    public function changeStatus($id, $status): void
    {
        $update = Contact::findOrFail($id);
        $data = [
            'user_read_id' => Auth::user()->id,
            'status_id' => $status
        ];
        $update->fill($data);
        $update->save();
    }

    /**
     * @param $id
     */
    public function delete($id): void
    {
        $delete = Contact::findOrFail($id);
        $delete->delete();
    }
}
