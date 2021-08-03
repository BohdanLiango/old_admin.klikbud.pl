<?php

namespace App\Repositories\Files;

use App\Models\Files\Files;

class FilesRepository
{
    /**
     * @param $full_path
     * @return mixed
     */
    public function storeFiles($full_path): mixed
    {
        $store = new Files();
        $store->path = $full_path;
        $store->save();
        return $store->id;
    }

}
