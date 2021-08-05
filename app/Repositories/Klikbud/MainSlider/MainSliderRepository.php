<?php

namespace App\Repositories\Klikbud\MainSlider;

use App\Models\Klikbud\MainSlider\MainSlider;

class MainSliderRepository
{
    /**
     * @param $slider_number_show
     * @param $user_id
     * @param $jsonAlt
     * @param $jsonTextYellow
     * @param $jsonTextBlack
     * @param $jsonDescription
     * @return MainSlider
     */
    public function store($slider_number_show, $user_id, $jsonAlt, $jsonTextYellow, $jsonTextBlack, $jsonDescription): MainSlider
    {
        $store = new MainSlider();
        $data = [
            'slider_number_show' => $slider_number_show,
            'user_id' => $user_id,
            'alt' => $jsonAlt,
            'textYellow' => $jsonTextYellow,
            'textBlack' => $jsonTextBlack,
            'description' => $jsonDescription
        ];
        $store->fill($data);
        $store->save();
        return $store;
    }

    /**
     * @param $id
     * @param $column
     * @param $data
     */
    public function changeOneColumn($id, $column, $data): void
    {
        $store = MainSlider::findOrFail($id);
        $store->$column = $data;
        $store->save();
    }

    /**
     * @param $id
     * @param $status_to_main_page_id
     * @param $number_show
     * @param $user_id
     * @param $moderated_id
     * @param $jsonAlt
     * @param $jsonTextYellow
     * @param $jsonTextBlack
     * @param $jsonDescription
     */
    public function update($id, $status_to_main_page_id, $number_show, $user_id, $moderated_id, $jsonAlt, $jsonTextYellow, $jsonTextBlack, $jsonDescription): void
    {
        $update = MainSlider::findOrFail($id);
        $data = [
            'status_to_main_page_id' => $status_to_main_page_id,
            'slider_number_show' => $number_show,
            'user_id' => $user_id,
            'moderated_id' => $moderated_id,
            'alt' => $jsonAlt,
            'textYellow' => $jsonTextYellow,
            'textBlack' => $jsonTextBlack,
            'description' => $jsonDescription
        ];
        $update->fill($data)->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOne($id): mixed
    {
        return MainSlider::findOrFail($id);
    }

    /**
     * @param $id
     */
    public function delete($id): void
    {
        MainSlider::findOrFail($id)->delete();
    }
}
