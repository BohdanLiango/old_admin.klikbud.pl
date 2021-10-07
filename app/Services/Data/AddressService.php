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
     * @param $title
     * @param $type_id
     * @param $country_id
     * @param $state_id
     * @param $town_id
     * @return array
     */
    public function dataCreator($title, $type_id, $country_id, $state_id, $town_id): array
    {
        if ($type_id === 0 or $type_id === NULL or $type_id >= 5) {
            abort(404);
        }

        $user_id = Auth::id();

        $dataStart = [
            'title' => $title,
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

        return $data;
    }

    /**
     * @param $title
     * @param $type_id
     * @param $country_id
     * @param $state_id
     * @param $town_id
     * @param AddressRepository $addressRepository
     * @return bool
     */
    public function store($title, $type_id, $country_id, $state_id, $town_id, AddressRepository $addressRepository): bool
    {
        try {
            $addressRepository->store($this->dataCreator($title, $type_id, $country_id, $state_id, $town_id));
            return true;
        }catch (Exception $e){
            Log::info($e->getMessage());
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
     * @param AddressRepository $addressRepository
     * @return bool
     */
    public function update($id,  $title, $type_id, $country_id, $state_id, $town_id, AddressRepository $addressRepository): bool
    {
        try {
            $addressRepository->update($id, $this->dataCreator($title, $type_id, $country_id, $state_id, $town_id));
            return true;
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }

    /**
     * @param $id
     * @param $type_id
     * @param AddressRepository $addressRepository
     * @return bool
     */
    public function delete($id, $type_id, AddressRepository $addressRepository): bool
    {
        try {
            if($type_id === 4)
            {
                $addressRepository->delete($id);
                return true;
            }

            if($type_id === 3)
            {
                if($addressRepository->selectTypeIdCount($id, 4, 'town_id') === 0)
                {
                    $addressRepository->delete($id);
                    return true;
                }
                return false;
            }

            if($type_id === 2)
            {
                if($addressRepository->selectTypeIdCount($id, 4, 'town_id') === 0 && $addressRepository->selectTypeIdCount($id, 3, 'state_id' === 3))
                {
                    $addressRepository->delete($id);
                    return true;
                }
                return false;
            }

            return false;
        }catch (Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }
}
