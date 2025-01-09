<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;


Route::group(['prefix' => 'auth'], function(){
    Route::post('/register', RegisterController::class)->middleware('guest');
    Route::post('/login', LoginController::class)->middleware('guest');
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');

    // Route::get('/user', [LoginController::class, 'index']);
});




