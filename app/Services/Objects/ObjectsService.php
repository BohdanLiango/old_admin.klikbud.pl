<?php

namespace App\Services\Objects;

use App\Helper\KlikbudFunctionsHelper;
use App\Models\Objects\Objects;
use App\Services\Services;

class ObjectsService extends Services
{
    public $helpers;

    public function __construct(KlikbudFunctionsHelper $klikbudFunctionsHelper)
    {
        $this->helpers = $klikbudFunctionsHelper;
    }

    public function showAllToIndex($paginate)
    {
        return Objects::orderBy('id', 'DESC')->paginate($paginate);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showOne($id): mixed
    {
        return Objects::findOrFail($id);
    }


    /**
     * @param $title
     * @param $description
     * @param $price_start
     * @param $m2
     * @param $date_start
     * @param $date_end
     * @param $country_id
     * @param $state_id
     * @param $town_id
     * @param $street_id
     * @param $number
     * @param $apartment_number
     * @param $zip_code
     * @param $status_object_id
     * @param $type_object_id
     * @param $type_repair_id
     * @param $client_id
     * @param $address_add_info
     * @return mixed
     */
    public function store($title, $description, $price_start, $m2, $date_start, $date_end, $country_id, $state_id,
                          $town_id, $street_id, $number, $apartment_number, $zip_code, $status_object_id, $type_object_id,
                          $type_repair_id, $client_id, $address_add_info): mixed
    {
        try {
            $date_start = $this->helpers->changeFormatDateToInsertDataBase($date_start);
            $date_end = $this->helpers->changeFormatDateToInsertDataBase($date_end);
            $data = [
                'title' => $title,
                'description' => $description,
                'price_start' => $price_start,
                'm2' => $m2,
                'date_start' => $date_start,
                'date_end' => $date_end,
                'country_id' => $country_id,
                'state_id' => $state_id,
                'town_id' => $town_id,
                'street_id' => $street_id,
                'address_add_info' => $address_add_info,
                'number' => $number,
                'apartment_number' => $apartment_number,
                'zip_code' => $zip_code,
                'status_object_id' => $status_object_id,
                'type_object_id' => $type_object_id,
                'type_repair_id' => $type_repair_id,
                'client_id' => $client_id,
                'user_id' => \Auth::id(),

            ];
            $store = new Objects();
            $store->fill($data)->save();
            return $store->id;
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @param $title
     * @param $description
     * @param $price_start
     * @param $m2
     * @param $date_start
     * @param $date_end
     * @param $street_id
     * @param $number
     * @param $apartment_number
     * @param $zip_code
     * @param $client_id
     * @param $address_add_info
     * @return bool
     */
    public function update($id, $title, $description, $price_start, $m2, $date_start, $date_end,
                           $street_id, $number, $apartment_number, $zip_code, $client_id, $address_add_info): bool
    {
        try {
            $date_start = $this->helpers->changeFormatDateToInsertDataBase($date_start);
            $date_end = $this->helpers->changeFormatDateToInsertDataBase($date_end);
            $address = $this->helpers->getAddressIdByStreetId($street_id);

            $data = [
                'title' => $title,
                'description' => $description,
                'price_start' => $price_start,
                'm2' => $m2,
                'date_start' => $date_start,
                'date_end' => $date_end,
                'country_id' => $address['country_id'],
                'state_id' => $address['state_id'],
                'town_id' => $address['town_id'],
                'street_id' => $street_id,
                'address_add_info' => $address_add_info,
                'number' => $number,
                'apartment_number' => $apartment_number,
                'zip_code' => $zip_code,
                'client_id' => $client_id,
            ];

            $update = Objects::findOrFail($id);
            $update->fill($data)->save();
            return true;
        }catch (\Exception $e){
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
            Objects::findOrFail($id)->delete();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}
