<?php

namespace App\Http\Controllers\Settings\Klikbud\Home\Opinion;

use App\Http\Controllers\Controller;

class OpinionController extends Controller
{
    public function index()
    {
        return view('app.klikbud.home.opinion.index');
    }

    public function add()
    {
        return view('app.klikbud.home.opinion.add');
    }

    public function edit()
    {
        return view('app.klikbud.home.opinion.edit');
    }
}
