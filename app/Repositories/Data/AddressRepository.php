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
    public function countAddress(): mixed
    {
        return Address::count();
    }

    /**
     * @param $searchQuery
     * @param $searchType
     * @param $orderBy
     * @param $orderArgument
     * @param $paginate
     * @return mixed
     */
    public function getAllByParameters($searchQuery, $searchType, $orderBy, $orderArgument, $paginate): mixed
    {
        return Address::when($searchQuery != '', function ($query) use ($searchQuery) {
            $query->where('title', 'like', '%' . $searchQuery . '%');
        })->when($searchType != '', function ($query) use ($searchType) {
            $query->where('type_id', $searchType);
        })->select('id', 'title', 'type_id','town_id', 'state_id', 'country_id', 'created_at')
            ->orderBy($orderBy, $orderArgument)
            ->paginate($paginate);
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
