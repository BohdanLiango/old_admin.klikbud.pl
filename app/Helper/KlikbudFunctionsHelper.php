<?php

namespace App\Helper;

use App\Data\DefaultData;
use App\Models\Files\FileAdditionalInformation;
use App\Models\Files\Files;
use App\Services\Settings\Other\AddressService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class KlikbudFunctionsHelper extends Helper
{
    public $address;
    public $defaultData;

    public function __construct(AddressService $addressService, DefaultData $defaultData)
    {
        $this->address = $addressService;
        $this->defaultData = $defaultData;
    }

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
        if($image_id !== NULL)
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

    /**
     * @param $date
     * @return string|null
     */
    public function changeFormatDateToInsertDataBase($date): ?string
    {
        if (!is_null($date)) {
            return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        }
        return null;
    }

    /**
     * @param $date
     * @return string|null
     */
    public function changeFormatDataToShow($date): ?string
    {
        if (!is_null($date)){
            return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
        }
        return null;
    }

    /**
     * @param $street_id
     * @return array
     */
    public function getAddressIdByStreetId($street_id): array
    {
        if(!is_null($street_id))
        {
            $get_info = $this->address->showOneDataStreet($street_id);

            return [
                'country_id' => $get_info->country_id,
                'state_id' => $get_info->state_id,
                'town_id' => $get_info->town_id
            ];
        }

        return  [
            'country_id' => NULL,
            'state_id' => NULL,
            'town_id' => NULL
        ];
    }

    /**
     * @param $business_title
     * @param $business_form_id
     * @param $business_form_other
     * @return string|null
     */
    public function changeTitleBusinessToEndFirmClassification($business_title, $business_form_id, $business_form_other): ?string
    {
        if($business_form_id === 99)
        {
            return $business_title . ' ' . $business_form_other;
        }

        foreach ($this->defaultData->form_business() as $form)
        {
            if((int)$business_form_id === (int)$form['value'])
            {
                return $business_title . ' ' . $form['title'];
            }
        }

        return NULL;
    }

}
