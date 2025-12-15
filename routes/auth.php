<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/* Login Routes */
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');

/* Register Routes */
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerUser'])->name('registerUser');

/* Forget Password */
Route::view("/forgot-password","auth.forgot-password")->middleware("guest")->name("password.request");
Route::post("password/email",[AuthController::class,'handleSubmitForgetRequest'])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password',[AuthController::class,'resetPassword'])->middleware('guest')->name('password.update');

/* Logout Route */
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
