<?php

namespace App\Services\Files;

use App\Models\Files\Files;
use App\Models\Files\FilesBackup;
use Exception;
use Illuminate\Support\Facades\Auth;

class FilesBackupService extends FileService
{
    public function store($id):void
    {
        try {
            $findData = Files::find($id);

            $store = new FilesBackup();

            $data = [
                'table_id' => $id,
                'user_update_id' => Auth::id(),
                'user_id' => $findData->user_id,
                'to_table' => $findData->to_table,
                'slug' => $findData->slug,
                'table_record_id' => $findData->table_record_id,
                'name' => $findData->name,
                'folder' => $findData->folder,
                'path' => $findData->path,
                'size' => $findData->size,
                'mime' => $findData->mime,
                'file_type_id' => $findData->file_type_id,
                'unique_number' => $findData->unique_number,
                'moderated_id' => $findData->moderated_id
            ];

            $store->fill($data)->save();

        }catch (Exception $e){
            abort(403);
        }
    }
}
