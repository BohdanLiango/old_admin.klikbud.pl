<?php

namespace App\Services\Warehouses;

use App\Models\Warehouses\StatusToolRegister;

class StatusToolRegisterService
{
    /**
     * @param $id
     * @param $tool_id
     * @param $table
     * @param $table_id
     * @param $status_id
     * @param $unique_number
     */
    public function storeRegister($id, $tool_id, $table, $table_id, $status_id, $unique_number): void
    {
        try {
            $store = new StatusToolRegister();
            $data = [
                'register_id' => $id,
                'tool_id' => $tool_id,
                'table' => $table,
                'table_id' => $table_id,
                'status_id' => $status_id,
                'unique_number' => $unique_number
            ];
            $store->fill($data)->save();
        }catch (\Exception $e){
            abort(403);
        }
    }

    /**
     * @param $tool_id
     */
    public function deleteRecords($tool_id)
    {
        StatusToolRegister::where('tool_id', $tool_id)->delete();
    }
}
