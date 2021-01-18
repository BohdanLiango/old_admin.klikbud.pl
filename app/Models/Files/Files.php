<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Files extends Model
{
    protected $table = 'file';
    protected $guarded = [];


    use HasFactory;
    use SoftDeletes;

    use RevisionableTrait;
    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;
    protected $revisionCleanup = true ; // Удалить старые ревизии (работает только при использовании с $ historyLimit)
    protected $historyLimit = 5000 ; // Сохранение максимум 5000 изменений в любой момент времени при очистке старых версий.

    use QueryCacheable;
    protected $cacheFor = 3600;

}
