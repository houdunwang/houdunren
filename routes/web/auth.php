<?php

use App\Http\Controllers\Auth\ForgetController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

//用户帐号相关
Route::get('login', [LoginController::class, 'show'])->name('login');
Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.', 'middleware' => ['front']], function () {
    Route::post('login', [LoginController::class, 'login'])->name('login.store');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('register', [RegisterController::class, 'show'])->name('register.store');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register/code', [RegisterController::class, 'code'])->middleware(['throttle:60,1', 'front'])->name('register.code');
    Route::get('forget', [ForgetController::class, 'show'])->name('forget.show');
    Route::post('forget', [ForgetController::class, 'store'])->name('forget.store');
    Route::post('forget/code', [ForgetController::class, 'code'])->middleware(['throttle:60,1', 'front'])->name('forget.code');
});
