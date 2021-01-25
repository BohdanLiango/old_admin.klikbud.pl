<?php

namespace App\Models\KLIKBUD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    protected int $historyLimit = 10; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
}
