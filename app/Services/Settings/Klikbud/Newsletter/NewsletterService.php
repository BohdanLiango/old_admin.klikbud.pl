<?php

namespace App\Services\Settings\Klikbud\Newsletter;

use App\Models\KLIKBUD\Newsletter;
use App\Services\Services;

class NewsletterService extends Services
{
    /**
     * SoftDelete and "ban" function
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        try {
            Newsletter::findOrFail($id)->delete();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}
