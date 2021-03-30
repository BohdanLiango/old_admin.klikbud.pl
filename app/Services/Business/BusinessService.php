<?php

namespace App\Services\Business;

use App\Helper\KlikbudFunctionsHelper;
use App\Models\Business\BusinessList;
use App\Services\Services;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BusinessService extends Services
{
    public $helpers;

    public function __construct(KlikbudFunctionsHelper $klikbudFunctionsHelper)
    {
        $this->helpers = $klikbudFunctionsHelper;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getDataOneBySlug($slug): mixed
    {
        try {
            return BusinessList::where('slug', $slug)->first();
        }catch (Exception $e){
            abort(403);
            return false;
        }
    }

    /**
     * @param $paginate
     * @return mixed
     */
    public function getToIndex($paginate, $searchQuery, $searchCategory): mixed
    {
        return BusinessList::when($searchQuery != '', function ($query) use ($searchQuery) {
            $query->where('title', 'like', '%' . $searchQuery . '%')
            ->orWhere('NIP', 'like', '%' . $searchQuery . '%');
        })->when($searchCategory != '', function ($query) use ($searchCategory) {
            $query->where('category_id', '=', $searchCategory);
        })->where('type_id', 1)->select('id', 'type_id', 'title', 'business_form_id', 'business_form_other', 'image_id',
        'category_id', 'NIP', 'business_id', 'slug')->orderBy('id', 'DESC')->paginate($paginate);
    }

    /**
     * @param $type_id
     * @return mixed
     */
    public function getBusinessByTypeId($type_id): mixed
    {
        return BusinessList::where('type_id', $type_id)->select('id', 'title', 'business_form_id', 'business_form_other', 'slug')->get();
    }


    /**
     * @param $type_id
     * @param $business
     * @return array
     */
    public function dataCreator($type_id, $business): array
    {
        $address = $this->helpers->getAddressIdByStreetId($business['street_id']);
        $user_id = Auth::id();

        return [
            'type_id' => $type_id,
            'title' => (!empty($business['title'])) ? Str::title($business['title']) : NULL,
            'title_short' => (!empty($business['title_short'])) ? Str::title($business['title_short']) : NULL,
            'business_form_id' => (!empty($business['business_form_id'])) ? $business['business_form_id'] : NULL,
            'business_form_other' => (!empty($business['business_form_other'])) ? Str::title($business['business_form_other']) : NULL,
            'is_manufacturer' => (!empty($business['is_manufacturer'])) ? $business['is_manufacturer'] : NULL,
            'description' => (!empty($business['description'])) ? Str::title($business['description']) : NULL,
            'category_id' => (!empty($business['category_id'])) ? $business['category_id'] : NULL,
            'country_id' => $address['country_id'],
            'state_id' => $address['state_id'],
            'town_id' => $address['town_id'],
            'street_id' =>(!empty($business['street_id'])) ? $business['street_id'] : NULL,
            'number' => (!empty($business['number'])) ? $business['number'] : NULL,
            'apartment_number' => (!empty($business['apartment_number'])) ? $business['apartment_number'] : NULL,
            'zip_code' => (!empty($business['zip_code'])) ? $business['zip_code'] : NULL,
            'NIP' => (!empty($business['nip'])) ? $business['nip'] : NULL,
            'REGON' => (!empty($business['regon'])) ? $business['regon'] : NULL,
            'BDO' => (!empty($business['bdo'])) ? $business['bdo'] : NULL,
            'email' => (!empty($business['email'])) ? $business['email'] : NULL,
            'phone' => (!empty($business['phone'])) ? $business['phone'] : NULL,
            'site' => (!empty($business['site'])) ? $business['site'] : NULL,
            'business_id' => (!empty($business['business_id'])) ? $business['business_id'] : NULL,
            'user_id' => $user_id
        ];
    }

    /**
     * @param $type_id
     * @param $business
     * @return mixed
     */
    public function store($type_id, $business): mixed
    {
        try {
            $store = new BusinessList();
            $store->fill($this->dataCreator($type_id, $business))->save();
            return $store->id;
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @param $type_id
     * @param $business
     * @return bool
     */
    public function update($id, $type_id, $business): bool
    {
        try {
            $update = BusinessList::findOrFail($id);
            $update->fill($this->dataCreator($type_id, $business))->save();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @param $image_id
     * @return bool
     */
    public function store_image($id, $image_id): bool
    {
        try {
            $update = BusinessList::findOrFail($id);
            $update->image_id = $image_id;
            $update->save();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id, $image_id): bool
    {
        try {
            BusinessList::findOrFail($id)->delete();
            $this->helpers->deleteImage($image_id);
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}
