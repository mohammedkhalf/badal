<?php

namespace App\Http\Controllers;

use Theme;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomController extends Controller
{
    public function dynamicMap()
    {
        return Theme::scope('real-estate.dynamic-map')->render();

    }
}
