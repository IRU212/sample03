<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        return view('image');
    }

    public function store(Request $request){
        
        $id = auth()->id();

        $user = User::find($id);

        // アップロードされたファイルの取得
        $image = $request->file('image');
        $back_image = $request->file('back_image');
        // ファイルの保存とパスの取得
        $path = isset($image) ? $image->store('items', 'public') : '';
        $back_path = isset($back_image) ? $back_image->store('items', 'public') : '';

        $update = [
            'image' => $path,
            'back_image' => $back_path
        ];

        $user->update($update);
    
        return redirect()->route('home-index');
    }
}
