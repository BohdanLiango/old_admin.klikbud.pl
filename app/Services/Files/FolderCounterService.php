<?php

namespace App\Services\Files;

use App\Models\Files\FileFolderName;
use App\Models\Files\FolderCounter;

class FolderCounterService extends FileService
{

    public function returnFoldersName($group, $subgroup, $folder_name)
    {
        return $this->counter($group, $subgroup, $folder_name);
    }

    public function counter($group, $subgroup, $folder_name)
    {
        $this->checkOrstoreNewGroup($group, $subgroup);

        $data_s1 = $this->getDataFolders($group, $subgroup)->s1;
        $data_s2 = $this->getDataFolders($group, $subgroup)->s2;
        $data_s3 = $this->getDataFolders($group, $subgroup)->s3;
        $data_s4 = $this->getDataFolders($group, $subgroup)->s4;
        $data_s5 = $this->getDataFolders($group, $subgroup)->s5;
        $data_s6 = $this->getDataFolders($group, $subgroup)->s6;
        $data_s7 = $this->getDataFolders($group, $subgroup)->s7;

        if($data_s1 <= self::S1 and $data_s2 <= self::S2)
        {


            $newFolder = new FileFolderName();
            $data = [
                'level' => ''
            ];
        }

    }

    /**
     * @param $group
     * @param $subgroup
     */
    public function checkOrstoreNewGroup($group, $subgroup)
    {
        $get_count = $this->getCountInformationAboutGroup($group, $subgroup);

        if($get_count === 0){
            $store = new FolderCounter();
            $data = [
                'group'=> $group,
                'sub_group' => $subgroup
            ];
            $store->fill($data)->save();
        }elseif ($get_count > 1){
            abort(500);
        }
    }

    /**
     * @param $group
     * @param $subgroup
     * @return mixed
     */
    public function getCountInformationAboutGroup($group, $subgroup): mixed
    {
        return FolderCounter::where('group', $group)->where('sub_group', $subgroup)->count();
    }

    /**
     * @param $group
     * @param $subgroup
     * @return mixed
     */
    public function getDataFolders($group, $subgroup)
    {
        return FolderCounter::where('group', $group)->where('sub_group', $subgroup)->first();
    }

}
