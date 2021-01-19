<?php

namespace App\Services\Files;

use App\Models\Files\Files;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FilesService extends FileService
{
    protected const FILE_TYPE_IMAGE = 1; // IMAGE
    protected const FILE_TYPE_FILE = 2; // FILES

    private FolderCounterService $folderCounter;

    /**
     * FileService constructor.
     *
     * @param FolderCounterService $folderCounterService
     */
    public function __construct(FolderCounterService $folderCounterService)
    {
        $this->folderCounter = $folderCounterService;
    }


    /**
     * @param $group
     * @param $subgroup
     * @param $folder_name
     */
    public function folderCreate($group, $subgroup, $folder_name)
    {
        return $this->folderCounter->returnFoldersName($group, $subgroup, $folder_name);
    }


    /**
     * @param $file
     * @param $to_table
     * @param $table_record_id
     * @param $name
     * @param $model
     * @param $group
     * @param $subgroup
     * @return mixed
     */
    public function storeImage($file, $to_table, $table_record_id, $group, $subgroup): mixed
    {
        $file_type_id = self::FILE_TYPE_IMAGE;
        if(empty($file))
        {
            $path = '/storage/public/';
            $size = '';
            $mime = '';
            $folder_name = '/static/';
            $name = 'static.png';

        }elseif (is_file($file)){
            $mime = $file->getMimeType();
            $size = $file->getSize();
//            $size = number_format($size / 1048576,2);
            $folder_name = md5(uniqid(now(), true));
            $folder = $this->folderCreate($group, $subgroup, $folder_name);
            $name = 'Image-' . time() . uniqid('$', false) .  '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs($folder, $name);
        }else{
            $name = NULL;
            $folder_name = NULL;
            $size = NULL;
            $mime = NULL;
            $path = NULL;
            abort(403);
        }

        return $this->store($to_table, $table_record_id, $name, $folder_name, $path, $size, $mime, $file_type_id);

    }

    /**
     * @param $store
     * @param $to_table
     * @param $table_record_id
     * @param $group
     * @param $subgroup
     * @return mixed
     */
    public function storeImageUseLivewire($store, $to_table, $table_record_id, $group, $subgroup): mixed
    {
        //Type File
        $file_type_id = self::FILE_TYPE_IMAGE;

        //Create Folder
        $folder_name = md5(uniqid(now(), true));
        $folder = $this->folderCreate($group, $subgroup, $folder_name);

        //Get Mime and Size Stored File
        $mime = Storage::mimeType($store);
        $size = Storage::size($store);

        //Get name stored File
        $name_file = class_basename($store);

        Storage::move($store,$folder .'/' .$name_file);

        Storage::deleteDirectory(Str::before($store, '/' . $name_file));
        return $this->store($to_table, $table_record_id, $name_file, $folder_name, $folder, $size, $mime, $file_type_id);
    }

    /**
     * Finish Store
     *
     * @param $to_table
     * @param $table_record_id
     * @param $name
     * @param $folder
     * @param $path
     * @param $size
     * @param $mime
     * @param $file_type_id
     * @return mixed
     */
    public function store($to_table, $table_record_id, $name, $folder, $path, $size, $mime, $file_type_id): mixed
    {
        $store = new Files();

        $data = [
            'user_id' => Auth::id(),
            'to_table' => $to_table,
            'table_record_id' => $table_record_id,
            'name' => $name,
            'folder' => $folder,
            'path' => $path,
            'size' => $size,
            'mime' => $mime,
            'file_type_id' => $file_type_id,
            'moderated_id' => self::MODERATE_TO_MODERATION
        ];

        $store->fill($data);

        $store->save();

        return $store->id;
    }



}
