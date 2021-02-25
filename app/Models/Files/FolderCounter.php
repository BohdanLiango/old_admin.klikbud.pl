<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\RevisionableTrait;

class FolderCounter extends Model
{
    protected $table = 'file_folder_counter';
    protected $guarded = [];

    use RevisionableTrait;
    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;
    protected $revisionCleanup = true ; // Удалить старые ревизии (работает только при использовании с $ historyLimit)
    protected $historyLimit = 1000; // Сохранение максимум 5000 изменений в любой момент времени при очистке старых версий.

}
