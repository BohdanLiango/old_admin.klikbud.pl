<?php

namespace App\Models\Client;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Note extends Model
{
    protected $table = 'client_notes';
    protected $guarded = [];

    use SoftDeletes;
    use QueryCacheable;
    protected $cacheFor = 3600 * 3600 * 3600;
    protected static $flushCacheOnUpdate = true;

    /**
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
