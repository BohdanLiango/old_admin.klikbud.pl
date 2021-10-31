<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class Helper
{
    /**
     * Check authorize
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Create Data to KLIKBUD Services
     * @param $items_pl
     * @param $items_en
     * @param $items_ua
     * @param $items_ru
     * @return array
     */
    public function createJsonData($items_pl, $items_en, $items_ua, $items_ru): array
    {
        return [
            "pl" => $items_pl,
            "en" => $items_en,
            "ua" => $items_ua,
            "ru" => $items_ru
        ];
    }

    /**
     * Create Slug to KLIKBUD Services
     * @param $items_pl
     * @param $items_en
     * @param $items_ua
     * @param $items_ru
     * @return string[]
     */
    public function createJsonSlug($items_pl, $items_en, $items_ua, $items_ru): array
    {
        return [
            "pl" => uniqid('', false) . Str::slug($items_pl),
            "en" => uniqid('', false) . Str::slug($items_en),
            "ua" => uniqid('', false) . Str::slug($items_ua),
            "ru" => uniqid('', false) . Str::slug($items_ru)
        ];
    }
}
