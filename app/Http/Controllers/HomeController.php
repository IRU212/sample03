<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $id = auth()->id();
        $icon_image = User::find($id)->get();
        $data = [
            'icon_image' => $icon_image
        ];
        return view('home',$data);
    }
}
