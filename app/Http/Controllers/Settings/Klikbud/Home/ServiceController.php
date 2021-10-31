<?php


namespace App\Http\Controllers\Settings\Klikbud\Home;

use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        return view('app.klikbud.home.service.index');
    }

    public function one()
    {
        return view('app.klikbud.home.service.show_one');
    }

    public function add()
    {
        return view('app.klikbud.home.service.add');
    }

    public function edit()
    {
        return view('app.klikbud.home.service.edit');
    }
}
