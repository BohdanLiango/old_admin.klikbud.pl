<?php

namespace App\Services\Settings\Klikbud\Home;

use App\Models\KLIKBUD\OpinionPortal;
use App\Services\Service;

class OpinionPortalService extends Service
{
    public function delete($id)
    {
        $opinion = OpinionPortal::find($id);

        if($opinion != null)
        {
            $opinion->delete();
        }
    }
}
