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
        })->with('user')->orderBy($orderBy, $orderArgument)
            ->paginate($paginate);
    }

    /**
     * @param $typeId
     * @return mixed
     */
    public function getAllByTypeIdSelectParameter($typeId): mixed
    {
        return Address::where('type_id', $typeId)->select('id', 'title')->get();
    }

    /**
     * @param $addressId
     * @param $addressParameter
     * @param $typeId
     * @return mixed
     */
    public function getAllByColumnTypeSelectParameter($addressId, $addressParameter, $typeId): mixed
    {
        return Address::where($addressId, $addressParameter)->where('type_id', $typeId)->select('id', 'title')->get();
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

    /**
     * @param $title
     * @param $user_id
     * @param $type_id
     * @param $town_id
     * @param $state_id
     * @param $country_id
     * @param $moderated_id
     * @return mixed
     */
    public function store($title, $user_id, $type_id, $town_id, $state_id, $country_id, $moderated_id): mixed
    {
        $store = new Address();
        $data = [
            'title' => $title,
            'user_id' => $user_id,
            'type_id' => $type_id,
            'town_id' => $town_id,
            'state_id' => $state_id,
            'country_id' => $country_id,
            'moderated_id' => $moderated_id
        ];
        $store->fill($data)->save();
        return $store->id;
    }

    /**
     * @param $id
     * @param $title
     * @return bool
     */
    public function update($id, $title): bool
    {
        $update = $this->getOne($id);
        $data = [
            'title' => $title
        ];
        $update->fill($data)->save();
        return true;
    }

}
