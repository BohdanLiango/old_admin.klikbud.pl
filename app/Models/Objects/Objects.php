<?php

namespace App\Models\Objects;

use App\Models\Address;
use App\Models\Clients\Clients;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Objects extends Model
{
    protected $table = 'objects';
    protected $guarded = [];
    protected $casts = [
        'manager_id' => 'collection',
    ];

    use HasFactory;
    use SoftDeletes;
    use QueryCacheable;
    use Sluggable;
    protected $cacheFor = 3600 * 3600 * 3600;
    protected static $flushCacheOnUpdate = true;

    use RevisionableTrait;
    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;

    public function country()
    {
        return $this->belongsTo(Address::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(Address::class, 'state_id');
    }

    public function town()
    {
        return $this->belongsTo(Address::class, 'town_id');
    }

    public function street()
    {
        return $this->belongsTo(Address::class, 'street_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id');
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
