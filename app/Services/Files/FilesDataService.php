<?php

namespace App\Services\Files;

use App\Models\KLIKBUD\MainSlider;

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
    public function preStoreImage($file, $to_table, $table_record_id, $model, $group, $subgroup)
    {
        /**
         * Повертає null якщо немає картинки
         */
        if (empty($file) || $file === null) {
            return null;
        }

        $this->files->storeImage($file, $to_table, $table_record_id, $model, $group, $subgroup);
    }


    /**
     * @param $file
     * @param $store_id
     */
    public function klikBudMainSlider($file, $store_id):void
    {
        $to_table = self::TABLES['1'];

        $this->preStoreImage($file, $to_table, $store_id, MainSlider::class, self::GROUP_1, self::SUB_GROUP_1);
    }
}
