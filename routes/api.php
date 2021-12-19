<?php

use App\Models\User;
use App\Models\Picture;
use Illuminate\Http\Request;
use App\Http\Controllers\ReactController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\TestController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\AuthenticationController;

Route::post('/pictures',[PictureController::class,'search']);
Route::get('/pictures/{id}',[PictureController::class,'show']);
Route::post('/pictures/store',[PictureController::class,'store'])->middleware('App\Http\Middleware\React');
Route::get('/pictures/{id}/checkLike',[PictureController::class,'checkLike'])->middleware('App\Http\Middleware\React');
Route::get('/pictures/{id}/handleLike',[PictureController::class,'handleLike'])->middleware('App\Http\Middleware\React');


Route::post('/register',[AuthenticationController::class,'register']);
Route::post('/login',[AuthenticationController::class,'login']);
