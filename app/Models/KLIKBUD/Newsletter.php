<?php

namespace App\Models\KLIKBUD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Newsletter extends Model
{
    protected $table = 'klikbud_newsletter';
    protected $guarded = [];

    use HasFactory;
    use SoftDeletes;
//    use QueryCacheable;
//
//    protected $cacheFor = 3600 * 3600 * 3600;
//    public $cachePrefix = 'klikbud_newsletter';
//    protected static $flushCacheOnUpdate = true;

    use RevisionableTrait;

    protected bool $revisionEnabled = true;
    protected bool $revisionCreationsEnabled = true;
    protected bool $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected int $historyLimit = 5; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
}
