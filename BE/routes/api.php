<?php

use App\Http\Controllers\API\UserController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::resource('register', UserController::class);
Route::middleware(['auth:api'])->resource('profile', ProfileController::class);
Route::middleware(['auth:api'])->resource('post', PostController::class);
