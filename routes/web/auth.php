<?php

use App\Http\Controllers\Auth\ForgetController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;

//用户帐号相关
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
Route::get('forget', [AuthController::class, 'forget'])->name('forget');
// Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.', 'middleware' => ['front']], function () {
//     Route::post('login', [LoginController::class, 'login'])->name('login.store');
//     Route::post('register', [RegisterController::class, 'register'])->name('register');
//     Route::post('register/code', [RegisterController::class, 'code'])->name('register.code');
//     Route::get('forget', [ForgetController::class, 'show'])->name('forget');
//     Route::post('forget', [ForgetController::class, 'store'])->name('forget.store');
//     Route::post('forget/code', [ForgetController::class, 'code'])->middleware(['throttle:60,1', 'front'])->name('forget.code');
// });
