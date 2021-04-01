<?php

namespace App\Models\Warehouses;

use App\Models\Business\BusinessList;
use App\Models\Files\Files;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Tools extends Model
{
    protected $table = 'warehouse_tools';
    protected $guarded = [];
    protected $cacheFor = 3600 * 3600 * 3600;
    protected static $flushCacheOnUpdate = true;
    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;

    use Sluggable, SoftDeletes, QueryCacheable, RevisionableTrait;

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
    public function guarantee_file(): BelongsTo
    {
        return $this->belongsTo(Files::class, 'guarantee_file_id');
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ToolsCategory::class, 'category_id');
    }

    /**
     * @return BelongsTo
     */
    public function half_category(): BelongsTo
    {
        return $this->belongsTo(ToolsCategory::class, 'half_category_id');
    }

    /**
     * @return BelongsTo
     */
    public function main_category(): BelongsTo
    {
        return $this->belongsTo(ToolsCategory::class, 'main_category_id');
    }

    /**
     * @return BelongsTo
     */
    public function box(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'box_id');
    }

    /**
     * @return BelongsTo
     */
    public function business_department(): BelongsTo
    {
        return $this->belongsTo(BusinessList::class, 'business_departments_id');
    }

    /**
     * @return BelongsTo
     */
    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(BusinessList::class, 'manufacturer_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
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
