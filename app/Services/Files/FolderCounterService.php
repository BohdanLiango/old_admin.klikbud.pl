<?php

namespace App\Services\Files;

use App\Models\Files\FileFolderName;
use App\Models\Files\FolderCounter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FolderCounterService extends FileService
{

    /**
     * @param $group
     * @param $subgroup
     * @param $folder_name
     */
    public function returnFoldersName($group, $subgroup, $folder_name)
    {
        $this->checkOrstoreNewGroup($group, $subgroup);

        $id = $this->getDataFolders($group, $subgroup)->id;
        $data_s1 = $this->getDataFolders($group, $subgroup)->s1;
        $data_s2 = $this->getDataFolders($group, $subgroup)->s2;
        $data_s3 = $this->getDataFolders($group, $subgroup)->s3;
        $data_s4 = $this->getDataFolders($group, $subgroup)->s4;

        $this->checkCreatedGroup($data_s1, $data_s2, $data_s3, $data_s4, $id, $group, $subgroup);

        $get_s1_title = $this->getLastLevelTitle($id, self::NAME_S1);
        $get_s2_title = $this->getLastLevelTitle($id, self::NAME_S2);
        $get_s3_title = $this->getLastLevelTitle($id, self::NAME_S3);
        $get_s4_title = $this->getLastLevelTitle($id, self::NAME_S4);

        $this->checkOrCreateDirectories($group, $subgroup, $get_s1_title, $get_s2_title, $get_s3_title, $get_s4_title, $id);

        $folder_path = '/' . $group . '/' . $subgroup . '/'.
            $get_s1_title . '/' .
            $get_s2_title . '/' .
            $get_s3_title . '/' .
            $get_s4_title . '/' .
            $folder_name;

        Storage::makeDirectory($folder_path);

    }


    /**
     * @param $group
     * @param $subgroup
     * @param $get_s1_title
     * @param $get_s2_title
     * @param $get_s3_title
     * @param $get_s4_title
     * @param $id
     */
    public function checkOrCreateDirectories($group, $subgroup, $get_s1_title, $get_s2_title, $get_s3_title, $get_s4_title, $id)
    {
        $directory_s4 = '/' . $group . '/' . $subgroup . '/'.
            $get_s1_title . '/' .
            $get_s2_title . '/' .
            $get_s3_title . '/' . $get_s4_title . '/';

        $count_directories_s4 = count(Storage::directories($directory_s4));

        if(self::S4 === $count_directories_s4)
        {
            $get_s1_title = $this->getLastLevelTitle($id, self::NAME_S1);
            $get_s2_title = $this->getLastLevelTitle($id, self::NAME_S2);
            $get_s3_title = $this->getLastLevelTitle($id, self::NAME_S3);
            $folder_name_created = ++$this->getDataFolders($group, $subgroup)->s4;
            $make_folder = '/' . $group . '/' . $subgroup . '/'.
                $get_s1_title . '/' .
                $get_s2_title . '/' .
                $get_s3_title . '/' . $folder_name_created;
            Storage::makeDirectory($make_folder);
            $this->countIncrement($id, self::NAME_S4);
            $this->createFileFoldersName($id, self::NAME_S4, $folder_name_created);
        }

        if(self::S3 === $this->getDataFolders($group, $subgroup)->s4)
        {
            $get_s1_title = $this->getLastLevelTitle($id, self::NAME_S1);
            $get_s2_title = $this->getLastLevelTitle($id, self::NAME_S2);
            $folder_name_created = ++$this->getDataFolders($group, $subgroup)->s3;
            $make_folder = '/' . $group . '/' . $subgroup . '/'.
                $get_s1_title . '/' .
                $get_s2_title . '/' .
                $folder_name_created;
            Storage::makeDirectory($make_folder);
            $this->countIncrement($id, self::NAME_S3);
            $this->createFileFoldersName($id, self::NAME_S3, $folder_name_created);
        }

        if(self::S2 === $this->getDataFolders($group, $subgroup)->s3)
        {
            $get_s1_title = $this->getLastLevelTitle($id, self::NAME_S1);
            $folder_name_created = ++$this->getDataFolders($group, $subgroup)->s2;
            $make_folder = '/' . $group . '/' . $subgroup . '/'.
                $get_s1_title . '/' .
                $folder_name_created;
            Storage::makeDirectory($make_folder);
            $this->countIncrement($id, self::NAME_S2);
            $this->createFileFoldersName($id, self::NAME_S2, $folder_name_created);
        }

        if(self::S1 === $this->getDataFolders($group, $subgroup)->s3)
        {
            $get_s1_title = $this->getLastLevelTitle($id, self::NAME_S1);
            $folder_name_created = ++$get_s1_title;
            $make_folder = '/' . $group . '/' . $subgroup . '/' .
                $folder_name_created;
            Storage::makeDirectory($make_folder);
            $this->countIncrement($id, self::NAME_S1);
            $this->createFileFoldersName($id, self::NAME_S1, $folder_name_created);
        }
    }


    /**
     * @param $data_s1
     * @param $data_s2
     * @param $data_s3
     * @param $data_s4
     * @param $id
     * @param $group
     * @param $subgroup
     */
    public function checkCreatedGroup($data_s1, $data_s2, $data_s3, $data_s4, $id, $group, $subgroup): void
    {
        if($data_s1 === 0)
        {
            $folder_name_created = 1;
            $make_folder = '/' . $group . '/' . $subgroup . '/' .  $folder_name_created;
            Storage::makeDirectory($make_folder);
            $this->countIncrement($id, self::NAME_S1);
            $this->createFileFoldersName($id, self::NAME_S1, $folder_name_created);
        }

        if($data_s2 === 0)
        {
            $get_s1_title = $this->getLastLevelTitle($id, self::NAME_S1);
            $folder_name_created = 1;
            $make_folder = '/' . $group . '/' . $subgroup . '/'. $get_s1_title . '/' . $folder_name_created;
            Storage::makeDirectory($make_folder);
            $this->countIncrement($id, self::NAME_S2);
            $this->createFileFoldersName($id, self::NAME_S2, $folder_name_created);
        }


        if($data_s3 === 0)
        {
            $get_s1_title = $this->getLastLevelTitle($id, self::NAME_S1);
            $get_s2_title = $this->getLastLevelTitle($id, self::NAME_S2);
            $folder_name_created = 1;
            $make_folder = '/' . $group . '/' . $subgroup . '/'. $get_s1_title . '/' . $get_s2_title . '/' .  $folder_name_created;
            Storage::makeDirectory($make_folder);
            $this->countIncrement($id, self::NAME_S3);
            $this->createFileFoldersName($id, self::NAME_S3, $folder_name_created);
        }

        if($data_s4 === 0)
        {
            $get_s1_title = $this->getLastLevelTitle($id, self::NAME_S1);
            $get_s2_title = $this->getLastLevelTitle($id, self::NAME_S2);
            $get_s3_title = $this->getLastLevelTitle($id, self::NAME_S3);
            $folder_name_created = 1;
            $make_folder = '/' . $group . '/' . $subgroup . '/'.
                $get_s1_title . '/' .
                $get_s2_title . '/' .
                $get_s3_title . '/' . $folder_name_created;
            Storage::makeDirectory($make_folder);
            $this->countIncrement($id, self::NAME_S4);
            $this->createFileFoldersName($id, self::NAME_S4, $folder_name_created);
        }
    }

    /**
     * @param $group
     * @param $subgroup
     */
    public function checkOrstoreNewGroup($group, $subgroup): void
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
    public function getDataFolders($group, $subgroup): mixed
    {
        return FolderCounter::where('group', $group)->where('sub_group', $subgroup)->first();
    }

    /**
     * @param $group
     * @param $subgroup
     * @return string
     */
    public function folderName($group, $subgroup): string
    {
        $folder_name = bcrypt($group . $subgroup, [now(), Str::random(100)]);
        $folder_name = Str::replaceArray('/', ['#'], $folder_name);
        $folder_name = Str::replaceArray('.', ['$'], $folder_name);

        return $folder_name;
    }

    /**
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

    /**
     * @param $id
     * @param $level
     * @param $title
     */
    public function createFileFoldersName($id, $level, $title):void
    {
        $create = new FileFolderName();
        $data = [
            'find_id' => $id,
            'level' => $level,
            'title' => $title
        ];
        $create->fill($data);
        $create->save();
    }

    /**
     * @param $id
     * @param $level
     * @return mixed
     */
    public function getLastLevelTitle($id, $level): mixed
    {
        return FileFolderName::where('find_id', $id)
            ->where('level', $level)
            ->orderBy('created_at', 'desc')
            ->first()
            ->title;
    }


}
