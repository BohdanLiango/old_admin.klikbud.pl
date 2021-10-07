<?php

namespace App\Data;

class BreadcrumbsData extends Data
{
    private string $dashboard = 'Dashboard';

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
     * DashboardController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function dashboard($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'title' => $this->dashboard]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * AddressController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function address($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'title' => $this->dashboard],
            ['key' => 1, 'link' => route('global_settings.address.index'), 'title' => 'Adresy'],
            ['key' => 2, 'link' => '#', 'title' => 'Dodaj']
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }
}
