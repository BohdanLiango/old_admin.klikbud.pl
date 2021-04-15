<?php

namespace App\Services\Files;

class FilesDataService extends FileService
{
    private FilesService $files;

    private const TABLES = [
        '1' => 'klikbud_main_slider',
        '2' => 'klikbud_service',
        '3' => 'klikbud_opinion_portal',
        '4' => 'klikbud_gallery',
        '5' => 'business_list',
        '6' => 'warehouse_tools',
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
     * @param $store
     * @param $to_table
     * @param $table_record_id
     * @param $title
     * @param $group
     * @param $subgroup
     * @return mixed
     */
    public function preStoreLivewireFile($store, $to_table, $table_record_id, $title, $group, $subgroup): mixed
    {
        if(empty($store)){
            return NULL;
        }

        return $this->files->storeFileUseLivewire($store, $to_table, $table_record_id, $title, $group, $subgroup);
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

    /**
     * @param $update
     * @param $file_old_id
     * @param $to_table
     * @param $table_record_id
     * @param $title
     * @param $group
     * @param $subgroup
     * @return mixed
     */
    public function preUpdateLivewireFile($update, $file_old_id, $to_table, $table_record_id, $title, $group, $subgroup): mixed
    {
        if(empty($update))
        {
            return NULL;
        }

        if($file_old_id === null)
        {
            return $this->preStoreLivewireFile($update, $to_table, $table_record_id, $title, $group, $subgroup);
        }

        return $this->files->updateFilesUseLivewire($update, $file_old_id, $table_record_id, $to_table, $title);
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

    #####################################################################################################################

    /**
     * @param $store
     * @param $table_record_id
     * @return mixed
     */
    public function klikBudMainSlider($store, $table_record_id): mixed
    {
        $to_table = self::TABLES['1'];
        return $this->preStoreLivewireImage($store,$to_table, $table_record_id, self::GROUP_1, self::SUB_GROUP_1);
    }

    /**
     * @param $update
     * @param $image_old_id
     * @param $table_record_id
     * @return mixed
     */
    public function updateKlikBudMainSlider($update, $image_old_id, $table_record_id): mixed
    {
        $to_table = self::TABLES['1'];
        return $this->preUpdateLivewireImage($update, $image_old_id, $table_record_id, $to_table, self::GROUP_1, self::SUB_GROUP_1);
    }

    /**
     * @param $store
     * @param $table_record_id
     * @return mixed
     */
    public function storeKlikBudService($store, $table_record_id): mixed
    {
        $to_table = self::TABLES['2'];
        return $this->preStoreLivewireImage($store, $to_table, $table_record_id, self::GROUP_1, self::SUB_GROUP_2);
    }

    /**
     * @param $update
     * @param $image_old_id
     * @param $table_record_id
     * @return mixed
     */
    public function updateKlikBudService($update, $image_old_id, $table_record_id): mixed
    {
        $to_table = self::TABLES['2'];
        return $this->preUpdateLivewireImage($update, $image_old_id, $table_record_id, $to_table, self::GROUP_1, self::SUB_GROUP_2);
    }

    /**
     * @param $store
     * @param $table_record_id
     * @return mixed
     */
    public function storeKlikBudOpinionPortal($store, $table_record_id): mixed
    {
        $to_table = self::TABLES['3'];
        return $this->preStoreLivewireImage($store, $to_table, $table_record_id, self::GROUP_1, self::SUB_GROUP_3);
    }

    /**
     * @param $update
     * @param $image_old_id
     * @param $table_record_id
     * @return mixed
     */
    public function updateKlikBudOpinionPortal($update, $image_old_id, $table_record_id): mixed
    {
        $to_table = self::TABLES['3'];
        return $this->preUpdateLivewireImage($update, $image_old_id, $table_record_id, $to_table, self::GROUP_1, self::SUB_GROUP_3);
    }

    /**
     * @param $store
     * @param $table_record_id
     * @return mixed
     */
    public function storeKlikBudGallery($store, $table_record_id): mixed
    {
        $to_table = self::TABLES['4'];
        return $this->preStoreLivewireImage($store, $to_table, $table_record_id, self::GROUP_1, self::SUB_GROUP_4);
    }

    /**
     * @param $update
     * @param $image_old_id
     * @param $table_record_id
     * @return mixed
     */
    public function updateKlikBudGallery($update, $image_old_id, $table_record_id): mixed
    {
        $to_table = self::TABLES['4'];
        return $this->preUpdateLivewireImage($update, $image_old_id, $table_record_id, $to_table, self::GROUP_1, self::SUB_GROUP_4);
    }

    /**
     * @param $store
     * @param $table_record_id
     * @return mixed
     */
    public function storeBusiness($store, $table_record_id): mixed
    {
        $to_table = self::TABLES['5'];
        return $this->preStoreLivewireImage($store, $to_table, $table_record_id, self::GROUP_2, self::SUB_GROUP_2_1);
    }

    /**
     * @param $update
     * @param $image_old_id
     * @param $table_record_id
     * @return mixed
     */
    public function updateBusiness($update, $image_old_id, $table_record_id): mixed
    {
        $to_table = self::TABLES['5'];
        return $this->preUpdateLivewireImage($update, $image_old_id, $table_record_id, $to_table, self::GROUP_2, self::SUB_GROUP_2_1);
    }

    /**
     * @param $store
     * @param $table_record_id
     * @param $title
     * @return mixed
     */
    public function storeFileTools($store, $table_record_id, $title): mixed
    {
        $to_table = self::TABLES['6'];
        return $this->preStoreLivewireFile($store, $to_table, $table_record_id, $title, self::GROUP_2, self::SUB_GROUP_2_2);
    }

    /**
     * @param $store
     * @param $table_record_id
     * @return mixed
     */
    public function storeImageTools($store, $table_record_id): mixed
    {
        $to_table = self::TABLES['6'];
        return $this->preStoreLivewireImage($store, $to_table, $table_record_id, self::GROUP_2, self::SUB_GROUP_2_2);
    }

    /**
     * @param $update
     * @param $image_old_id
     * @param $table_record_id
     * @return mixed
     */
    public function updateImageTool($update, $image_old_id, $table_record_id): mixed
    {
        $to_table = self::TABLES['6'];
        return $this->preUpdateLivewireImage($update, $image_old_id, $table_record_id, $to_table, self::GROUP_2, self::SUB_GROUP_2_2);
    }

    /**
     * @param $update
     * @param $old_file_id
     * @param $table_record_id
     * @param $title
     * @return mixed
     */
    public function updateFileTools($update, $old_file_id, $table_record_id, $title): mixed
    {
        $to_table = self::TABLES['6'];
        return $this->preUpdateLivewireFile($update, $old_file_id, $to_table, $table_record_id, $title, self::GROUP_2, self::SUB_GROUP_2_2);
    }


}
