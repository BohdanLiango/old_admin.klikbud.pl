<?php

namespace App\Data;

class BreadcrumbsData extends Data
{
    private string $dashboard = 'Dashboard';
    private string $address = 'Adresy';
    private string $klikbudMainslider = 'Suwak';
    private string $klikbudService = 'Usługi';
    private string $klikbudCount = 'Liczniki';

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
    public function settings_klikbud_home_mainslider($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('settings.klikbud.home.slider.index'), 'name' => $this->klikbudMainslider]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * ServiceController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function settings_klikbud_home_service($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('settings.klikbud.home.service.index'), 'name' => $this->klikbudService]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * CountController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function settings_klikbud_home_count($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('settings.klikbud.home.count.index'), 'name' => $this->klikbudCount]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

}
