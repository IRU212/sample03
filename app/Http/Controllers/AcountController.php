<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AcountController extends Controller
{
    public function index(){

        $id = auth()->id();
        $icon_image = User::where('id',$id)->get();
        $information = $icon_image;

        $posts = DB::table('users')
        ->where('user_id',$id)
        ->select('users.image as profile','posts.text as text','posts.image as image')
        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
        ->orderBy('posts.created_at', 'desc')
        ->get();

        $data = [
            'information' => $information,
            'icon_image' => $icon_image,
            'posts' => $posts
        ];
        return view('acount',$data);
    }

    public function update(Request $request,$id){

        $user = User::find($id);

        $image = $request->file('image');
        if($image){
            $path = isset($image) ? $image->store('items', 'public') : '';
        } else {
            $path = $user->image;
        }
        $back_image = $request->file('back_image');
        if($back_image){
            $back_path = isset($back_image) ? $back_image->store('items', 'public') : '';
        } else {
            $back_path = $user->back_image;
        }

        if($request->name){
            $name = $request->name;
        } else {
            $name = $user->name;
        }

        if($request->email){
            $email = $request->email;
        } else {
            $email = $user->email;
        }

        $update = [
            $user->name = $name,
            $user->email = $email,
            $user->image = $path,
            $user->back_image = $back_path,
        ];

        $user->update($update);

        $image = $request->file('image');
        if($image){
            $path = isset($image) ? $image->store('items', 'public') : '';
        } else {
            $path = $user->image;
        }
        $back_image = $request->file('back_image');
        if($back_image){
            $back_path = isset($back_image) ? $back_image->store('items', 'public') : '';
        } else {
            $back_path = $user->back_image;
        }

        if($request->name){
            $name = $request->name;
        } else {
            $name = $user->name;
        }

        if($request->email){
            $email = $request->email;
        } else {
            $email = $user->email;
        }

        $update = [
            $user->name = $name,
            $user->email = $email,
            $user->image = $path,
            $user->back_image = $back_path,
        ];

        $user->update($update);

        return redirect()->back();
    }

    public function confirm(Request $request){
        $id = auth()->id();
        $pass = User::find($id)->password;
        $password = $request->password;
        if(Hash::check($password, $pass)){
            return redirect()->route('acount-index');
        }
    }
}
