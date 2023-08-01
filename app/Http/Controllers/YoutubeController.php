<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function results()
    {
        return view('results');
    }

    public function watch()
    {
        return view('watch');
    }
}
