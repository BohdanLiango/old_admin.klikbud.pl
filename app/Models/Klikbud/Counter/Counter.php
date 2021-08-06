<?php

namespace App\Models\Klikbud\Counter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Counter extends Model
{
    protected $table = 'klikbud_counter';
    protected $guarded = [];

    use HasFactory;
    use QueryCacheable;

    protected $cacheFor = 3600 * 3600 * 3600;
    public $cachePrefix = 'klikbud_counter_';
    protected static $flushCacheOnUpdate = true;

    use RevisionableTrait;

    protected bool $revisionEnabled = true;
    protected bool $revisionCreationsEnabled = true;
    protected bool $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected int $historyLimit = 3; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $dontKeepRevisionOf = ['created_at'];
}
