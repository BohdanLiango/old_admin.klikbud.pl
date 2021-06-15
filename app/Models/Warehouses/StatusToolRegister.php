<?php

namespace App\Models\Warehouses;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Rennokki\QueryCache\Traits\QueryCacheable;

class StatusToolRegister extends Model
{
    protected $table = 'status_tool_register';
    protected $guarded = [];
    protected $cacheFor = 3600 * 3600 * 3600;
    protected static $flushCacheOnUpdate = true;

    use QueryCacheable;

    /**
     * @return BelongsTo
     */
    public function user_add(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function user_update(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_last_update_id');
    }
}
