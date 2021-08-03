<?php

namespace App\Services\Klikbud\Contact;

use App\Repositories\Klikbud\Contact\ContactRepositories;
use Exception;
use Illuminate\Support\Facades\Log;

class ContactService
{
    /**
     * @param $id
     * @param ContactRepositories $contactRepositories
     * @return bool
     */
    public function changeStatusToRead($id, ContactRepositories $contactRepositories): bool
    {
        try {
            $contactRepositories->changeStatus($id, config('klikbud.klikbud.status_contact.read'));
            return true;
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id
     * @param ContactRepositories $contactRepositories
     * @return bool
     */
    public function delete($id, ContactRepositories $contactRepositories): bool
    {
        try{
            $contactRepositories->delete($id);
            return true;
        }catch (Exception $e) {
            Log::info($e->getMessage());
            return false;
        }
    }
}
