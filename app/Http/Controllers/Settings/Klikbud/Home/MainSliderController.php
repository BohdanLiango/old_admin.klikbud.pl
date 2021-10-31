<?php

namespace App\Http\Controllers\Settings\Klikbud\Home;

use App\Http\Controllers\Controller;

class MainSliderController extends Controller
{
    public function index()
    {
        return view('app.klikbud.home.slider.index');
    }

    public function one()
    {
        return view('app.klikbud.home.slider.show_one');
    }

    public function edit()
    {
        return view('app.klikbud.home.slider.edit');
    }

    public function add()
    {
        return view('app.klikbud.home.slider.add');
    }
}
