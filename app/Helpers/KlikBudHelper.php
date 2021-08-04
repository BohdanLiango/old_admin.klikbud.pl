<?php

namespace App\Helpers;

use App\Repositories\Files\FilesAdditionalInformationRepository;
use App\Repositories\Files\FilesRepository;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class KlikBudHelper extends Helper
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
        if(is_int($image_id))
        {
            try {
                (new FilesAdditionalInformationRepository)->delete($image_id);
            }catch (Exception $e){
                Log::info($e->getMessage());
                abort(403);
            }

            try {
                (new FilesRepository)->delete($image_id);
            }catch (Exception $e){
                Log::info($e->getMessage());
                abort(403);
            }
        }
    }

}
