<?php

namespace App\Services\Klikbud\MainSlider;

use App\Helpers\KlikBudHelper;
use App\Repositories\Klikbud\MainSlider\MainSliderRepository;

use App\Services\HttpRequests\KlikBudGuzzleHttpRequestService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MainSliderService
{
    /**
     * @param $data
     * @param KlikBudHelper $klikBudHelper
     * @param MainSliderRepository $mainSliderRepository
     * @return mixed
     */
    public function store($data, KlikBudHelper $klikBudHelper, MainSliderRepository $mainSliderRepository): mixed
    {
        try{
            $jsonAlt = $klikBudHelper->jsonData($data['alt_pl'], $data['alt_en'], $data['alt_ua'], $data['alt_ru']);
            $jsonTextYellow = $klikBudHelper->jsonData($data['yellow_text_pl'], $data['yellow_text_en'], $data['yellow_text_ua'], $data['yellow_text_ru']);
            $jsonTextBlack = $klikBudHelper->jsonData($data['black_text_pl'], $data['black_text_en'], $data['black_text_ua'], $data['black_text_ru']);
            $jsonDescription = $klikBudHelper->jsonData($data['description_pl'], $data['description_en'], $data['description_ua'], $data['description_ru']);
            return $mainSliderRepository->store($data['number_show'], Auth::id(), $jsonAlt, $jsonTextYellow, $jsonTextBlack, $jsonDescription)->id;
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id
     * @param $column
     * @param $data
     * @param $check
     * @param MainSliderRepository $mainSliderRepository
     * @param KlikBudGuzzleHttpRequestService $klikBudGuzzleHttpRequestService
     * @return bool
     */
    public function updateOneColumn($id, $column, $data, $check, MainSliderRepository $mainSliderRepository, KlikBudGuzzleHttpRequestService $klikBudGuzzleHttpRequestService): bool
    {
        try{
            $mainSliderRepository->changeOneColumn($id, $column, $data);
            if($check === true)
            {
                $klikBudGuzzleHttpRequestService->clearCacheRequest();
            }
            return true;
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id
     * @param $number_show
     * @param $alt_pl
     * @param $alt_en
     * @param $alt_ua
     * @param $alt_ru
     * @param $yellow_text_pl
     * @param $yellow_text_en
     * @param $yellow_text_ua
     * @param $yellow_text_ru
     * @param $black_text_pl
     * @param $black_text_en
     * @param $black_text_ua
     * @param $black_text_ru
     * @param $description_pl
     * @param $description_en
     * @param $description_ua
     * @param $description_ru
     * @param MainSliderRepository $mainSliderRepository
     * @param KlikBudHelper $klikBudHelper
     * @return bool
     */
    public function update($id, $number_show, $alt_pl, $alt_en, $alt_ua, $alt_ru, $yellow_text_pl, $yellow_text_en, $yellow_text_ua, $yellow_text_ru,
                           $black_text_pl, $black_text_en, $black_text_ua, $black_text_ru, $description_pl, $description_en, $description_ua,
                           $description_ru, MainSliderRepository $mainSliderRepository, KlikBudHelper $klikBudHelper): bool
    {
        try {
            $jsonAlt = $klikBudHelper->jsonData($alt_pl, $alt_en, $alt_ua, $alt_ru);
            $jsonTextYellow = $klikBudHelper->jsonData($yellow_text_pl, $yellow_text_en, $yellow_text_ua, $yellow_text_ru);
            $jsonTextBlack = $klikBudHelper->jsonData($black_text_pl, $black_text_en, $black_text_ua, $black_text_ru);
            $jsonDescription = $klikBudHelper->jsonData($description_pl, $description_en, $description_ua, $description_ru);
            $mainSliderRepository->update($id, config('klikbud.klikbud.status_to_main_page.not_visible'), $number_show, Auth::id(),
                config('klikbud.moderated.to_moderation'), $jsonAlt, $jsonTextYellow, $jsonTextBlack, $jsonDescription);
            return true;
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id
     * @param MainSliderRepository $mainSliderRepository
     * @param KlikBudGuzzleHttpRequestService $klikBudGuzzleHttpRequestService
     * @param KlikBudHelper $klikBudHelper
     * @return bool
     */
    public function delete($id, MainSliderRepository $mainSliderRepository, KlikBudGuzzleHttpRequestService $klikBudGuzzleHttpRequestService, KlikBudHelper $klikBudHelper): bool
    {
        try{
            $image_id = $mainSliderRepository->findOne($id)->image_id;
            if(isset($image_id))
            {
                $klikBudHelper->deleteImage($image_id);
            }
            $mainSliderRepository->delete($id);
            $klikBudGuzzleHttpRequestService->clearCacheRequest();
            return true;
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

}
