<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Main\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\User\UserController;





Route::middleware('auth','admin','verified')->group(function(){
    Route::group(['namespace' =>'Admin','prefix' => 'admin'],function(){
        Route::get('/',[AdminController::class,'index'])->name('admin.main.index');
        Route::group(['namespace' => 'Category','prefix' => 'categories'],function(){
            Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');
            Route::get('/create',[CategoryController::class,'create'])->name('admin.category.create');
            Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
            Route::get('/{category}',[CategoryController::class,'show'])->name('admin.category.show');
            Route::get('/{category}/edit',[CategoryController::class,'edit'])->name('admin.category.edit');
            Route::patch('/{category}',[CategoryController::class,'update'])->name('admin.category.update');
            Route::delete('/{category}',[CategoryController::class,'delete'])->name('admin.category.delete');
        });
    
        Route::group(['namespace' =>'Tag','prefix' => 'tags'],function(){
            Route::get('/',[TagController::class,'index'])->name('admin.tag.index');
            Route::get('/create',[TagController::class,'create'])->name('admin.tag.create');
            Route::post('/store',[TagController::class,'store'])->name('admin.tag.store');
            Route::get('/{tag}',[TagController::class,'show'])->name('admin.tag.show');
            Route::get('/{tag}/edit',[TagController::class,'edit'])->name('admin.tag.edit');
            Route::patch('/{tag}',[TagController::class,'update'])->name('admin.tag.update');
            Route::delete('/{tag}',[TagController::class,'delete'])->name('admin.tag.delete');
        });
    
        Route::group(['namespace' =>'Post','prefix' => 'posts'],function(){
            Route::get('/',[PostController::class,'index'])->name('admin.post.index');
            Route::get('/create',[PostController::class,'create'])->name('admin.post.create');
            Route::post('/store',[PostController::class,'store'])->name('admin.post.store');
            Route::get('/{post}',[PostController::class,'show'])->name('admin.post.show');
            Route::get('/{post}/edit',[PostController::class,'edit'])->name('admin.post.edit');
            Route::patch('/{post}',[PostController::class,'update'])->name('admin.post.update');
            Route::delete('/{post}',[PostController::class,'delete'])->name('admin.post.delete');
        });
    
        Route::group(['namespace' =>'User','prefix' => 'users'],function(){
            Route::get('/',[UserController::class,'index'])->name('admin.user.index');
            Route::get('/create',[UserController::class,'create'])->name('admin.user.create');
            Route::post('/store',[UserController::class,'store'])->name('admin.user.store');
            Route::get('/{user}',[UserController::class,'show'])->name('admin.user.show');
            Route::get('/{user}/edit',[UserController::class,'edit'])->name('admin.user.edit');
            Route::patch('/{user}',[UserController::class,'update'])->name('admin.user.update');
            Route::delete('/{user}',[UserController::class,'delete'])->name('admin.user.delete');
        });
    
    });
    
});


