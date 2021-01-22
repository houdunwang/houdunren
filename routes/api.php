<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Api\User\AuthController;
use App\Api\User\InfoController;
use App\Api\Common\CodeController;

//验证码
Route::group(['prefix' => 'common', 'as' => 'common.', 'middleware' => ['front', 'throttle:sendCode']], function () {
    //验证码
    Route::post('code/send', [CodeController::class, 'send']);
    Route::post('code/accountExist', [CodeController::class, 'accountExist']);
    Route::post('code/mobile', [CodeController::class, 'mobile']);;
    Route::post('code/email', [CodeController::class, 'email']);
    Route::post('code/noExistMobile', [CodeController::class, 'noExistMobile']);;
    Route::post('code/noExistEmail', [CodeController::class, 'noExistEmail']);
});

//登录注册
Route::group(['middleware' => ['front'], 'prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('forget', [AuthController::class, 'forget']);
});

//用户相关
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'user', 'middleware' => ['front']], function () {
    Route::get('my', [InfoController::class, 'get']);
    Route::put('base', [InfoController::class, 'base']);
    Route::put('password', [InfoController::class, 'password']);
    Route::put('avatar', [InfoController::class, 'avatar']);
    Route::put('mobile', [InfoController::class, 'mobile']);
    Route::put('email', [InfoController::class, 'email']);
});
