<?php

namespace App\Repositories\Data;

use App\Models\Data\Address;

class AddressRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id): mixed
    {
        return Address::findOrFail($id);
    }

    /**
     * @return mixed
     */
    public function getAllSelectData(): mixed
    {
        return Address::where('type_id', 4)->select('id', 'title', 'town_id', 'state_id', 'country_id')->get();
    }

    /**
     * @param $data
     */
    public function store($data)
    {
        $store = new Address();
        $store->fill($data);
        $store->save();
    }

    /**
     * @param $id
     * @param $data
     */
    public function update($id, $data)
    {
        $update = Address::findOrFail($id);
        $update->fill($data);
        $update->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        return Address::findOrFail($id)->delete();
    }

    /**
     * @param $id
     * @param $type_id
     * @param $type
     * @return mixed
     */
    public function selectTypeIdCount($id, $type_id, $type): mixed
    {
        return Address::select('type_id')->where('type_id', '=', $type_id)->where($type, '=', $id)->count();
    }


}
