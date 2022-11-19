<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MapController extends Controller
{
    function location()
    {
        $api = Http::get('https://api.npoint.io/f26432e9e880999eeb1b');
        $map = json_decode($api);
        return view::make('map')->with('api',$map);
        // return $api;
    }
}
