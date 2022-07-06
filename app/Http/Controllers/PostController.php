<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request){
        $id = auth()->id();

        $posts = DB::table('users')
        ->where('user_id',$id)
        ->select('users.image as profile','posts.text as text','posts.image as image')
        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
        ->orderBy('posts.created_at', 'desc')
        ->get();

        $icon_image = User::where('id',$id)->get();

        $data = [
            'icon_image' => $icon_image,
            'posts' => $posts
        ];

        return view('post',$data);
    }

    public function create(Request $request){

        $id = auth()->id();
        $icon_image = User::find($id)->get();

        $image = $request->file('image');
        if($image){
            $path = isset($image) ? $image->store('items', 'public') : '';
        } else {
            $path = '';
        }
        Post::create([
            'text' => $request->text,
            'image' => $path,
            'user_id' => auth()->id(),
            'icon_image' => $icon_image
        ]);

        return redirect()->back();
    }
}
