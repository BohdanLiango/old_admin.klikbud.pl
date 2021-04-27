<?php

namespace App\Services\Warehouses;

use App\Helper\KlikbudFunctionsHelper;
use App\Models\Warehouses\StatusToolRegister;
use App\Models\Warehouses\Tools;
use App\Services\Services;
use Exception;
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
     * @return mixed
     */
    public function showToolsToIndexPage($searchMainCategory, $searchHalfCategory, $searchCategory,
                                         $searchQuery, $searchStatus, $searchGlobalStatusTable, $searchGlobalStatusId, $orderBy, $orderByType, $paginate): mixed
    {
        return Tools::when($searchQuery != '', function ($query) use ($searchQuery) {
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
            $query->whereIn('status_table', $searchGlobalStatusTable);
        })->when($searchGlobalStatusId != '', function ($query) use ($searchGlobalStatusId) {
            $query->whereIn('status_table_id', $searchGlobalStatusId);
        })->orderBy($orderBy, $orderByType)->paginate($paginate);
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
        return Tools::where('is_box', 1)->select('id', 'title')->get();
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
                'user_id' => \Auth::id(),
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
                $this->storeRegister($tool_id, $table, $table_id, config('klikbud.status_tools_status.finish'));
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
            ];
            $store->fill($data)->save();
        }catch (\Exception $e){
            abort(403);
        }
    }

}
