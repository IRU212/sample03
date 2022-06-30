<?php

use App\Http\Controllers\AcountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class,'index'])->name('home-index');

Route::prefix('/post')->group(function(){
    Route::get('/',[PostController::class,'index'])->name('post-index');
    Route::post('/create',[PostController::class,'create'])->name('post-create');
});

Route::prefix('/acount/{id}')->group(function(){
    Route::get('/',[AcountController::class,'index'])->name('acount-index');
    Route::patch('/update',[AcountController::class,'update'])->name('acount-update');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
