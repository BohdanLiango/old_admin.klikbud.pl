<?php

namespace App\Services\Data;

use App\Repositories\Data\AddressRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AddressService
{
    private AddressRepository $repository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->repository = $addressRepository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id): mixed
    {
        try {
            return $this->repository->getOne($id);
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function countAddress(): mixed
    {
        try{
            return $this->repository->countAddress();
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @param $typeId
     * @return mixed
     */
    public function getAllByType($typeId): mixed
    {
        try{
            return $this->repository->getAllByTypeIdSelectParameter($typeId);
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @param $addressId
     * @param $addressParameter
     * @param $typeId
     * @return mixed
     */
    public function getAllByAddressType($addressId, $addressParameter, $typeId): mixed
    {
        try{
            return $this->repository->getAllByColumnTypeSelectParameter($addressId, $addressParameter, $typeId);
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
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
        try {
            return $this->repository->getAllByParameters($searchQuery, $searchType, $orderBy, $orderArgument, $paginate);
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @param $parentType
     * @return mixed
     */
    private function addTypeId($parentType): mixed
    {
        return match ($parentType) {
            config('app.address.country') => config('app.address.state'),
            config('app.address.state') => config('app.address.town'),
            config('app.address.town') => config('app.address.street'),
        };
    }

    /**
     * @param $type_id
     * @param $parent_id
     * @return array|false
     */
    private function addGetData($type_id, $parent_id): bool|array
    {
        try {
            $getParent = $this->repository->getOne($parent_id);
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }

        $town_id = NULL;
        $state_id = NULL;
        $country_id = NULL;

        switch ($type_id){
            case (config('app.address.state')):
                $country_id = $parent_id;
                break;
            case (config('app.address.town')):
                $state_id = $parent_id;
                $country_id = $getParent->country_id;
                break;
            case (config('app.address.street')):
                $town_id = $parent_id;
                $state_id = $getParent->state_id;
                $country_id = $getParent->country_id;
                break;
        }

        return [
            'town_id' => $town_id,
            'state_id' => $state_id,
            'country_id' => $country_id
        ];
    }

    /**
     * @param $title
     * @param $parentTypeId
     * @param $parent_id
     * @return mixed
     */
    public function save($title, $parentTypeId, $parent_id): mixed
    {
        try {
            $user_id = Auth::id();
            $type_id = $this->addTypeId($parentTypeId);
            $getData = $this->addGetData($type_id, $parent_id);
            $town_id = $getData['town_id'];
            $state_id = $getData['state_id'];
            $country_id = $getData['country_id'];
            $moderated_id = config('app.moderated.to_moderate');
            $this->repository->store($title, $user_id, $type_id, $town_id, $state_id, $country_id, $moderated_id);
            return [true, trans('data/address/add.success_add_one') . ' ' . $title . ' ' . trans('data/address/add.success_add_two')];
        }catch (Exception $e){
            Log::info($e->getMessage());
            return [false, trans('data/address/add.error_add')];
        }
    }

    /**
     * @param $id
     * @param $title
     * @param $oldTitle
     * @return array[]
     */
    public function update($id, $title, $oldTitle): array
    {
        try {
            if((string)$oldTitle !== (string)$title)
            {
                $this->repository->updateTitle($id, $title);
                $message = trans('data/address/edit.edit_success_one') . ' ' . $title . ' ' .
                    trans('data/address/edit.edit_success_two') . ' ' . $oldTitle . ' ' .
                    trans('data/address/edit.edit_success_four');
                return [true, $message];
            }
            return [false, trans('data/address/edit.edit_warning')];

        }catch (Exception $e){
            Log::info($e->getMessage());
            return [false, trans('data/address/edit.edit_error')];
        }
    }
}
