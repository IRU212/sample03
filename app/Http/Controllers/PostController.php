<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $id = auth()->id();
        $icon_image = User::find($id)->get();
        $data = [
            'icon_image' => $icon_image
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
