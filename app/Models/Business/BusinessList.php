<?php

namespace App\Models\Business;

use App\Models\Address;
use App\Models\Files\FileAdditionalInformation;
use App\Models\Files\Files;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    protected $dontKeepRevisionOf = ['created_at'];

    use Sluggable, SoftDeletes, QueryCacheable, RevisionableTrait;

    /**
     * @return HasMany
     */
    public function departments(): HasMany
    {
        return $this->hasMany(__CLASS__, 'business_id');
    }

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

    /**
     * @return BelongsTo
     */
    public function business(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'business_id');
    }

    /**
     * @return BelongsTo
     */
    public function image(): BelongsTo
    {
        return $this->belongsTo(Files::class, 'image_id');
    }

    /**
     * @return BelongsTo
     */
    public function image_additional_information(): BelongsTo
    {
        return $this->belongsTo(FileAdditionalInformation::class, 'image_id', 'file_id');
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
