<?php

namespace App\Services\Warehouses;

use App\Models\Warehouses\StatusTool;

class StatusToolService extends StatusToolRegisterService
{
    public function get_all()
    {
        return StatusTool::all();
    }

    /**
     * @param $id
     * @return null
     */
    public function getStatusToolData($id)
    {
        try {
            return StatusTool::where('tool_id', $id)->select('table', 'table_id')->first();
        }catch (\Exception $e){
            return NULL;
        }
    }

    /**
     * @param $tool_id
     * @param $table
     * @param $table_id
     * @return bool
     */
    public function store_or_update($tool_id, $table, $table_id): bool
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
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     * @param $tool_id
     * @return bool
     */
    public function delete($tool_id): bool
    {
        try {
            $this->deleteRecords($tool_id);
            StatusTool::where('tool_id', $tool_id)->delete();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}
