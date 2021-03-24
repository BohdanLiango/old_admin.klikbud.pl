<?php

namespace App\Services\Objects;

use App\Models\Objects\Objects;
use App\Services\Services;
use Illuminate\Support\Carbon;

class ObjectsService extends Services
{
    public function showAllToIndex($paginate)
    {
        return Objects::orderBy('id', 'DESC')->paginate($paginate);
    }

    public function showOne($id)
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
            if(!is_null($date_start))
            {
                $date_start = Carbon::createFromFormat('d/m/Y', $date_start)->format('Y-m-d');
            }

            if(!is_null($date_end))
            {
                $date_end = Carbon::createFromFormat('d/m/Y', $date_end)->format('Y-m-d');
            }

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
}
