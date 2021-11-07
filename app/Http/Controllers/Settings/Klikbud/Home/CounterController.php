<?php

namespace App\Http\Controllers\Settings\Klikbud\Home;

use App\Http\Controllers\Controller;

class CounterController extends Controller
{
    public function index()
    {
        return view('app.klikbud.home.counter.index');
    }
}
