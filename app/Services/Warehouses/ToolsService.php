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
}
