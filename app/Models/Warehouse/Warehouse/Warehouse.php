<?php

namespace App\Models\Warehouse\Warehouse;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Warehouse extends Model
{
    protected $table = 'warehouses';
    protected $guarded = [];
    protected $cacheFor = 3600 * 3600 * 3600;
    protected static $flushCacheOnUpdate = true;
    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = ['created_at'];

    use Sluggable, SoftDeletes, QueryCacheable, RevisionableTrait;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
