<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Main\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;



Route::prefix('admin')->group(function(){
    Route::get('/',AdminController::class);
    Route::prefix('categories')->group(function(){
        Route::get('/',[CategoryController::class,'index']);
    });

});