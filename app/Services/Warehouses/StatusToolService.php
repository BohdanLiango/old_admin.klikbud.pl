<?php

namespace App\Services\Warehouses;

use App\Models\Warehouses\StatusTool;

class StatusToolService extends StatusToolRegisterService
{
    /**
     * @param $tool_id
     * @param $table
     * @param $table_id
     */
    public function store_or_update($tool_id, $table, $table_id): void
    {
        try {
            $find = StatusTool::where('tool_id', $tool_id)->first();
            if(is_null($find))
            {
                $unique_number = bcrypt(md5($tool_id . now()));
                $store = new StatusTool();
                $data = [
                    'tool_id' => $tool_id,
                    'table' => $table,
                    'table_id' => $table_id,
                    'status_id' => config('klikbud.status_tools_status.start'),
                    'unique_number' => $unique_number
                ];
                $store->fill($data)->save();
                $this->storeRegister($store->id, $tool_id, $table, $table_id, config('klikbud.status_tools_status.start'), $unique_number);
            }else{
                $this->storeRegister($find->id, $find->tool_id, $find->table, $find->table_id, config('klikbud.status_tools_status.finish'), $find->unique_number);

                $unique_number = bcrypt(md5($table . $table_id . now()));
                $data = [
                    'tool_id' => $tool_id,
                    'table' => $table,
                    'table_id' => $table_id,
                    'status_id' => config('klikbud.status_tools_status.start'),
                    'unique_number' => $unique_number
                ];

                $find->fill($data)->save();

                $this->storeRegister($find->id, $tool_id, $table, $table_id, config('klikbud.status_tools_status.start'), $unique_number);
            }
        }catch (\Exception $e){
            abort(403);
        }
    }
}
