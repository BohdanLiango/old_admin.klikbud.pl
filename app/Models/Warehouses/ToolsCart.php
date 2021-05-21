<?php

namespace App\Models\Warehouses;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class ToolsCart extends Model
{
    protected $table = 'warehouse_tool_cart';
    protected $guarded = [];
    public $timestamps = false;
    protected $cacheFor = 3600 * 3600 * 3600;
    protected static $flushCacheOnUpdate = true;
    protected $casts = [
        'items' => 'array',
//        'created_at' => 'datetime:d-m-Y'
    ];

    use QueryCacheable, SoftDeletes;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
