<?php

namespace App\Models\Employee;

use App\Models\Data\Address;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Employee extends Model
{
    protected $table = 'employee';
    protected $guarded = [];
    protected $casts = [
        'phone' => 'collection',
        'email' => 'collection',
        'social_link_facebook' => 'collection',
        'social_link_instagram' => 'collection',
        'skills' => 'collection',
    ];

    use SoftDeletes;
    use QueryCacheable;
    use Sluggable;
    protected $cacheFor = 3600 * 3600 * 3600;
    protected static $flushCacheOnUpdate = true;

    use RevisionableTrait;
    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = ['created_at'];

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'country_id');
    }

    /**
     * @return BelongsTo
     */
    public function state(): BelongsTo
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

    public function nation_country()
    {
        return $this->belongsTo(Address::class, 'nation_country_id');
    }

    public function nation_state()
    {
        return $this->belongsTo(Address::class, 'nation_state_id');
    }

    public function nation_town()
    {
        return $this->belongsTo(Address::class, 'nation_town_id');
    }

    public function nation_street()
    {
        return $this->belongsTo(Address::class, 'nation_street_id');
    }

    public function user_add()
    {
        return $this->belongsTo(User::class, 'user_id_add');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user_interview()
    {
        return $this->belongsTo(User::class, 'user_interview_id');
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
