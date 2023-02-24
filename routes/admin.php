<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Main\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Tag\TagController;



Route::prefix('admin')->group(function(){
    Route::get('/',AdminController::class);
    Route::prefix('categories')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');
        Route::get('/create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
        Route::get('/{category}',[CategoryController::class,'show'])->name('admin.category.show');
        Route::get('/{category}/edit',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::patch('/{category}',[CategoryController::class,'update'])->name('admin.category.update');
        Route::delete('/{category}',[CategoryController::class,'delete'])->name('admin.category.delete');
    });

    Route::prefix('tags')->group(function(){
        Route::get('/',[TagController::class,'index'])->name('admin.tag.index');
        Route::get('/create',[TagController::class,'create'])->name('admin.tag.create');
        Route::post('/store',[TagController::class,'store'])->name('admin.tag.store');
        Route::get('/{tag}',[TagController::class,'show'])->name('admin.tag.show');
        Route::get('/{tag}/edit',[TagController::class,'edit'])->name('admin.tag.edit');
        Route::patch('/{tag}',[TagController::class,'update'])->name('admin.tag.update');
        Route::delete('/{tag}',[TagController::class,'delete'])->name('admin.tag.delete');
    });

});

