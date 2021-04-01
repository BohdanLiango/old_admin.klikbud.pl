<?php

namespace App\Services\Warehouses;

use App\Helper\KlikbudFunctionsHelper;
use App\Models\Warehouses\Tools;
use App\Services\Services;
use Exception;
use Illuminate\Support\Str;

class ToolsService extends Services
{
    public $helpers;

    public function __construct(KlikbudFunctionsHelper $klikbudFunctionsHelper)
    {
        $this->helpers = $klikbudFunctionsHelper;
    }

    public function showToolsToIndexPage($orderBy, $orderByType, $paginate)
    {
        return Tools::orderBy($orderBy, $orderByType)->paginate($paginate);
    }


    public function getBoxToForm()
    {
        return Tools::where('is_box', 1)->select('id', 'title')->get();
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
                'user_id' => \Auth::id()
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
}
