<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class WebInicioController extends Controller
{
    public function __invoke()
    {
        return view('web.inicio.index');
    }
}
