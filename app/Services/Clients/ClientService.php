<?php

namespace App\Services\Clients;

use App\Models\Clients\Clients;
use App\Services\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ClientService extends Services
{
    /**
     * @param $id
     * @return mixed
     */
    public function showOne($id): mixed
    {
        return Clients::findOrfail($id);
    }

    /**
     * @param $id
     * @param $status_id
     * @return bool
     */
    public function changeStatus($id, $status_id): bool
    {
        try {
            $data = [
                'status_id' => $status_id
            ];

            $edit = Clients::findOrFail($id);
            $edit->fill($data)->save();

            return true;
        }catch (\Exception $e){
            return false;
        }
    }


    /**
     * @param $first_name
     * @param $last_name
     * @param $gender_id
     * @param $mobile
     * @param $email
     * @param $site
     * @param $language
     * @param $timezone
     * @param $communication
     * @param $country_id
     * @param $state_id
     * @param $town_id
     * @param $street_id
     * @param $add_info_address
     * @param $zip_code
     * @param $number_house
     * @param $number_flat
     * @return array
     */
    public function createdData($first_name, $last_name, $gender_id, $mobile, $email, $site, $language, $timezone, $communication, $country_id, $state_id, $town_id,
                                $street_id, $add_info_address, $zip_code, $number_house, $number_flat): array
    {
        return [
            'status_id' => 1,
            'first_name' => Str::title($first_name),
            'last_name' => Str::title($last_name),
            'gender_id' => $gender_id,
            'mobile' => $mobile,
            'email' => $email,
            'site' => $site,
            'language' => $language,
            'timezone' => $timezone,
            'communication' => $communication,
            'country_id' => $country_id,
            'state_id' => $state_id,
            'town_id' => $town_id,
            'street_id' => $street_id,
            'add_info_address' => $add_info_address,
            'zip_code' => $zip_code,
            'number_house' => $number_house,
            'number_flat' => $number_flat,
            'user_id' => Auth::id()
        ];
    }


    /**
     * @param $first_name
     * @param $last_name
     * @param $gender_id
     * @param $mobile
     * @param $email
     * @param $site
     * @param $language
     * @param $timezone
     * @param $communication
     * @param $country_id
     * @param $state_id
     * @param $town_id
     * @param $street_id
     * @param $add_info_address
     * @param $zip_code
     * @param $number_house
     * @param $number_flat
     * @return bool
     */
    public function store($first_name, $last_name, $gender_id, $mobile, $email, $site, $language, $timezone, $communication, $country_id, $state_id, $town_id,
                          $street_id, $add_info_address, $zip_code, $number_house, $number_flat):bool
    {
        try {
            $data = $this->createdData($first_name, $last_name, $gender_id, $mobile, $email, $site, $language, $timezone, $communication, $country_id, $state_id, $town_id,
                $street_id, $add_info_address, $zip_code, $number_house, $number_flat);
            $store = new Clients();
            $store->fill($data)->save();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}
