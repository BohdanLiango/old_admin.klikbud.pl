<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Address extends Model
{
    protected $table = 'address';
    protected $guarded = [];

    use HasFactory;
    use SoftDeletes;
    use QueryCacheable;
    protected $cacheFor = 3600;
    protected static $flushCacheOnUpdate = true;

    use RevisionableTrait;
    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 10; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
}
