<?php

namespace App\Services\Settings\Klikbud\Home;

use App\Helper\KlikbudFunctionsHelper;
use App\Models\KLIKBUD\MainSlider;
use App\Services\Service;
use Exception;
use Illuminate\Support\Facades\Auth;

class MainSliderService extends Service
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
     * @return false|mixed
     */
    public function store($data): mixed
    {
        try {

            $jsonAlt = $this->functions->jsonData(
                $data['alt_pl'],
                $data['alt_en'],
                $data['alt_ua'],
                $data['alt_ru']
            );

            $jsonTextYellow = $this->functions->jsonData(
                $data['yellow_text_pl'],
                $data['yellow_text_en'],
                $data['yellow_text_ua'],
                $data['yellow_text_ru']
            );

            $jsonTextBlack = $this->functions->jsonData(
                $data['black_text_pl'],
                $data['black_text_en'],
                $data['black_text_ua'],
                $data['black_text_ru']
            );

            $jsonDescription = $this->functions->jsonData(
                $data['description_pl'],
                $data['description_en'],
                $data['description_ua'],
                $data['description_ru']
            );


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
     * @param $status_id
     * @return bool
     */
    public function changeStatusToMainPage($id, $status_id): bool
    {
        try {
            $update = MainSlider::find($id);
            $update->status_to_main_page_id = $status_id;
            $update->save();
            return true;
        }catch (Exception){
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
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
            return true;
        }catch (Exception){
            return false;
        }
    }
}
