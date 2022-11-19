<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Post;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function show_post(){
        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')->get();
        // $posts = Post::all();
       // return $posts;
        $user = Auth::user();
       // return $user;
     return view('dashboard', ['posts'=>$posts, 'user'=>$user]);
    }
}
