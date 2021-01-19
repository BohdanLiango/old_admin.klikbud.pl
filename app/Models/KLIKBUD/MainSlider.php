<?php

namespace App\Models\KLIKBUD;

use App\Services\Files\FilesDataService;
use App\Services\Files\FilesService;
use App\Services\Files\FolderCounterService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Venturecraft\Revisionable\RevisionableTrait;

class MainSlider extends Model
{
    protected $table = 'klikbud_main_slider';
    protected $guarded = [];
    protected $casts =  [
        'alt' => 'array',
        'textYellow' => 'array',
        'textBlack' => 'array',
        'description' => 'array'
    ];

    const STATUS_IN_MAIN_PAGE = [
        '1' => 'Aktywny',
        '2' => 'Ukryty'
    ];

    use HasFactory;
    use SoftDeletes;
//    use QueryCacheable;
//    protected $cacheFor = 3600;

    use RevisionableTrait;
    protected bool $revisionEnabled = true;
    protected bool $revisionCreationsEnabled = true;
    protected bool $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected int  $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.


    public  FilesDataService $files;

    public function storeImage($file, $store_id)
    {
        return (new \App\Services\Files\FilesDataService(new FilesService(new FolderCounterService())))->klikBudMainSlider($file, $store_id);
    }
}
