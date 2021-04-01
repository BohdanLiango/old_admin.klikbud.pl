<?php

namespace App\Services\Warehouses;

use App\Models\Warehouses\ToolsCategory;
use App\Services\Services;
use Illuminate\Support\Facades\Auth;

class ToolsCategoryService extends Services
{
    /**
     * @param $searchQuery
     * @param $searchType
     * @param $searchMain
     * @param $searchHalf
     * @param $orderBy
     * @param $orderByTable
     * @param $paginate
     * @return mixed
     */
    public function showAll($searchQuery, $searchType, $searchMain, $searchHalf, $orderBy, $orderByTable, $paginate): mixed
    {
        return ToolsCategory::when($searchQuery != '', function ($query) use ($searchQuery) {
            $query->where('title', 'like', '%' . $searchQuery . '%');
        })->when($searchType != '', function ($query) use ($searchType) {
            $query->where('type_id', 'like', '%' . $searchType . '%');
        })->when($searchMain != '', function ($query) use ($searchMain) {
            $query->where('main_category_id', 'like', '%' . $searchMain . '%');
        })->when($searchHalf != '', function ($query) use ($searchHalf) {
            $query->where('half_category_id', 'like', '%' . $searchHalf . '%');
        })->orderBy($orderByTable, $orderBy)->paginate($paginate);
    }

    /**
     * @param $table
     * @return mixed
     */
    public function selectOneTableGet($table): mixed
    {
        return ToolsCategory::select($table)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOneById($id): mixed
    {
        return ToolsCategory::findOrFail($id);
    }

    public function getCategoriesToForms()
    {
        return ToolsCategory::select('id', 'title', 'main_category_id', 'half_category_id', 'type_id')->get();
    }

    /**
     * @param $type_id
     * @return mixed
     */
    public function getDataWhereTypeIdTableId($type_id): mixed
    {
        return ToolsCategory::where('type_id', $type_id)->select('id', 'title', 'main_category_id', 'half_category_id')->get();
    }

    /**
     * @param $main_category_id
     * @return mixed
     */
    public function searchHalfCategories($main_category_id): mixed
    {
        return ToolsCategory::where('type_id', 2)->where('main_category_id', $main_category_id)->select('id', 'title')->get();
    }


    /**
     * @param $title
     * @param $main_category_id
     * @param $half_category_id
     * @param $type_id
     * @return array
     */
    public function dataCreator($title, $main_category_id, $half_category_id, $type_id): array
    {
        if ($type_id === 0 || $type_id === NULL || $type_id >= 4) {
            abort(404);
        }

        $user_id = Auth::id();

        $data= [
            'title' => $title,
            'user_id' => $user_id,
            'type_id' => (int)$type_id
        ];

        if((int)$type_id === 2)
        {
            $main_category = [
                'main_category_id' => $main_category_id
            ];

            $data = array_merge($data, $main_category);
        }

        if((int)$type_id === 3)
        {
            $half_category = [
                'main_category_id' => $this->findOneById($half_category_id)->main_category_id,
                'half_category_id' => $half_category_id
            ];

            $data = array_merge($data, $half_category);
        }
        return $data;
    }

    /**
     * @param $title
     * @param $main_category_id
     * @param $half_category_id
     * @param $type_id
     * @return bool
     */
    public function store($title, $main_category_id, $half_category_id, $type_id): bool
    {
        try {
            $store = new ToolsCategory();
            $store->fill($this->dataCreator($title, $main_category_id, $half_category_id, $type_id))->save();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @param $title
     * @param $main_category_id
     * @param $half_category_id
     * @param $type_id
     * @return bool
     */
    public function update($id, $title, $main_category_id, $half_category_id, $type_id)
    {
        try {
            $update = ToolsCategory::findOrfail($id);
            $update->fill($this->dataCreator($title, $main_category_id, $half_category_id, $type_id))->save();
            return true;
        }catch (\Exception $e){
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
            $this->findOneById($id)->delete($id);
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}
