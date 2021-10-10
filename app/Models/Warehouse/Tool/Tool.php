<?php

namespace App\Models\Warehouse\Tool;

use App\Models\Business\Business;
use App\Models\File\AdditionalInformation;
use App\Models\File\File;
use App\Models\User;
use App\Models\Warehouse\Tool\Category\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Tool extends Model
{
    protected $table = 'warehouse_tools';
    protected $guarded = [];
    protected $cacheFor = 3600 * 3600 * 3600;
    protected static $flushCacheOnUpdate = true;
    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = ['created_at', 'box_id', 'status_table', 'status_table_id'];

    use Sluggable, SoftDeletes, QueryCacheable, RevisionableTrait;

    /**
     * @return BelongsTo
     */
    public function image(): BelongsTo
    {
        return $this->belongsTo(File::class, 'image_id');
    }

    /**
     * @return BelongsTo
     */
    public function guarantee_file(): BelongsTo
    {
        return $this->belongsTo(File::class, 'guarantee_file_id');
    }

    /**
     * @return BelongsTo
     */
    public function guarantee_file_add(): BelongsTo
    {
        return $this->belongsTo(AdditionalInformation::class, 'guarantee_file_id', 'file_id');
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return BelongsTo
     */
    public function half_category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'half_category_id');
    }

    /**
     * @return BelongsTo
     */
    public function main_category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'main_category_id');
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
        return $this->belongsTo(Business::class, 'business_departments_id');
    }

    /**
     * @return BelongsTo
     */
    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Business::class, 'manufacturer_id');
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
    public function global_status_register(): HasMany
    {
        return $this->hasMany(Status::class, 'id', 'tool_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @return HasMany
     */
    public function tools(): HasMany
    {
        return $this->hasMany(__CLASS__, 'box_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function registerHistoryTool(): HasMany
    {
        return $this->hasMany(Status::class, 'tool_id', 'id');
    }
}
