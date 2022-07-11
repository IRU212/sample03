<?php

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\AcountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Logout;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/image',[ImageController::class,'index'])->name('image-index');
// Route::post('/image/store',[ImageController::class,'store'])->name('image-store');

Route::get('/home',[HomeController::class,'index'])->name('home-index')->middleware(
    [
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ]
    );

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('/post')->group(function(){
    Route::get('/',[PostController::class,'index'])->name('post-index');
    Route::post('/create',[PostController::class,'create'])->name('post-create');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('/acount/{id}')->group(function(){
    Route::get('/',[AcountController::class,'index'])->name('acount-index');
    Route::patch('/update',[AcountController::class,'update'])->name('acount-update');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('/search')->group(function(){
    Route::get('/',[SearchController::class,'index'])->name('search-index');
    Route::post('/',[SearchController::class,'index'])->name('search-index');
    Route::get('/result',[SearchController::class,'search'])->name('search-search');
});

Route::get('/logout',[Logout::class,'logout'])->name('logout');
Route::post('/confirm',[AcountController::class,'confirm'])->name('acount-confirm');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
