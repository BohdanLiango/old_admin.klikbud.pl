<?php

namespace App\Models\Klikbud\Gallery;

use App\Models\Files\FileAdditionalInformation;
use App\Models\Files\Files;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class Gallery extends Model
{
    protected $table = 'klikbud_gallery';
    protected $guarded = [];
    protected $casts = [
        'old_images_id' => 'array',
        'slug' => 'array',
        'title' => 'array',
        'description' => 'array',
        'alt' => 'array'
    ];

    public const LANGUAGES = [
        'pl', 'en', 'ua', 'ru'
    ];

    use HasFactory;
    use SoftDeletes;
    use QueryCacheable;

    protected $cacheFor = 3600 * 3600;
    public $cachePrefix = 'klikbud_gallery';
    protected static $flushCacheOnUpdate = true;

    use RevisionableTrait;

    protected bool $revisionEnabled = true;
    protected bool $revisionCreationsEnabled = true;
    protected bool $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected int $historyLimit = 10; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $dontKeepRevisionOf = ['created_at'];

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
}
