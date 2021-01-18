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

}
