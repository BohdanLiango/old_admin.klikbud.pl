<?php

namespace App\Services\Settings\Klikbud\Home;

use App\Helper\KlikbudFunctionsHelper;
use App\Models\KLIKBUD\Service;
use App\Services\Services;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class ServicesService extends Services
{
    /**
     * @var KlikbudFunctionsHelper
     */
    private KlikbudFunctionsHelper $functions;

    /**
     * ServicesService constructor.
     * @param KlikbudFunctionsHelper $klikbudFunctionsHelper
     */
    public function __construct(KlikbudFunctionsHelper $klikbudFunctionsHelper)
    {
        $this->functions = $klikbudFunctionsHelper;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data): mixed
    {
        try {
            $jsonSlug = $this->functions->jsonSlug($data['title_pl'], $data['title_en'], $data['title_ua'], $data['title_ru']);
            $jsonTitle = $this->functions->jsonData($data['title_pl'], $data['title_en'], $data['title_ua'], $data['title_ru']);
            $jsonDescription = $this->functions->jsonData($data['description_pl'], $data['description_en'], $data['description_ua'], $data['description_ru']);
            $jsonAlt = $this->functions->jsonData($data['alt_pl'], $data['alt_en'], $data['alt_ua'], $data['alt_ru']);

            $store = new Service();

            $data = [
                'user_id' => Auth::id(),
                'slug' => $jsonSlug,
                'alt' => $jsonAlt,
                'title' => $jsonTitle,
                'description' => $jsonDescription,
            ];

            $store->fill($data)->save();

            return $store->id;

        }catch (Exception){

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
     * @return bool
     */
    public function update($id, $title_pl, $title_en, $title_ua, $title_ru, $description_pl, $description_en, $description_ua, $description_ru,
        $alt_pl, $alt_en, $alt_ua, $alt_ru): bool
    {
        try{
            $jsonSlug = $this->functions->jsonSlug($title_pl, $title_en, $title_ua, $title_ru);
            $jsonTitle = $this->functions->jsonData($title_pl, $title_en, $title_ua, $title_ru);
            $jsonDescription = $this->functions->jsonData($description_pl, $description_en, $description_ua, $description_ru);
            $jsonAlt = $this->functions->jsonData($alt_pl, $alt_en, $alt_ua, $alt_ru);

            $update = Service::findOrFail($id);

            $data =[
                'status_to_main_page_id' => config('klikbud.klikbud.status_to_main_page.not_visible'),
                'user_id' => Auth::id(),
                'slug' => $jsonSlug,
                'alt' => $jsonAlt,
                'title' => $jsonTitle,
                'description' => $jsonDescription,
            ];

            $update->fill($data)->save();

            return true;

        }catch (Exception){
            return false;
        }
    }

    /**
     * @param $id
     * @param $image_id
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function storeImage($id, $image_id): bool
    {
        try {
            $update = Service::findOrFail($id);
            $update->image_id = $image_id;
            $update->save();
            $response = (new Client())->request('GET', config('klikbud.url_to_clear_cache'));
            return true;
        }catch (Exception){
            return false;
        }
    }

    /**
     * @param $id
     * @param $status_id
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changeStatusToMainPage($id, $status_id): bool
    {
        try {
            $update = Service::find($id);
            $update->status_to_main_page_id = $status_id;
            $update->save();
            $response = (new Client())->request('GET', config('klikbud.url_to_clear_cache'));
            return true;
        }catch (Exception){
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($id): bool
    {
        try {
            $delete = Service::find($id);
            if(isset($delete->image_id))
            {
                $this->functions->deleteImage($delete->image_id);
            }
            $delete->delete();
            $response = (new Client())->request('GET', config('klikbud.url_to_clear_cache'));
            return true;
        }catch (Exception){
            return false;
        }
    }
}
