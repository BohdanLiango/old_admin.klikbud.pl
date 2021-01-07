<?php

namespace App\Data;

class BreadcrumbsData extends Data
{
    private $dashboard = 'Dashboard';

    /**
     * Main functions
     *
     * @param $key
     * @param $array
     * @param $array_merge
     * @return array
     */
    public function breadcrumbs($key, $array, $array_merge): array
    {
        if($array_merge !== NULL)
        {
            $array_store = array_merge($array, $array_merge);
        }else{
            $array_store = $array;
        }

        $collection = collect($array_store);
        return  $collection->where('key', '<=', $key)->all();
    }

    /**
     * Dashboard
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function dashboard($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }


}
