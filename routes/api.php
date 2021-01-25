<?php

use Illuminate\Support\Facades\Route;
use App\Api\AuthController;
use App\Api\InfoController;
use App\Api\SiteController;
//验证码
Route::group(['middleware' => ['front']], function () {
    //登录注册
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('register/code', [AuthController::class, 'registerCode']);
    Route::post('forget', [AuthController::class, 'forget']);
    Route::post('forget/code', [AuthController::class, 'forgetCode']);
    //网站站点
    Route::get('site/self', [SiteController::class, 'self']);
    Route::apiResource('/site', SiteController::class);
    //用户资料
    Route::get('/info', [InfoController::class, 'get']);
    Route::put('/info/base', [InfoController::class, 'base']);
    Route::put('/info/password', [InfoController::class, 'password']);
    Route::put('/info/avatar', [InfoController::class, 'avatar']);
    Route::put('/info/mobile', [InfoController::class, 'mobile']);
    Route::put('/info/email', [InfoController::class, 'email']);
});
