<?php

namespace App\Services\Klikbud\Services;

use App\Helpers\KlikBudHelper;
use App\Repositories\Klikbud\Services\ServicesRepository;
use App\Services\HttpRequests\KlikBudGuzzleHttpRequestService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ServicesService
{
    /**
     * @param $data
     * @param KlikBudHelper $klikBudHelper
     * @param ServicesRepository $servicesRepository
     * @return mixed
     */
    public function store($data, KlikBudHelper $klikBudHelper, ServicesRepository $servicesRepository): mixed
    {
        try {
            $jsonSlug = $klikBudHelper->jsonSlug($data['title_pl'], $data['title_en'], $data['title_ua'], $data['title_ru']);
            $jsonTitle = $klikBudHelper->jsonData($data['title_pl'], $data['title_en'], $data['title_ua'], $data['title_ru']);
            $jsonDescription = $klikBudHelper->jsonData($data['description_pl'], $data['description_en'], $data['description_ua'], $data['description_ru']);
            $jsonAlt = $klikBudHelper->jsonData($data['alt_pl'], $data['alt_en'], $data['alt_ua'], $data['alt_ru']);
            return $servicesRepository->store(Auth::id(), $jsonSlug, $jsonAlt, $jsonTitle, $jsonDescription)->id;
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id
     * @param $title_pl
     * @param $title_en
     * @param $title_ua
     * @param $title_ru
     * @param $description_pl
     * @param $description_en
     * @param $description_ua
     * @param $description_ru
     * @param $alt_pl
     * @param $alt_en
     * @param $alt_ua
     * @param $alt_ru
     * @param KlikBudHelper $klikBudHelper
     * @param ServicesRepository $servicesRepository
     * @return bool
     */
    public function update($id, $title_pl, $title_en, $title_ua, $title_ru, $description_pl, $description_en, $description_ua, $description_ru,
                           $alt_pl, $alt_en, $alt_ua, $alt_ru, KlikBudHelper $klikBudHelper, ServicesRepository $servicesRepository): bool
    {
        try {
            $jsonSlug = $klikBudHelper->jsonSlug($title_pl, $title_en, $title_ua, $title_ru);
            $jsonTitle = $klikBudHelper->jsonData($title_pl, $title_en, $title_ua, $title_ru);
            $jsonDescription = $klikBudHelper->jsonData($description_pl, $description_en, $description_ua, $description_ru);
            $jsonAlt = $klikBudHelper->jsonData($alt_pl, $alt_en, $alt_ua, $alt_ru);
            $servicesRepository->update($id, config('klikbud.klikbud.status_to_main_page.not_visible'), Auth::id(), $jsonSlug, $jsonAlt, $jsonTitle, $jsonDescription);
            return true;
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id
     * @param $image_id
     * @param ServicesRepository $servicesRepository
     * @param KlikBudGuzzleHttpRequestService $klikBudGuzzleHttpRequestService
     * @return bool
     */
    public function storeImage($id, $image_id, ServicesRepository $servicesRepository, KlikBudGuzzleHttpRequestService $klikBudGuzzleHttpRequestService): bool
    {
        try{
            $servicesRepository->storeImage($id, $image_id);
            $klikBudGuzzleHttpRequestService->clearCacheRequest();
            return true;
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id
     * @param $status_id
     * @param ServicesRepository $servicesRepository
     * @param KlikBudGuzzleHttpRequestService $klikBudGuzzleHttpRequestService
     * @return bool
     */
    public function changeStatusToMainPage($id, $status_id, ServicesRepository $servicesRepository, KlikBudGuzzleHttpRequestService $klikBudGuzzleHttpRequestService): bool
    {
        try {
            $servicesRepository->changeStatus($id, $status_id);
            $klikBudGuzzleHttpRequestService->clearCacheRequest();
            return true;
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id
     * @param ServicesRepository $servicesRepository
     * @param KlikBudGuzzleHttpRequestService $klikBudGuzzleHttpRequestService
     * @param KlikBudHelper $klikBudHelper
     * @return bool
     */
    public function delete($id, ServicesRepository $servicesRepository, KlikBudGuzzleHttpRequestService $klikBudGuzzleHttpRequestService, KlikBudHelper $klikBudHelper): bool
    {
        try {
            if(isset($servicesRepository->findOne($id)->image_id))
            {
                $klikBudHelper->deleteImage($id);
            }

            $servicesRepository->delete($id);
            $klikBudGuzzleHttpRequestService->clearCacheRequest();
            return true;
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }


}
