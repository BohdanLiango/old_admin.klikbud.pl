<?php

namespace App\Services\Files;

use App\Models\Files\Files;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class FilesService extends FileService
{
    protected const FILE_TYPE_IMAGE = 1; // IMAGE
    protected const FILE_TYPE_FILE = 2; // FILES

    private FilesBackupService $backup;
    private FolderCounterService $folderCounter;

    /**
     * FileService constructor.
     *
     * @param FilesBackupService $fileBackupService
     * @param FolderCounterService $folderCounterService
     */
    public function __construct(FilesBackupService $fileBackupService, FolderCounterService $folderCounterService)
    {
        $this->backup = $fileBackupService;
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
     */
    public function storeImage($file, $to_table, $table_record_id, $model, $group, $subgroup)
    {
        $file_type_id = self::FILE_TYPE_IMAGE;
        if(empty($file))
        {
            $path = '/storage/public/';
            $size = '';
            $mime = '';
            $folder = '/static/';
            $name = 'static.png';

        }elseif (is_file($file)){
//            $folder_name = uniqid('', true);
            $i = 1;
            while ($i < 500)
            {
                $folder_name = uniqid('', true);
                $i++;
                $folder = $this->folderCreate($group, $subgroup, $folder_name);
            }

            dd($folder);
            $path = $file->store('/public/' . $folder);
            dd($path);
//            $path = $file->storeAs('/public/', $name);
            $size = Storage::size($file);
            $mime = $file->getMimeType();
        }else{
            $name = NULL;
            $folder = NULL;
            $size = NULL;
            $mime = NULL;
            $path = NULL;
            abort(403);
        }

        $this->store($to_table, $table_record_id, $name, $folder, $path, $size, $mime, $file_type_id, $model);
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
     * @param $model
     * @return mixed
     */
    public function store($to_table, $table_record_id, $name, $folder, $path, $size, $mime, $file_type_id, $model): mixed
    {
        $slug = SlugService::createSlug($model, 'slug', $name, ['unique' => true]);

        $unique_number = bcrypt($slug, md5(now(), $name));

        $store = new Files();

        $data = [
            'user_id' => Auth::id(),
            'to_table' => $to_table,
            'slug' => $slug,
            'table_record_id' => $table_record_id,
            'name' => $name,
            'folder' => $folder,
            'path' => $path,
            'size' => $size,
            'mime' => $mime,
            'file_type_id' => $file_type_id,
            'unique_number' => $unique_number,
            'moderated_id' => self::MODERATE_TO_MODERATION
        ];

        $store->fill($data);

        $store->save();

        $this->backup->store($store->id);

        return $store->id;
    }



}
