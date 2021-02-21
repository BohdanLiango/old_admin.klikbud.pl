<?php

namespace App\Http\Controllers;

use App\Services\Files\FilesService;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends AdminController
{
    private FilesService $file;

    public function __construct(FilesService $filesService)
    {
        parent::__construct();
        $this->file = $filesService;
    }

    /**
     * Download File
     *
     * @param $id
     * @return StreamedResponse
     */
    public function download($id): StreamedResponse
    {
        return $this->file->downloadFile($id);
    }
}
