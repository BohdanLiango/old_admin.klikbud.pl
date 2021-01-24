<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Files extends Model
{
    protected $table = 'file';
    protected $fillable = ['file_view'];


    use HasFactory;
    use SoftDeletes;

    use RevisionableTrait;

    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;
    protected $revisionCleanup = true; // Удалить старые ревизии (работает только при использовании с $ historyLimit)
    protected $historyLimit = 50; // Сохранение максимум 5000 изменений в любой момент времени при очистке старых версий.

    use QueryCacheable;
    protected static $flushCacheOnUpdate = true;

    protected $cacheFor = 3600 * 3600 * 3600;
    public $cachePrefix = 'files_';


    /**
     * @return BelongsTo
     */
    public function additionalInformation(): BelongsTo
    {
        return $this->belongsTo(FileAdditionalInformation::class, 'file_id');
    }
}
