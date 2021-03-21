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
     * @return mixed
     */
    public function updateInfoShow($id): mixed
    {
        return Clients::select('mobile', 'email')->findOrFail($id);
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
                'status_id' => $status_id,
                'moderated_id' => 2
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
     * @return bool
     */
    public function store($first_name, $last_name, $gender_id, $mobile, $email, $site, $language, $timezone, $communication, $country_id, $state_id, $town_id,
                          $street_id, $add_info_address, $zip_code, $number_house, $number_flat):bool
    {
        try {
            $data = [
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
            $store = new Clients();
            $store->fill($data)->save();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @param $first_name
     * @param $last_name
     * @param $gender_id
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
    public function update($id, $first_name, $last_name, $gender_id, $site, $language, $timezone, $communication, $country_id, $state_id, $town_id,
                           $street_id, $add_info_address, $zip_code, $number_house, $number_flat): bool
    {
        try {
            $data = [
                'status_id' => 1,
                'first_name' => Str::title($first_name),
                'last_name' => Str::title($last_name),
                'gender_id' => $gender_id,
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
                'user_id' => Auth::id(),
                'moderated_id' => 2
            ];
            $store =  Clients::findOrFail($id);
            $store->fill($data)->save();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }


    /**
     * @param $id
     * @param $new_phone
     * @param $type
     * @return bool
     */
    public function updateCollectionData($id, $new_phone, $type): bool
    {
        try {
            $update = Clients::findOrfail($id);

            $collect_mobiles = collect($update->$type);

            $new_collect = $collect_mobiles->push($new_phone);

            $data = [
                $type => $new_collect,
                'moderated_id' => 2
            ];

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
            Clients::findOrFail($id)->delete();
            return true;
        }catch (\Exception $e){
            return false;
        }

    }
}
