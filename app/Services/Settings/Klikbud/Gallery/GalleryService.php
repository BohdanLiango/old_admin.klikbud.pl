<?php

namespace App\Services\Settings\Klikbud\Gallery;

use App\Models\KLIKBUD\Gallery;
use App\Services\Service;
use Exception;
use Illuminate\Support\Str;

class GalleryService extends Service
{
    public function update($id, $gallery, $image_id)
    {
        $jsonSlug =  [
            "pl" => uniqid('', false) . Str::slug($gallery['title_pl']),
            "en" => uniqid('', false) . Str::slug($gallery['title_en']),
            "ua" => uniqid('', false) . Str::slug($gallery['title_ua']),
            "ru" => uniqid('', false) . Str::slug($gallery['title_ru'])
        ];

        $jsonTitle = [
            "pl" => $gallery['title_pl'],
            "en" => $gallery['title_en'],
            "ua" => $gallery['title_ua'],
            "ru" => $gallery['title_ru']
        ];

        $jsonDescription = [
            "pl" => $gallery['description_pl'],
            "en" => $gallery['description_en'],
            "ua" => $gallery['description_ua'],
            "ru" => $gallery['description_ru']
        ];

        $jsonAlt = [
            "pl" => $gallery['alt_pl'],
            "en" => $gallery['alt_en'],
            "ua" => $gallery['alt_ua'],
            "ru" => $gallery['alt_ru']
        ];

        $data = [
            'object_id' => $gallery['object_id'],
            'category_id' => $gallery['category_id'],
            'status_gallery_id' => 0,
            'status_to_main_page_id' => 0,
            'image_id' => $image_id,
            'slug' => $jsonSlug,
            'title' => $jsonTitle,
            'description' => $jsonDescription,
            'alt' => $jsonAlt,
        ];

        Gallery::findOrFail($id)->update($data);

        return true;
    }

    public function store($gallery)
    {
        $jsonSlug =  [
            "pl" => uniqid('', false) . Str::slug($gallery['title_pl']),
            "en" => uniqid('', false) . Str::slug($gallery['title_en']),
            "ua" => uniqid('', false) . Str::slug($gallery['title_ua']),
            "ru" => uniqid('', false) . Str::slug($gallery['title_ru'])
        ];

        $jsonTitle = [
            "pl" => $gallery['title_pl'],
            "en" => $gallery['title_en'],
            "ua" => $gallery['title_ua'],
            "ru" => $gallery['title_ru']
        ];
        $jsonDescription = [
            "pl" => $gallery['description_pl'],
            "en" => $gallery['description_en'],
            "ua" => $gallery['description_ua'],
            "ru" => $gallery['description_ru']
        ];
        $jsonAlt = [
            "pl" => $gallery['alt_pl'],
            "en" => $gallery['alt_en'],
            "ua" => $gallery['alt_ua'],
            "ru" => $gallery['alt_ru']
        ];

        $store = new Gallery();

        $data = [
            'object_id' => $gallery['object_id'],
            'category_id' => $gallery['category_id'],
            'slug' => $jsonSlug,
            'title' => $jsonTitle,
            'description' => $jsonDescription,
            'alt' => $jsonAlt
        ];

        $store->fill($data)->save();

        return $store->id;
    }

    /**
     * @param $gallery_id
     * @param $image_id
     * @return bool
     */
    public function store_image($gallery_id, $image_id): bool
    {
        $store_image = Gallery::findOrFail($gallery_id);
        $store_image->image_id = $image_id;
        $store_image->save();
        return true;
    }

    /**
     * @param $gallery_id
     * @param $status_id
     */
    public function changeStatusToMainPage($gallery_id, $status_id): void
    {
        try {
            $update = Gallery::findOrFail($gallery_id);
            $update->status_to_main_page_id = $status_id;
            $update->save();
        }catch (Exception){
            return;
        }
    }

    /**
     * @param $gallery_id
     * @param $status_id
     */
    public function changeStatusToGallery($gallery_id, $status_id): void
    {
        try {
            $update = Gallery::findOrFail($gallery_id);
            $update->status_gallery_id = $status_id;
            $update->save();
        }catch (Exception){
            return;
        }
    }



}
