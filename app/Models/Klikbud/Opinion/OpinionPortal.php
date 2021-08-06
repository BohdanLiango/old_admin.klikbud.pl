<?php

namespace App\Models\Klikbud\Opinion;

use App\Models\Files\Files;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class OpinionPortal extends Model
{
    protected $table = 'klikbud_opinion_portal';

    protected $fillable = [
        'title',
        'url',
        'user_id',
        'image_id'
    ];

    use HasFactory;
    use SoftDeletes;

    use QueryCacheable;
    protected $cacheFor = 3600 * 3600 * 3600;
    public $cachePrefix = 'klikbud_opinion_portal';
    protected static $flushCacheOnUpdate = true;

    use RevisionableTrait;

    protected bool $revisionEnabled = true;
    protected bool $revisionCreationsEnabled = true;
    protected bool $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected int $historyLimit = 5; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $dontKeepRevisionOf = ['created_at'];

    /**
     * @return HasMany
     */
    public function opinions(): HasMany
    {
        return $this->hasMany(Opinion::class, 'portal_opinion_id');
    }

    /**
     * @return BelongsTo
     */
    public function image(): BelongsTo
    {
        return $this->belongsTo(Files::class, 'image_id');
    }
}
