<?php

namespace App\Models\Warehouses;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class StatusToolRegister extends Model
{
    protected $table = 'status_tool_register';
    protected $guarded = [];
    protected $cacheFor = 3600 * 3600 * 3600;
    protected static $flushCacheOnUpdate = true;

    use QueryCacheable;
}
