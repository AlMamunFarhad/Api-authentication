<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\PasswordResetController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\VerifyEmailController;

Route::group(['prefix' => 'auth'], function(){
    Route::post('/register', RegisterController::class)->middleware('guest');
    Route::post('/login', LoginController::class)->middleware('guest');
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');
    
    Route::post('/password/email', [PasswordResetController::class, 'sendResetLink'])->middleware('guest');
    Route::post('/password/reset', [PasswordResetController::class, 'reset'])->name('password.reset')->middleware('signed');
    Route::post('/email/verification/send', [VerifyEmailController::class, 'sendMail'])->middleware('auth:sanctum');
    Route::post('/email/verify', [VerifyEmailController::class, 'verify'])->name('email-verify')->middleware(['auth:sanctum', 'signed']);
});




