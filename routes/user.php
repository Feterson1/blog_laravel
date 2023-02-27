<?php

use Illuminate\Support\Facades\Route;




Route::prefix('user')->group(function(){
    Route::get('/', AdminController::class);
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class,'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class,'create'])->name('admin.category.create');
        Route::post('/store', [CategoryController::class,'store'])->name('admin.category.store');
        Route::get('/{category}', [CategoryController::class,'show'])->name('admin.category.show');
        Route::get('/{category}/edit', [CategoryController::class,'edit'])->name('admin.category.edit');
        Route::patch('/{category}', [CategoryController::class,'update'])->name('admin.category.update');
        Route::delete('/{category}', [CategoryController::class,'delete'])->name('admin.category.delete');
    });
});