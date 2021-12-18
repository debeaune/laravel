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

Route::get('/pictures',[PictureController::class,'index']);
Route::get('/pictures/{id}',[PictureController::class,'show']);
Route::post('/pictures',[PictureController::class,'store'])->middleware('App\Http\Middleware\React');
Route::post('/register',[AuthenticationController::class,'register']);
Route::post('/login',[AuthenticationController::class,'login']);
