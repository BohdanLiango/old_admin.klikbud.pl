<?php

namespace App\Http\Controllers\Settings\Klikbud\Home\Opinion;

use App\Http\Controllers\Controller;

class PortalController extends Controller
{
    public function index()
    {
        return view('app.klikbud.home.opinion.portal.index');
    }
}
