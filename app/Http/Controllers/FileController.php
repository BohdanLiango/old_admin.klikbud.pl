<?php


namespace App\Http\Controllers;


use App\Services\Files\FilesService;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
     * @return BinaryFileResponse
     */
    public function download($id): BinaryFileResponse
    {
        return $this->file->downloadFile($id);
    }
}
