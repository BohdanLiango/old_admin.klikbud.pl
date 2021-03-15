<?php

namespace App\Services\Settings\Other;

use App\Models\Address;
use App\Services\Services;
use Illuminate\Support\Str;

class AddressService extends Services
{
    public function store($title, $type_id, $country_id, $state_id, $town_id)
    {
        $slug = Str::slug($title, '_');
        $user_id = \Auth::id();

        $dataStart = [
            'title' => $title,
            'slug' => $slug,
            'user_id' => $user_id,
            'type_id' => $type_id,
        ];

        if($type_id === 2)
        {
            $state = [
                'country_id' => $country_id
            ];

            $data = array_merge($dataStart, $state);
        }

        if($type_id === 3)
        {
            $town = [
                'country_id' => $country_id,
                'state_id' => $state_id
            ];

            $data = array_merge($dataStart, $town);
        }

        if($type_id === 4)
        {
            $street = [
                'country_id' => $country_id,
                'state_id' => $state_id,
                'town_id' => $town_id
            ];

            $data = array_merge($dataStart, $street);
        }

        $store = new Address();
        $store->fill($data)->save();

        return $store->id;
    }

    public function delete($id, $type_id)
    {
        if($type_id === 4)
        {
            Address::findOrFail($id)->delete();
        }

        if($type_id === 3)
        {
            $count = Address::select('type_id')->where('type_id', '=', 4)->where('town_id', '=', $id)->count();
            if($count === 0)
            {
                Address::findOrFail($id)->delete();
            }else{
                return false;
            }
        }

        if($type_id === 2)
        {
            $count1 = Address::select('type_id')->where('type_id', '=', 4)->where('town_id', '=', $id)->count();
            $count2 = Address::select('type_id')->where('type_id', '=', 3)->where('state_id', '=', $id)->count();
            if($count1 === 0 && $count2 === 0)
            {
                Address::findOrFail($id)->delete();
            }else{
                return false;
            }
        }
    }
}
