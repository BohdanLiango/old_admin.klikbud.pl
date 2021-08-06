<?php

namespace App\Models\Klikbud\Opinion;

use App\Models\Klikbud\Services\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Opinion extends Model
{
    protected $table = 'klikbud_opinion';

    protected $fillable = [
        'name',
        'service_id',
        'stars',
        'status_to_main_page_id',
        'is_new_id',
        'portal_opinion_id',
        'user_id',
        'moderated_id',
        'opinion',
        'date_add'
    ];

    public const STARS = [
        1,2,3,4,5
    ];

    use HasFactory;
    use SoftDeletes;
    use QueryCacheable;

    protected $cacheFor = 3600 * 3600 * 3600;
    public $cachePrefix = 'klikbud_opinion';
    protected static $flushCacheOnUpdate = true;

    use RevisionableTrait;

    protected bool $revisionEnabled = true;
    protected bool $revisionCreationsEnabled = true;
    protected bool $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected int $historyLimit = 5; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $dontKeepRevisionOf = ['created_at'];

    /**
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * @return BelongsTo
     */
    public function user_details(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function portal(): BelongsTo
    {
        return $this->belongsTo(OpinionPortal::class, 'portal_opinion_id');
    }

}
