<?php

namespace App\Data;

use Illuminate\Support\Collection;

class ActionsData extends Data
{
    /**
     * Show One
     * @param $key
     * @param $array
     *
     * @return Collection
     */
    private function action($key, $array): Collection
    {
        $collections = collect($array);

        return $collections->where('key','=',$key);
    }

    /**
     * Show All
     * @param $array
     *
     * @return array
     */
    private function actions($array): array
    {
        return collect($array)->all();
    }

    /**
     * @param $key
     * @return Collection
     */
    public function settings_klikbud_home_slider($key): Collection
    {
        $array = [
            ['key' => 1, 'route' => 'settings.klikbud.home.slider.create', 'color' => 'success', 'name' => 'Dodaj']
        ];

        return $this->action($key, $array);
    }

    /**
     * @param $key
     * @return Collection
     */
    public function settings_klikbud_home_service($key): Collection
    {
        $array = [
            ['key' => 1, 'route' => 'settings.klikbud.home.service.create', 'color' => 'success', 'name' => 'Dodaj']
        ];

        return $this->action($key, $array);
    }

    /**
     * @return array
     */
    public function settings_klikbud_home_opinion(): array
    {
        $array = [
            ['key' => 1, 'route' => 'settings.klikbud.home.opinion.create', 'color' => 'success', 'name' => 'Dodaj'],
            ['key' => 2, 'route' => 'settings.klikbud.home.opinion.portal.index', 'color' => 'primary', 'name' => 'Portaly']
        ];

        return $this->actions($array);
    }

    /**
     * @param $key
     * @return Collection
     */
    public function settings_klikbud_gallery($key): Collection
    {
        $array = [
            ['key' => 1, 'route' => 'settings.klikbud.gallery.create', 'color' => 'success', 'name' => 'Dodaj']
        ];

        return $this->action($key, $array);
    }

}
