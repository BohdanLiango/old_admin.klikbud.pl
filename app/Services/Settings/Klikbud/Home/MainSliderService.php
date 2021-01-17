<?php

namespace App\Services\Settings\Klikbud\Home;

use App\Services\Files\FilesService;
use App\Services\Service;
use App\Models\KLIKBUD\MainSlider;
use Exception;

class MainSliderService extends Service
{
    protected FilesService $file;

    public function __construct(FilesService $filesService)
    {
        $this->file = $filesService;
    }

    /**
     * Show all slider by pagination
     *
     * @param $paginate integer
     *
     * @return mixed
     */
    public function showSlidersOrderByIdPaginate(int $paginate)
    {
        return MainSlider::orderBy('id', 'DESC')->paginate($paginate);
    }
}
