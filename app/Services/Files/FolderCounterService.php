<?php

namespace App\Services\Files;

use App\Models\Files\FolderCounter;
use Illuminate\Support\Facades\Storage;

class FolderCounterService extends FilesSettingsService
{
    /**
     * @param $group
     * @param $subgroup
     * @param $folder_name
     * @param $storage_driver
     * @return string
     */
    public function returnFoldersName($group, $subgroup, $folder_name, $storage_driver): string
    {
        $this->checkOrStoreNewGroup($group, $subgroup, $storage_driver);

        $id = $this->getDataFolders($group, $subgroup)->id;

        $this->engine($id);

        $get = FolderCounter::find($id);

        $folder_path = $storage_driver . $group . '/' . $subgroup . '/'.
            $get->s1 . '/' .
            $get->s2 . '/' .
            $get->s3 . '/' .
            $get->s4 . '/' .
            $folder_name;

        Storage::makeDirectory($folder_path);

        $data = [
            'store' => ++$get->store
        ];
        $get->fill($data)->save();

        return $folder_path;

    }

    /**
     * @param $id
     */
    public function engine($id): void
    {
        $get = FolderCounter::find($id);

        if($get->store >= self::STORE)
        {
            $data = [
                's4' => ++$get->s4,
                'store' => 0
            ];
            $get->fill($data)->save();
        }

        if($get->s4 >= self::S4)
        {
            $data = [
                's3' => ++$get->s3,
                's4' => 1
            ];
            $get->fill($data)->save();
        }

        if($get->s3 >= self::S3)
        {
            $data = [
                's2' => ++$get->s2,
                's3' => 1
            ];
            $get->fill($data)->save();
        }

        if($get->s2 >= self::S2)
        {
            $data = [
                's1' => ++$get->s1,
                's2' => 1
            ];
            $get->fill($data)->save();
        }
    }


    /**
     * Check or Store New Group
     * Test OK!
     * @param $group
     * @param $subgroup
     * @param $storage_driver
     */
    public function checkOrStoreNewGroup($group, $subgroup, $storage_driver): void
    {
        if (FolderCounter::where('group', $group)->where('sub_group', $subgroup)->count() === 0) {
            $store = new FolderCounter();
            $store->group = $group;
            $store->sub_group = $subgroup;
            $store->save();
            Storage::makeDirectory($storage_driver . $group . '/' . $subgroup . '/'. 1 . '/' . 1 . '/' . 1 . '/' . 1);
        }
    }

    /**
     * Get all data Group
     * Test OK!
     * @param $group
     * @param $subgroup
     * @return mixed
     */
    public function getDataFolders($group, $subgroup): mixed
    {
        return FolderCounter::where('group', $group)->where('sub_group', $subgroup)->first();
    }


    /**
     * Increment level
     *
     * @param $id
     * @param $folder
     */
    public function countIncrement($id, $folder): void
    {
        $update = FolderCounter::find($id);
        $data = [
            $folder => ++$update->$folder
        ];
        $update->fill($data);
        $update->save();
    }
}
