<?php

namespace App\Repositories\Klikbud\Services;

use App\Models\Klikbud\Services\Service;

class ServicesRepository
{
    /**
     * @param $user_id
     * @param $jsonSlug
     * @param $jsonAlt
     * @param $jsonTitle
     * @param $jsonDescription
     * @return mixed
     */
    public function store($user_id, $jsonSlug, $jsonAlt, $jsonTitle, $jsonDescription): mixed
    {
        $store = new Service();
        $data = [
            'user_id' => $user_id,
            'slug' => $jsonSlug,
            'alt' => $jsonAlt,
            'title' => $jsonTitle,
            'description' => $jsonDescription,
        ];
        $store->fill($data)->save();
        return $store;
    }

    /**
     * @param $id
     * @param $status_to_main_page_id
     * @param $user_id
     * @param $jsonSlug
     * @param $jsonAlt
     * @param $jsonTitle
     * @param $jsonDescription
     */
    public function update($id, $status_to_main_page_id, $user_id, $jsonSlug, $jsonAlt, $jsonTitle, $jsonDescription): void
    {
        $update = Service::findOrFail($id);
        $data = [
            'status_to_main_page_id' => $status_to_main_page_id,
            'user_id' => $user_id,
            'slug' => $jsonSlug,
            'alt' => $jsonAlt,
            'title' => $jsonTitle,
            'description' => $jsonDescription,
        ];
        $update->fill($data)->save();
    }

    /**
     * @param $id
     * @param $image_id
     */
    public function storeImage($id, $image_id): void
    {
        $update = Service::findOrFail($id);
        $update->image_id = $image_id;
        $update->save();
    }

    /**
     * @param $id
     * @param $status_id
     */
    public function changeStatus($id, $status_id): void
    {
        $update = Service::findOrFail($id);
        $update->status_to_main_page_id = $status_id;
        $update->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOne($id): mixed
    {
        return Service::findOrFail($id);
    }

    /**
     * @param $id
     */
    public function delete($id): void
    {
        Service::findOrFail($id)->delet();
    }
}
