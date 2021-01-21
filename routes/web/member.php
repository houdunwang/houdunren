<?php

use App\Http\Controllers\Member\AvatarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\UserController;
use App\Http\Controllers\Member\EmailController;
use App\Http\Controllers\Member\MobileController;
use App\Http\Controllers\Member\PasswordController;
use App\Http\Controllers\Member\HomeController;

//会员中心
Route::group(['prefix' => 'member',  'as' => 'member.', 'middleware' => ['auth', 'front']], function () {
    Route::get('/', [UserController::class, 'base'])->name('info.base');
    Route::get('password',  [UserController::class, 'password'])->name('info.password');
    Route::get('avatar',  [UserController::class, 'avatar'])->name('info.avatar');
    Route::get('email',  [UserController::class, 'email'])->name('info.email');
    Route::get('mobile',  [UserController::class, 'mobile'])->name('info.mobile');

    // Route::resource('avatar',  AvatarController::class)->only(['index', 'store']);
    // Route::post('avatar/upload', [AvatarController::class, 'upload'])->name('avatar.upload');
    // Route::resource('email',  EmailController::class)->only(['index', 'store']);
    // Route::post('email/code', [EmailController::class, 'code'])->middleware(['throttle:1:1'])->name('email.code');
    // Route::resource('mobile',  MobileController::class)->only(['index', 'store']);
    // Route::post('mobile/code', [MobileController::class, 'code'])->middleware(['throttle:1:1'])->name('mobile.code');
});
