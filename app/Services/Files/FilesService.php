<?php

namespace App\Services\Files;

use App\Models\Files\FileAdditionalInformation;
use App\Models\Files\Files;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;


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
     * @return string
     */
    public function folderCreate($group, $subgroup, $folder_name)
    {
        $storage_driver = config('klikbud.main_folder_store');

        return $this->folderCounter->returnFoldersName($group, $subgroup, $folder_name, $storage_driver);
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
    public function storeFileUseLivewire($store, $to_table, $table_record_id, $title, $group, $subgroup): mixed
    {
        Storage::disk(config('klikbud.disk_store'))->setVisibility($store, 'public');

        //Type File
        $file_type_id = self::FILE_TYPE_FILE;

        //Create Folder
        $folder_name = md5(uniqid(now(), true));
        $folder = $this->folderCreate($group, $subgroup, $folder_name);

        //Get Mime and Size Stored File
        $mime = Storage::disk(config('klikbud.disk_store'))->mimeType($store);
        $size = Storage::disk(config('klikbud.disk_store'))->size($store);

        //Get name stored File
        $name_file = class_basename($store);
        $name_file_store = $name_file;

        if(!is_null($title))
        {
            $name_file_store = Str::slug($title, '_') . '_' . date('Y-m-d') . '_' .date('H:i:s') . '.' .Str::after($name_file, '.');
        }

        //Move to correctly folder
        Storage::disk(config('klikbud.disk_store'))->move($store,  $folder .'/' .$name_file_store);

        //Delete old folder
        Storage::disk(config('klikbud.disk_store'))->deleteDirectory(Str::before($store, '/' . $name_file_store));

        $full_path = $folder . '/' . $name_file_store;

        return $this->store($to_table, $table_record_id, $name_file_store, $folder_name, $folder, $size, $mime, $file_type_id, $full_path);
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
        Storage::disk(config('klikbud.disk_store'))->setVisibility($store, 'public');

        //Type File
        $file_type_id = self::FILE_TYPE_IMAGE;

        //Create Folder
        $folder_name = md5(uniqid(now(), true));
        $folder = $this->folderCreate($group, $subgroup, $folder_name);

        //Get Mime and Size Stored File
        $mime = Storage::disk(config('klikbud.disk_store'))->mimeType($store);
        $size = Storage::disk(config('klikbud.disk_store'))->size($store);

        //Get name stored File
        $name_file = class_basename($store);

        //Move to correctly folder
        Storage::disk(config('klikbud.disk_store'))->move($store,  $folder .'/' .$name_file);

        //Delete old folder
        Storage::disk(config('klikbud.disk_store'))->deleteDirectory(Str::before($store, '/' . $name_file));

        $full_path = $folder . '/' . $name_file;

        return $this->store($to_table, $table_record_id, $name_file, $folder_name, $folder, $size, $mime, $file_type_id, $full_path);
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
    public function updateImageUseLivewire($update, $image_old_id,  $table_record_id, $to_table): mixed
    {
        Storage::disk(config('klikbud.disk_store'))->setVisibility($update, 'public');

        $get_information = FileAdditionalInformation::find($image_old_id);

        //Type File
        $file_type_id = self::FILE_TYPE_IMAGE;

        //Create Folder
        $folder_name = $get_information->folder;
        $folder = $get_information->path;

        //Get Mime and Size Updated File
        $mime = Storage::disk(config('klikbud.disk_store'))->mimeType($update);
        $size = Storage::disk(config('klikbud.disk_store'))->size($update);

        //Get name stored File
        $name_file = class_basename($update);

        //Move to correctly folder
        Storage::disk(config('klikbud.disk_store'))->move($update,  $folder .'/' .$name_file);

        //Delete old folder
        Storage::disk(config('klikbud.disk_store'))->deleteDirectory(Str::before($update, '/' . $name_file));

        $full_path = $folder . '/' . $name_file;

        // Soft Delete File
        $softDeleteFile = Files::findOrFail($get_information->file_id);
        $softDeleteFile->delete();

        // Soft Delete Additional Information
        $get_information->delete();

        return $this->store($to_table, $table_record_id, $name_file, $folder_name, $folder, $size, $mime, $file_type_id, $full_path);
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
     * @param $full_path
     * @return mixed
     */
    public function store($to_table, $table_record_id, $name, $folder, $path, $size, $mime, $file_type_id, $full_path): mixed
    {
        $store = new Files();
        $store->path = $full_path;
        $store->save();

        $add_info_store = new FileAdditionalInformation();

        $data = [
            'file_id' => $store->id,
            'user_id' => Auth::id(),
            'full_path' => $full_path,
            'to_table' => $to_table,
            'table_record_id' => $table_record_id,
            'name' => $name,
            'folder' => $folder,
            'path' => $path,
            'size' => $size,
            'mime' => $mime,
            'file_type_id' => $file_type_id,
            'moderated_id' => 2
        ];

        $add_info_store->fill($data);

        $add_info_store->save();

        return $store->id;
    }

    /**
     * @param $id
     * @return bool|StreamedResponse
     */
    public function downloadFile($id): bool|StreamedResponse
    {
        $file = FileAdditionalInformation::where('file_id', '=', $id)->first()->full_path;
        $check = Storage::disk(config('klikbud.disk_store'))->exists($file);
        if($check === true)
        {
            return Storage::disk(config('klikbud.disk_store'))->download($file);
        }
        abort(403);
        return false;
    }


}
