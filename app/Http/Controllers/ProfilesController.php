<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfilesController extends Controller
{
    function list()
    {
        $data = Http::get('https://jsonplaceholder.typicode.com/posts');
        $obj = json_decode($data);
        return view('profiles')->with('data',$obj);
        // return $data;
    }
}
