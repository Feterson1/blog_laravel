<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Main\IndexController;



Route::prefix('admin')->group(function(){
    Route::get('/',IndexController::class);
});