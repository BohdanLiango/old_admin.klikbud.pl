<?php

namespace App\Models\Warehouses;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class StatusTool extends Model
{
    protected $table = 'status_tool';
    protected $guarded = [];
    protected $cacheFor = 3600 * 3600 * 3600;
    protected static $flushCacheOnUpdate = true;

    use QueryCacheable;
}
