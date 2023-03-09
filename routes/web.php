<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\Post\CategoryPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Post\Comment\CommentController;
use App\Http\Controllers\Post\Like\LikeController;
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

Route::group(['namespace'=>'Post','prefix' => 'posts'],function(){
    
    
    Route::get('/',[ShowPostController::class,'index'])->name('post.index');
    Route::get('/{post}',[ShowPostController::class,'show'])->name('post.show');
    
   
    Route::group(['namespace'=>'Coment','prefix' => '{post}/comments'],function(){

            Route::post('/',[CommentController::class,'store'])->name('post.comment.store');

        });

        Route::group(['namespace'=>'Like','prefix' => '{post}/likes'],function(){
            
            Route::post('/',[LikeController::class,'store'])->name('post.like.store');

        });
       
       
   

});

Route::group(['namespace'=>'Category','prefix' => 'categories'],function(){
    Route::get('/',[CategoryController::class,'index'])->name('category.index');


});
Route::group(['namespace'=>'Post','prefix' => '{category}/posts'],function(){
    Route::get('/',[CategoryPostController::class,'index'])->name('category.post.index');


});

Route::get('/logout',[LoginController::class,'logout']);









Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
