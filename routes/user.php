<?php

use App\Http\Controllers\Personal\Comment\CommentController;
use App\Http\Controllers\Personal\Liked\LikedController;
use App\Http\Controllers\Personal\Main\PersonalController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth','verified')->group(function(){

    Route::prefix('personal')->group(function(){

        Route::get('/', PersonalController::class)->name('personal.main.index');

        Route::get('/liked',[LikedController::class,'index'])->name('personal.liked.index');

        Route::delete('/{post}',[LikedController::class,'delete'])->name('personal.liked.delete');







        Route::get('/comment',[CommentController::class,'index'])->name('personal.comment.index');

        Route::get('/{comment}/edit',[CommentController::class,'edit'])->name('personal.comment.edit');

        Route::patch('/{comment}',[CommentController::class,'update'])->name('personal.comment.update');

        Route::delete('comment/{comment}',[CommentController::class,'delete'])->name('personal.comment.delete');
       
        });




});

