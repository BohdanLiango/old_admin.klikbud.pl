<?php

namespace App\Data;

class BreadcrumbsData extends Data
{
    private string $dashboard = 'Dashboard';
    private string $address = 'Adresy';
    private string $klikbudMainslider = 'Suwak';

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
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard]
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
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('address.show'), 'name' => $this->address]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * MainSliderController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function settings_klikbud_home_mainslider($key, $array_merge)
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('settings.klikbud.home.slider.index'), 'name' => $this->klikbudMainslider]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

}
