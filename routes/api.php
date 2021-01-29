<?php

use Illuminate\Support\Facades\Route;
use App\Api\AuthController;
use App\Api\UserController;
use App\Api\SiteController;
use App\Api\CaptchaController;
use App\Api\UploadController;

//验证码
Route::get('captcha', [CaptchaController::class, 'create']);
//登录注册
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('register/code', [AuthController::class, 'registerCode']);
Route::post('forget', [AuthController::class, 'forget']);
Route::post('forget/code', [AuthController::class, 'forgetCode']);
//用户相关
Route::get('user/info', [UserController::class, 'info']);
Route::put('user/base', [UserController::class, 'base']);
Route::put('user/password', [UserController::class, 'password']);
Route::put('user/avatar', [UserController::class, 'avatar']);
Route::put('user/mobile', [UserController::class, 'mobile']);
Route::put('user/email', [UserController::class, 'email']);
Route::apiResource('user', UserController::class);
//文件上传
Route::post('upload/local', [UploadController::class, 'local']);
//站点管理
Route::apiResource('site', SiteController::class);
