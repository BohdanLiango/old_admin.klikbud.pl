<?php

namespace App\Repositories\Files;

use App\Models\Files\FileAdditionalInformation;

class FilesAdditionalInformationRepository
{
    /**
     * @param $file_id
     * @param $user_id
     * @param $full_path
     * @param $to_table
     * @param $table_record_id
     * @param $name
     * @param $folder
     * @param $path
     * @param $size
     * @param $mime
     * @param $file_type_id
     * @param $moderated_id
     */
    public function store($file_id, $user_id, $full_path, $to_table, $table_record_id, $name, $folder, $path,
                          $size, $mime, $file_type_id, $moderated_id): void
    {
        $store = new FileAdditionalInformation();
        $data = [
            'file_id' => $file_id,
            'user_id' => $user_id,
            'full_path' => $full_path,
            'to_table' => $to_table,
            'table_record_id' => $table_record_id,
            'name' => $name,
            'folder' => $folder,
            'path' => $path,
            'size' => $size,
            'mime' => $mime,
            'file_type_id' => $file_type_id,
            'moderated_id' => $moderated_id
        ];
        $store->fill($data);
        $store->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function download($id): mixed
    {
        return FileAdditionalInformation::where('file_id', '=', $id)->first()->full_path;
    }

    /**
     * @param $image_id
     */
    public function delete($image_id): void
    {
        FileAdditionalInformation::where('file_id', '=', $image_id)->delete();
    }
}
