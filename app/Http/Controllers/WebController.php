<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{

    public function index()
    {
        $logged = auth()->check();

        return view('index', compact('logged'));
    }


}
