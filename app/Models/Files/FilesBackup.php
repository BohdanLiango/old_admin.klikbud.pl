<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class FilesBackup extends Model
{
    protected $table = 'backup_file';
    protected $guarded = [];

    use HasFactory;
    use SoftDeletes;
    use QueryCacheable;
    protected $cacheFor = 3600;

    use RevisionableTrait;
    protected bool $revisionEnabled = true;
    protected bool $revisionCreationsEnabled = true;
    protected bool $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected int  $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
}
