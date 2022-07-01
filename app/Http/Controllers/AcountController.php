<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AcountController extends Controller
{
    public function index($id){
        $icon_image = User::find($id)->get();
        $information = $icon_image;
        $data = [
            'information' => $information,
            'icon_image' => $icon_image
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

        return redirect()->back();
    }
}
