<?php

namespace App\Services\Settings\Klikbud\Home;

use App\Helpers\Helper;
use App\Repositories\Settings\Home\MainSliderRepository;

class MainSliderService
{
    public MainSliderRepository $repository;
    public Helper $helper;

    public function __construct(MainSliderRepository $mainSliderRepository, Helper $helper)
    {
        $this->repository = $mainSliderRepository;
        $this->helper = $helper;
    }

    public function store($data)
    {

    }



}
