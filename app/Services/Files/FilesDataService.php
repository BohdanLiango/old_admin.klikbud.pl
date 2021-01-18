<?php

namespace App\Services\Files;

class FilesDataService extends FileService
{
    private $files;

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
     * @param $name
     * @param $model
     * @param $group
     * @param $subgroup
     * @return null
     */
    public function preStoreImage($file, $to_table, $table_record_id, $group, $subgroup)
    {
        /**
         * Повертає null якщо немає картинки
         */
        if (empty($file) || $file === null) {
            return null;
        }

        return $this->files->storeImage($file, $to_table, $table_record_id, $group, $subgroup);
    }


    /**
     * @param $file
     * @param $store_id
     * @return null
     */
    public function klikBudMainSlider($file, $store_id)
    {
        $to_table = self::TABLES['1'];

        return $this->preStoreImage($file, $to_table, $store_id, self::GROUP_1, self::SUB_GROUP_1);
    }
}
