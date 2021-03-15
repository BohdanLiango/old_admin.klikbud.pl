<?php

namespace App\Services\Settings\Klikbud\Home;

use App\Helper\KlikbudFunctionsHelper;
use App\Models\KLIKBUD\MainSlider;
use App\Services\Services;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Auth;

class MainSliderService extends Services
{
    /**
     * @var KlikbudFunctionsHelper
     */
    private KlikbudFunctionsHelper $functions;

    /**
     * MainSliderService constructor.
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

            $jsonAlt = $this->functions->jsonData($data['alt_pl'], $data['alt_en'], $data['alt_ua'], $data['alt_ru']);
            $jsonTextYellow = $this->functions->jsonData($data['yellow_text_pl'], $data['yellow_text_en'], $data['yellow_text_ua'], $data['yellow_text_ru']);
            $jsonTextBlack = $this->functions->jsonData($data['black_text_pl'], $data['black_text_en'], $data['black_text_ua'], $data['black_text_ru']);
            $jsonDescription = $this->functions->jsonData($data['description_pl'], $data['description_en'], $data['description_ua'], $data['description_ru']);

            $store = new MainSlider();

            $data = [
                'slider_number_show' => $data['number_show'],
                'user_id' => Auth::id(),
                'alt' => $jsonAlt,
                'textYellow' => $jsonTextYellow,
                'textBlack' => $jsonTextBlack,
                'description' => $jsonDescription
            ];

            $store->fill($data);
            $store->save();
            return $store->id;
        }catch (Exception){
            return false;
        }
    }

    /**
     * @param $id
     * @param $image_id
     * @return bool
     */
    public function storeImage($id, $image_id): bool
    {
        try {
            $update = MainSlider::findOrFail($id);
            $update->image_id = $image_id;
            $update->save();
            return true;
        }catch (Exception){
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
     * @return bool
     */
    public function update($id, $number_show, $alt_pl, $alt_en, $alt_ua, $alt_ru, $yellow_text_pl, $yellow_text_en, $yellow_text_ua, $yellow_text_ru,
    $black_text_pl, $black_text_en, $black_text_ua, $black_text_ru, $description_pl, $description_en, $description_ua, $description_ru): bool
    {
        try {

            $jsonAlt = $this->functions->jsonData($alt_pl, $alt_en, $alt_ua, $alt_ru);
            $jsonTextYellow = $this->functions->jsonData($yellow_text_pl, $yellow_text_en, $yellow_text_ua, $yellow_text_ru);
            $jsonTextBlack = $this->functions->jsonData($black_text_pl, $black_text_en, $black_text_ua, $black_text_ru);
            $jsonDescription = $this->functions->jsonData($description_pl, $description_en, $description_ua, $description_ru);

            $update = MainSlider::findOrFail($id);

            $data = [
                'status_to_main_page_id' => config('klikbud.klikbud.status_to_main_page.not_visible'),
                'slider_number_show' => $number_show,
                'user_id' => Auth::id(),
                'moderated_id' => config('klikbud.moderated.to_moderation'),
                'alt' => $jsonAlt,
                'textYellow' => $jsonTextYellow,
                'textBlack' => $jsonTextBlack,
                'description' => $jsonDescription
            ];

            $update->fill($data)->save();

            return true;

        }catch (Exception){

            return false;

        }
    }

    /**
     * @param $id
     * @param $status_id
     * @return bool
     * @throws GuzzleException
     */
    public function changeStatusToMainPage($id, $status_id): bool
    {
        try {
            $update = MainSlider::find($id);
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
     * @throws GuzzleException
     */
    public function delete($id): bool
    {
        try {
            $delete = MainSlider::find($id);
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
