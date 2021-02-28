<?php

namespace App\Services\Settings\Klikbud\Gallery;

use App\Helper\KlikbudFunctionsHelper;
use App\Models\KLIKBUD\Gallery;
use App\Services\Services;
use Exception;

class GalleryService extends Services
{
    private KlikbudFunctionsHelper $functionsHelper;

    /**
     * GalleryService constructor.
     * @param KlikbudFunctionsHelper $klikbudFunctionsHelper
     */
    public function __construct(KlikbudFunctionsHelper $klikbudFunctionsHelper)
    {
        $this->functionsHelper = $klikbudFunctionsHelper;
    }


    /**
     * @param $id
     * @param $gallery
     * @param $image_id
     * @return bool
     */
    public function update($id, $gallery, $image_id): bool
    {
        try {
            $jsonSlug = $this->functionsHelper->jsonSlug($gallery['title_pl'], $gallery['title_en'], $gallery['title_ua'], $gallery['title_ru']);
            $jsonTitle = $this->functionsHelper->jsonData($gallery['title_pl'], $gallery['title_en'], $gallery['title_ua'], $gallery['title_ru']);
            $jsonDescription = $this->functionsHelper->jsonData($gallery['description_pl'], $gallery['description_en'], $gallery['description_ua'], $gallery['description_ru']);
            $jsonAlt = $this->functionsHelper->jsonData($gallery['alt_pl'], $gallery['alt_en'], $gallery['alt_ua'], $gallery['alt_ru']);

            $data = [
                'object_id' => $gallery['object_id'],
                'category_id' => $gallery['category_id'],
                'status_gallery_id' => config('klikbud.klikbud.status_to_gallery.not_visible'),
                'status_to_main_page_id' => config('klikbud.klikbud.status_to_main_page.not_visible'),
                'image_id' => $image_id,
                'slug' => $jsonSlug,
                'title' => $jsonTitle,
                'description' => $jsonDescription,
                'alt' => $jsonAlt,
            ];

            Gallery::findOrFail($id)->update($data);

            return true;

        }catch (Exception){
            return false;
        }
    }

    /**
     * @param $gallery
     * @return mixed
     */
    public function store($gallery): mixed
    {
        try {
            $jsonSlug = $this->functionsHelper->jsonSlug($gallery['title_pl'], $gallery['title_en'], $gallery['title_ua'], $gallery['title_ru']);
            $jsonTitle = $this->functionsHelper->jsonData($gallery['title_pl'], $gallery['title_en'], $gallery['title_ua'], $gallery['title_ru']);
            $jsonDescription = $this->functionsHelper->jsonData($gallery['description_pl'], $gallery['description_en'], $gallery['description_ua'], $gallery['description_ru']);
            $jsonAlt = $this->functionsHelper->jsonData($gallery['alt_pl'], $gallery['alt_en'], $gallery['alt_ua'], $gallery['alt_ru']);

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

        }catch (Exception){

            return false;

        }

    }

    /**
     * Store Image to store method
     * is continue function
     *
     * @param $gallery_id
     * @param $image_id
     * @return bool
     */
    public function store_image($gallery_id, $image_id): bool
    {
        try {
            $store_image = Gallery::findOrFail($gallery_id);
            $store_image->image_id = $image_id;
            $store_image->save();
            return true;
        }catch (Exception){
            return false;
        }

    }

    /**
     * @param $gallery_id
     * @param $status_id
     * @return bool
     */
    public function changeStatusToMainPage($gallery_id, $status_id): bool
    {
        try {
            $update = Gallery::find($gallery_id);
            $update->status_to_main_page_id = $status_id;
            $update->save();
            return true;
        }catch (Exception){
            return false;
        }
    }

    /**
     * Status: 0 - false, 1 - true
     * @param $gallery_id
     * @param $status_id
     * @return bool
     */
    public function changeStatusToGallery($gallery_id, $status_id): bool
    {
        try {
            $update = Gallery::find($gallery_id);
            $update->status_gallery_id = $status_id;
            $update->save();
            return true;
        }catch (Exception){
            return false;
        }
    }

    /**
     * SoftDelete
     * @param $id
     * @param $image_id
     * @return bool
     */
    public function delete($id, $image_id): bool
    {
        try {
            $delete = Gallery::find($id);
            $delete->delete();

            try {
                $this->functionsHelper->deleteImage($image_id);
            }catch (Exception){

            }

            return true;
        }catch (Exception){
            return false;
        }
    }
}
