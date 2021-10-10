<?php

namespace App\Models\File;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class AdditionalInformation extends Model
{
    protected $table = 'file_additional_information';
    protected $guarded = [];

    use SoftDeletes;

    use RevisionableTrait;
    protected bool $revisionEnabled = true;
    protected bool $revisionCreationsEnabled = true;
    protected bool $revisionCleanup = true ; // Удалить старые ревизии (работает только при использовании с $ historyLimit)
    protected int $historyLimit = 50 ; // Сохранение максимум 5000 изменений в любой момент времени при очистке старых версий.
    protected $dontKeepRevisionOf = ['created_at'];

    use QueryCacheable;
    protected int $cacheFor = 3600;
    protected static $flushCacheOnUpdate = true;
    /**
     * @return BelongsTo
     */
    public function files(): BelongsTo
    {
        return $this->belongsTo(File::class, 'file_id');
    }

    /**
     * @return BelongsTo
     */
    public function user_details(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
