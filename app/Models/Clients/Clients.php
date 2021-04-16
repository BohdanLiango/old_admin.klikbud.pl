<?php

namespace App\Models\Clients;

use App\Models\Address;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Clients extends Model
{
    protected $table = 'clients';
    protected $guarded = [];
    protected $casts = [
        'mobile' => 'array',
        'email' => 'array',
        'language' => 'array',
        'communication' => 'array'
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
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 100; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.

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

    /**
     * @return HasMany
     */
    public function notes(): HasMany
    {
        return $this->hasMany(ClientNotes::class, 'client_id', 'id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'last_name'
            ]
        ];
    }
}
