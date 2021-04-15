<?php

namespace App\Services\Warehouses;

use App\Models\Warehouses\Warehouses;

class WarehousesService
{
    /**
     * @return mixed
     */
    public function selectToForms(): mixed
    {
        try {
            return Warehouses::select('id', 'title', 'square')->get();
        }catch (\Exception $e){
            return NULL;
        }
    }
}
