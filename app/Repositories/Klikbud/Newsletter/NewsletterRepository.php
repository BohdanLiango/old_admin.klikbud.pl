<?php

namespace App\Repositories\Klikbud\Newsletter;

use App\Models\Klikbud\Newsletter\Newsletter;

class NewsletterRepository
{
    /**
     * @param $id
     */
    public function delete($id): void
    {
        Newsletter::findOrFail($id)->delete();
    }
}
