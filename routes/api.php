<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix'=>'auth'], function (){
    Route::post('register',[\App\Http\Controllers\Auth\AuthController::class,'register'])->name('auth.register');
});

Route::apiResource('/category',\App\Http\Controllers\Category\CategoryController::class);
