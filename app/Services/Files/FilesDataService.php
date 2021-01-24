<?php

namespace App\Services\Files;

class FilesDataService extends FileService
{
    private FilesService $files;

    private const TABLES = [
        '1' => 'klikbud_main_slider'
    ];

    /**
     * FilesDataService constructor.
     * @param FilesService $filesService
     */
    public function __construct(FilesService $filesService)
    {
        $this->files = $filesService;
    }

    /**
     * @param $file
     * @param $to_table
     * @param $table_record_id
     * @param $group
     * @param $subgroup
     * @return null
     */
    public function preStoreImage($file, $to_table, $table_record_id, $group, $subgroup)
    {
        /**
         * Повертає null якщо немає картинки
         */
        if (empty($file)) {
            return null;
        }

        return $this->files->storeImage($file, $to_table, $table_record_id, $group, $subgroup);
    }

    /**
     * @param $store
     * @param $to_table
     * @param $table_record_id
     * @param $group
     * @param $subgroup
     * @return mixed
     */
    public function  preStoreLivewireImage($store, $to_table, $table_record_id, $group, $subgroup): mixed
    {
        if(empty($store))
        {
            return NULL;
        }
        return $this->files->storeImageUseLivewire($store, $to_table, $table_record_id, $group, $subgroup);
    }

    /**
     * @param $update
     * @param $image_old_id
     * @param $table_record_id
     * @param $to_table
     * @param $group
     * @param $subgroup
     * @return mixed
     */
    public function preUpdateLivewireImage($update, $image_old_id,  $table_record_id, $to_table, $group, $subgroup): mixed
    {
        if(empty($update))
        {
            return NULL;
        }

        if($image_old_id === null)
        {
            return $this->preStoreLivewireImage($update, $to_table, $table_record_id, $group, $subgroup);
        }

        return $this->files->updateImageUseLivewire($update, $image_old_id,  $table_record_id, $to_table);
    }


    #####################################################################################################################

    /**
     * @param $store
     * @param $table_record_id
     * @return null
     */
    public function klikBudMainSlider($store, $table_record_id)
    {
        $to_table = self::TABLES['1'];

        return $this->preStoreLivewireImage($store,$to_table, $table_record_id, self::GROUP_1, self::SUB_GROUP_1);
    }

    /**
     * @param $update
     * @param $image_old_id
     * @param $table_record_id
     */
    public function updateKlikBudMainSlider($update, $image_old_id, $table_record_id)
    {
        $to_table = self::TABLES['1'];

        return $this->preUpdateLivewireImage($update, $image_old_id, $table_record_id, $to_table, self::GROUP_1, self::SUB_GROUP_1);
    }
}
