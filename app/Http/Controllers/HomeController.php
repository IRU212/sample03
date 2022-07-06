<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $id = auth()->id();

        $icon_image = User::where('id',$id)->get();

        $post = DB::table('posts')
        ->leftJoin('users', 'posts.user_id', '=', 'users.id')
        ->select('users.image as profile','posts.text as text','posts.image as image')
        ->orderBy('posts.created_at', 'desc')
        ->get();

        $posts = json_decode($post,true);

        $data = [
            'icon_image' => $icon_image,
            'posts' => $posts
        ];
        return view('home',$data);
    }
}
