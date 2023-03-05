<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Post\ShowPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',IndexController::class)->name('main.index');

Route::prefix('posts')->group(function(){
    Route::get('/',[ShowPostController::class,'index'])->name('post.index');
    Route::get('/{post}',[ShowPostController::class,'show'])->name('post.show');

});


Route::get('/logout',[LoginController::class,'logout']);









Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
