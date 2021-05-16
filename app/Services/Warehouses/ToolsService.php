<?php

namespace App\Services\Warehouses;

use App\Helper\KlikbudFunctionsHelper;
use App\Models\Warehouses\StatusToolRegister;
use App\Models\Warehouses\Tools;
use App\Services\Services;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ToolsService extends Services
{
    public $helpers;
    public $globalStatus;

    public function __construct(KlikbudFunctionsHelper $klikbudFunctionsHelper)
    {
        $this->helpers = $klikbudFunctionsHelper;
    }

    /**
     * @param $searchBox
     * @param $box_id
     * @param $searchMainCategory
     * @param $searchHalfCategory
     * @param $searchCategory
     * @param $searchQuery
     * @param $searchStatus
     * @param $searchGlobalStatusTable
     * @param $searchGlobalStatusId
     * @param $orderBy
     * @param $orderByType
     * @param $paginate
     * @param $is_new
     * @return mixed
     */
    public function showToolsToIndexPage($searchBox, $box_id, $searchMainCategory, $searchHalfCategory, $searchCategory,
                                         $searchQuery, $searchStatus, $searchGlobalStatusTable, $searchGlobalStatusId, $orderBy, $orderByType, $paginate, $is_new): mixed
    {
        $query = Tools::when($searchQuery != '', function ($query) use ($searchQuery) {
            $query->where('title', 'like', '%' . $searchQuery . '%');
        })->when($searchStatus != '', function ($query) use ($searchStatus) {
            $query->where('status_tool_id', 'like', '%' . $searchStatus . '%');
        })->when($searchMainCategory != '', function ($query) use ($searchMainCategory) {
            $query->where('main_category_id', 'like', '%' . $searchMainCategory . '%');
        })->when($searchHalfCategory != '', function ($query) use ($searchHalfCategory) {
            $query->where('half_category_id', 'like', '%' . $searchHalfCategory . '%');
        })->when($searchCategory != '', function ($query) use ($searchCategory) {
            $query->where('category_id', 'like', '%' . $searchCategory . '%');
        })->when($searchGlobalStatusTable != '', function ($query) use ($searchGlobalStatusTable) {
            $query->where('status_table', $searchGlobalStatusTable);
        })->when($searchGlobalStatusId != '', function ($query) use ($searchGlobalStatusId) {
            $query->where('status_table_id', $searchGlobalStatusId);
        })->when($searchBox != '', function ($query) use ($searchBox) {
            $query->where('box_id', $searchBox);
        })->where('box_id', $box_id)->orderBy($orderBy, $orderByType)->paginate($paginate);

        if($is_new === true)
        {
            return Tools::where('status_table', NULL)->orderBy($orderBy, $orderByType)->paginate($paginate);
        }

        return $query;
    }

    /**
     * @param $box_id
     * @param $paginate
     * @return mixed
     */
    public function getAllWhereBoxId($box_id, $paginate): mixed
    {
        return Tools::where('box_id', $box_id)
            ->select('id', 'category_id', 'half_category_id', 'main_category_id', 'title', 'image_id', 'slug')
            ->orderBy('id', 'desc')
            ->paginate($paginate);
    }

    public function getSlug($id)
    {
        return Tools::findOrFail($id)->slug;
    }

    /**
     * @return mixed
     */
    public function getBoxToForm()
    {
        return Tools::where('is_box', 1)->select('id', 'title', 'slug')->get();
    }

    /**
     * @return bool|int
     */
    public function getAllActiveToolsSelectIdCount(): bool|int
    {
        try {
            return Tools::select('id')->count();
        }catch (Exception $e){
            return  false;
        }
    }

    /**
     * @return bool|int
     */
    public function getAllTrashedToolsSelectIdCount(): bool|int
    {
        try {
            return Tools::onlyTrashed()->select('id')->count();
        }catch (Exception $e){
            return  false;
        }
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function showOneBySlug($slug): mixed
    {
        $return = Tools::where('slug', $slug)->first();

        if(!is_null($return))
        {
            return $return;
        }
        abort(404);
        return false;
    }

    /**
     * @param $tools
     * @return array
     */
    private function creatorData($tools): array
    {
        try {
            $collect = collect($tools);

            return [
                'category_id' => $collect->get('category_id'),
                'half_category_id' =>  $collect->get('half_category_id'),
                'main_category_id' =>  $collect->get('main_category_id'),
                'title' =>  Str::title($collect->get('title')),
                'description' =>  Str::title($collect->get('description')),
                'purchase_date' =>  $this->helpers->changeFormatDateToInsertDataBase($collect->get('purchase_date')),
                'price' =>  $collect->get('price'),
                'serial_number' => $collect->get('serial_number'),
                'business_departments_id' =>  $collect->get('business_departments_id'),
                'manufacturer_id' =>  $collect->get('manufacturer_id'),
                'guarantee_date_end' =>  $this->helpers->changeFormatDateToInsertDataBase($collect->get('guarantee_date_end')),
                'is_box' =>  $collect->get('is_box'),
                'user_id' => Auth::id(),
                'status_table' => NULL,
                'status_table_id' => NULL
            ];
        }catch (Exception $e){
            abort(403);
        }
    }

    /**
     * @param $tools
     * @return mixed
     */
    public function store($tools): mixed
    {
        try {
            $store = new Tools();
            $store->fill($this->creatorData($tools))->save();
            return $store->id;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @param $tools
     * @return bool
     */
    public function update($id, $tools): bool
    {
        try {
            $update = Tools::findOrFail($id);
            $collect = collect($tools);
            if((int)$collect->get('main_category_id') !== (int)$update->main_category_id)
            {
                if((int)$collect->get('half_category_id') === (int)$update->half_category_id)
                {
                    $collect->forget('half_category_id');
                    $collect->forget('category_id');
                }
            }

            if((int)$collect->get('half_category_id') !== (int)$update->half_category_id)
            {
                if((int)$collect->get('category_id') === (int)$update->category_id)
                {
                    $collect->forget('category_id');
                }
            }
            $update->fill($this->creatorData($collect->toArray()))->save();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @param $guarantee_file_id
     * @return bool
     */
    public function storeGuaranteeFile($id, $guarantee_file_id): bool
    {
        try {
            $store = Tools::findOrFail($id);
            $store->guarantee_file_id = $guarantee_file_id;
            $store->save();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @param $image_id
     * @return bool
     */
    public function storeImage($id, $image_id): bool
    {
        try {
            $store = Tools::findOrFail($id);
            $store->image_id = $image_id;
            $store->save();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @param $record
     * @param $new_data
     * @return bool
     */
    public function changeOneRecord($id, $record, $new_data): bool
    {
        try {
            $store = Tools::findOrFail($id);
            $store->$record = $new_data;
            $store->save();
            return true;
        }catch (Exception $e){
            return false;
        }
    }


    /**
     * @param $tool_id
     * @param $box_id
     * @param $old_box_id
     * @return bool
     */
    public function changeBox($tool_id, $box_id, $old_box_id): bool
    {
        try {
            if(!is_null($old_box_id))
            {
                $this->updateRegisterToStatusDisable($tool_id, config('klikbud.status_tools_table.box'), $old_box_id);
            }

            $this->changeOneRecord($tool_id, config('klikbud.status_tools_table.box'), $box_id); //To tool add box_id
            $this->storeRegister($tool_id, config('klikbud.status_tools_table.box'), $box_id, 1); // History save

            /**
             * Get last global status tool, and end it
             */
            $status_tool_last = $this->getRegisterDataLast($tool_id);
            if(!is_null($status_tool_last))
            {
                $this->updateRegisterToStatusDisable($tool_id, $status_tool_last->table, $status_tool_last->table_id);
            }

            /**
             * Get last global status BOX and change global status BOX->TOOL
             */
            $status_box_last = $this->getRegisterDataLast($box_id);
            if(!is_null($status_box_last))
            {
                $this->storeOrUpdateGlobalData($tool_id, $status_box_last->table, $status_box_last->table_id);
            }
            return true;

        }catch (Exception $e){
            return false;
        }
    }

    /**
     * @param $tool_id
     * @param $box_id
     * @return bool
     */
    public function deleteBoxIdInTool($tool_id, $box_id): bool
    {
        try {
            $this->changeOneRecord($tool_id, config('klikbud.status_tools_table.box'), NULL);
            $this->updateRegisterToStatusDisable($tool_id, config('klikbud.status_tools_table.box'), $box_id);
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * @param $box_id
     * @return mixed
     */
    public function selectToolsIdInBox($box_id): mixed
    {
        return Tools::where('box_id', $box_id)->select('id')->get();
    }


    /**
     * @param $box_id
     * @param $table
     * @param $table_id
     * @return bool
     */
    public function changeStatusGlobalBoxAndAllToolsInBox($box_id, $table, $table_id): bool
    {
        try {
            $get_tools = $this->selectToolsIdInBox($box_id);
            $this->storeOrUpdateGlobalData($box_id, $table, $table_id); //Status global Box

            if(count($get_tools) > 0)
            {
                foreach ($get_tools as $tool)
                {
                    $this->storeOrUpdateGlobalData($tool->id, $table, $table_id); //Change status BOX->TOOLS
                }
            }

            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @param $status_id
     * @param $status_description
     * @return bool
     */
    public function changeStatusTool($id, $status_id, $status_description): bool
    {
        try {
            $store = Tools::findOrFail($id);
            $store->status_tool_id = $status_id;
            $store->status_description = $status_description;
            $store->save();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        try {
            $tools = Tools::findOrFail($id);
            $this->helpers->deleteImage($tools->image_id);
            $tools->delete();
            $this->globalStatus->delete($id);
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Global Status
     * @param $tool_id
     * @param $table
     * @param $table_id
     * @return bool
     */
    public function storeOrUpdateGlobalData($tool_id, $table, $table_id): bool
    {
        try {
            $find = Tools::findOrFail($tool_id);
            if(is_null($find->status_table) && is_null($find->status_table_id))
            {
                $data = [
                    'status_table' => $table,
                    'status_table_id' => $table_id
                ];
                $find->fill($data)->save();
                $this->storeRegister($tool_id, $table, $table_id, config('klikbud.status_tools_status.start'));
            }else{
                $this->updateRegisterToStatusDisable($tool_id, $find->status_table, $find->status_table_id);
                $data = [
                    'status_table' => $table,
                    'status_table_id' => $table_id
                ];
                $find->fill($data)->save();
                $this->storeRegister($tool_id, $table, $table_id, config('klikbud.status_tools_status.start'));
            }
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Store data to accountant service
     * @param $tool_id
     * @param $table
     * @param $table_id
     * @param $status_id
     */
    public function storeRegister($tool_id, $table, $table_id, $status_id): void
    {
        try {
            $store = new StatusToolRegister();
            $data = [
                'tool_id' => $tool_id,
                'table' => $table,
                'table_id' => $table_id,
                'status_id' => $status_id,
                'user_id' => Auth::id()
            ];
            $store->fill($data)->save();
        }catch (\Exception $e){
            abort(403);
        }
    }

    /**
     * @param $tool_id
     * @param $table
     * @param $table_id
     * @return bool
     */
    public function updateRegisterToStatusDisable($tool_id, $table, $table_id): bool
    {
        try {
            $update = StatusToolRegister::where('tool_id', $tool_id)->where('table', $table)->where('table_id', $table_id)->orderBy('id', 'desc')->first();
            $data = [
                'status_id' => config('klikbud.status_tools_status.finish'),
                'user_last_update_id' => Auth::id()
            ];
            $update->fill($data)->save();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * @param $tool_id
     * @param $paginate
     * @return mixed
     */
    public function getRegisterData($tool_id, $paginate): mixed
    {
        return StatusToolRegister::where('tool_id', $tool_id)->orderBy('id', 'desc')->paginate($paginate);
    }

    /**
     * @param $paginate
     * @return mixed
     */
    public function getAllDataRegisterToTools(): mixed
    {
        return StatusToolRegister::select('tool_id', 'table', 'table_id')->get();
    }

    /**
     * @param $tool_id
     * @return mixed
     */
    public function getRegisterDataLast($tool_id): mixed
    {
        return StatusToolRegister::where('tool_id', $tool_id)->where('table', '!=', config('klikbud.status_tools_table.box'))->orderBy('id', 'desc')->first();
    }

}
