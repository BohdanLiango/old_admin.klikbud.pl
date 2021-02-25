<?php

namespace App\Helper;

use App\Models\Files\FileAdditionalInformation;
use App\Models\Files\Files;
use Illuminate\Support\Str;

class KlikbudFunctionsHelper extends Helper
{
    /**
     * @param $items_pl
     * @param $items_en
     * @param $items_ua
     * @param $items_ru
     * @return string[]
     */
    public function jsonSlug($items_pl, $items_en, $items_ua, $items_ru): array
    {
        return [
            "pl" => uniqid('', false) . Str::slug($items_pl),
            "en" => uniqid('', false) . Str::slug($items_en),
            "ua" => uniqid('', false) . Str::slug($items_ua),
            "ru" => uniqid('', false) . Str::slug($items_ru)
        ];
    }

    /**
     * @param $items_pl
     * @param $items_en
     * @param $items_ua
     * @param $items_ru
     * @return array
     */
    public function jsonData($items_pl, $items_en, $items_ua, $items_ru): array
    {
        return [
            "pl" => $items_pl,
            "en" => $items_en,
            "ua" => $items_ua,
            "ru" => $items_ru
        ];
    }

    /**
     * @param $image_id
     */
    public function deleteImage($image_id): void
    {
        try {
            FileAdditionalInformation::where('file_id', '=', $image_id)->delete();
        }catch (\Exception){
            abort(403);
        }

        try {
            Files::findOrFail($image_id)->delete();
        }catch (\Exception){
            abort(403);
        }
    }
}
