<?php

namespace App\Services\Settings\Other;

use App\Models\Address;
use App\Services\Services;
use Exception;
use Illuminate\Support\Str;

class AddressService extends Services
{
    /**
     * To CLientService
     * @param $id
     * @return mixed
     */
    public function showOneDataStreet($id): mixed
    {
        return Address::findOrFail($id);
    }

    /**
     * @param $title
     * @param $type_id
     * @param $country_id
     * @param $state_id
     * @param $town_id
     * @return array
     */
    public function dataCreator($title, $type_id, $country_id, $state_id, $town_id): array
    {
        $slug = Str::slug($title, '_');
        $user_id = \Auth::id();

        $dataStart = [
            'title' => $title,
            'slug' => $slug,
            'user_id' => $user_id,
            'type_id' => $type_id,
        ];

        if((int)$type_id === 2)
        {
            $state = [
                'country_id' => $country_id
            ];

            $data = array_merge($dataStart, $state);
        }

        if((int)$type_id === 3)
        {
            $town = [
                'country_id' => $country_id,
                'state_id' => $state_id
            ];

            $data = array_merge($dataStart, $town);
        }

        if((int)$type_id === 4)
        {
            $street = [
                'country_id' => $country_id,
                'state_id' => $state_id,
                'town_id' => $town_id
            ];

            $data = array_merge($dataStart, $street);
        }

        if ($type_id === 0 or $type_id === NULL or $type_id >= 5) {
             abort(404);
        }

        return $data;
    }

    /**
     * @param $title
     * @param $type_id
     * @param $country_id
     * @param $state_id
     * @param $town_id
     * @return bool
     */
    public function store($title, $type_id, $country_id, $state_id, $town_id): bool
    {
        try {
            $data = $this->dataCreator($title, $type_id, $country_id, $state_id, $town_id);
            $store = new Address();
            $store->fill($data)->save();
            return true;
        }catch (Exception $e){
            return false;
        }

    }

    /**
     * @param $id
     * @param $title
     * @param $type_id
     * @param $country_id
     * @param $state_id
     * @param $town_id
     * @return bool
     */
    public function update($id, $title, $type_id, $country_id, $state_id, $town_id): bool
    {
        try {
            $data = $this->dataCreator($title, $type_id, $country_id, $state_id, $town_id);
            $update = Address::findOrFail($id);
            $update->fill($data)->save();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @param $type_id
     * @return false
     */
    public function delete($id, $type_id): bool
    {
        if($type_id === 4)
        {
            Address::findOrFail($id)->delete();
            return true;
        }

        if($type_id === 3)
        {
            $count = Address::select('type_id')->where('type_id', '=', 4)->where('town_id', '=', $id)->count();
            if($count === 0)
            {
                Address::findOrFail($id)->delete();
                return true;
            }

            return false;
        }

        if($type_id === 2)
        {
            $count1 = Address::select('type_id')->where('type_id', '=', 4)->where('town_id', '=', $id)->count();
            $count2 = Address::select('type_id')->where('type_id', '=', 3)->where('state_id', '=', $id)->count();
            if($count1 === 0 && $count2 === 0)
            {
                Address::findOrFail($id)->delete();
                return true;
            }

            return false;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function selectAddressToGetData(): mixed
    {
        return Address::where('type_id', 4)->select('id', 'title', 'town_id', 'state_id', 'country_id')->get();
    }
}
