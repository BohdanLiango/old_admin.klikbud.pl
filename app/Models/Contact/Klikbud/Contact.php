<?php

namespace App\Models\Contact\Klikbud;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Contact extends Model
{
    protected $table = 'klikbud_contact';
    protected $guarded = [];

    use HasFactory;
    use SoftDeletes;
    use QueryCacheable;

    protected $cacheFor = 3600 * 3600 * 3600;
    public $cachePrefix = 'klikbud_contact';
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
    public function user_details(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_read_id');
    }
}
