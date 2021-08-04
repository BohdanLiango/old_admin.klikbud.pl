<?php

namespace App\Services\Klikbud\Newsletter;

use App\Repositories\Klikbud\Newsletter\NewsletterRepository;
use Illuminate\Support\Facades\Log;

class NewsletterService
{
    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        try {
            (new NewsletterRepository)->delete($id);
            return true;
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }
}
