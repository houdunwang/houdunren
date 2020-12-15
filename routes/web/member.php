<?php

use App\Http\Controllers\Member\AvatarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\BaseController;
use App\Http\Controllers\Member\EmailController;
use App\Http\Controllers\Member\MobileController;
use App\Http\Controllers\Member\PasswordController;

//会员中心
Route::group(['prefix' => 'member',  'as' => 'member.', 'middleware' => ['auth', 'front']], function () {
    Route::get('/', [BaseController::class, 'index'])->name('home');
    Route::resource('base', BaseController::class)->only(['index', 'store']);
    Route::resource('password',  PasswordController::class)->only(['index', 'store']);
    Route::resource('avatar',  AvatarController::class)->only(['index', 'store']);
    Route::post('avatar/upload', [AvatarController::class, 'upload'])->name('avatar.upload');
    Route::resource('email',  EmailController::class)->only(['index', 'store']);
    Route::post('email/code', [EmailController::class, 'code'])->middleware(['throttle:1:1'])->name('email.code');
    Route::resource('mobile',  MobileController::class)->only(['index', 'store']);
    Route::post('mobile/code', [MobileController::class, 'code'])->middleware(['throttle:1:1'])->name('mobile.code');
});
