<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\UserController;
use App\Http\Controllers\Member\AuthController;

//用户帐号相关
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('forget', [AuthController::class, 'forget'])->name('forget');

//会员中心
Route::group(['prefix' => 'member',  'as' => 'member.', 'middleware' => ['auth', 'front']], function () {
    Route::get('/', [UserController::class, 'base'])->name('info.base');
    Route::get('password',  [UserController::class, 'password'])->name('info.password');
    Route::get('avatar',  [UserController::class, 'avatar'])->name('info.avatar');
    Route::get('email',  [UserController::class, 'email'])->name('info.email');
    Route::get('mobile',  [UserController::class, 'mobile'])->name('info.mobile');
});
