<?php

namespace App\Models\Business;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class BusinessList extends Model
{
    protected $table = 'business_list';
    protected $guarded = [];
    protected $cacheFor = 3600 * 3600 * 3600;
    protected static $flushCacheOnUpdate = true;
    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;

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
