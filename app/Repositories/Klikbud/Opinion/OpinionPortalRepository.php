<?php

namespace App\Repositories\Klikbud\Opinion;

use App\Models\Klikbud\Opinion\OpinionPortal;

class OpinionPortalRepository
{
    /**
     * @param $title
     * @param $url
     * @param $user_id
     */
    public function store($title, $url, $user_id): void
    {
        $data = [
            'title' => $title,
            'url' => $url,
            'user_id' => $user_id,
        ];

        OpinionPortal::create($data);
    }


}
