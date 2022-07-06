<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class SearchController extends Controller
{
    public function index(Request $request){

        $id = auth()->id();

        $icon_image = User::where('id',$id)->get();

        $posts = DB::table('posts')
        ->leftJoin('users', 'posts.user_id', '=', 'users.id')
        ->select('users.image as profile','posts.text as text','posts.image as image')
        ->where('users.id',$id)
        ->orderBy('posts.created_at', 'desc')
        ->get();

        $post = DB::table('posts')
        ->leftJoin('users', 'posts.user_id', '=', 'users.id')
        ->select('users.image as profile','posts.text as text','posts.image as image')
        ->orderBy('posts.created_at', 'desc');

        $keyword = $request->keyword;
        $results = $post->where('text', 'LIKE', "%{$keyword}%")->get();

        $data = [
            'icon_image' => $icon_image,
            'posts' => $posts,
            'results' => $results,
        ];

        return view('search',$data);
    }
}
