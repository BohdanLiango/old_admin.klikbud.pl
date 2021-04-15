<?php

namespace App\Models\Warehouses;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class ToolsCategory extends Model
{
    protected $table = 'warehouse_tools_category';
    protected $guarded = [];
    protected $cacheFor = 3600 * 3600 * 3600;
    protected static $flushCacheOnUpdate = true;
    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;

    use Sluggable, SoftDeletes, QueryCacheable, RevisionableTrait;

    /**
     * @return HasMany
     */
    public function main_categories(): HasMany
    {
        return $this->hasMany(__CLASS__, 'half_category_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function main_category(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'main_category_id');
    }

    /**
     * @return HasMany
     */
    public function half_categories(): HasMany
    {
        return $this->hasMany(__CLASS__, 'main_category_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function half_category(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'half_category_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    public function tools_main(): HasMany
    {
        return $this->hasMany(Tools::class, 'main_category_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function tools_half(): HasMany
    {
        return $this->hasMany(Tools::class, 'half_category_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function tools_category(): HasMany
    {
        return $this->hasMany(Tools::class, 'category_id', 'id');
    }

    /**
     * @return string[][]
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
