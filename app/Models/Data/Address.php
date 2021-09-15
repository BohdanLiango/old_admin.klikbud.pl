<?php

namespace App\Models\Data;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Address extends Model
{
    protected $table = 'address';
    protected $guarded = [];

    use Sluggable;
    use HasFactory;
    use SoftDeletes;
    use QueryCacheable;
    protected $cacheFor = 3600000000;
    protected static $flushCacheOnUpdate = true;
    public $cacheTags = ['address'];
    public $cachePrefix = 'address_';

    use RevisionableTrait;
    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 10; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $dontKeepRevisionOf = ['created_at'];

    public function country()
    {
        return $this->belongsTo(__CLASS__, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(__CLASS__, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(__CLASS__, 'town_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
