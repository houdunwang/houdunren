<?php

use Illuminate\Support\Facades\Route;
use App\Api\AuthController;
use App\Api\UserController;
use App\Api\SiteController;
use App\Api\CaptchaController;
use App\Api\UploadController;
use App\Api\SystemConfigController;
use App\Api\PackageController;
use App\Api\GroupController;
use App\Api\ModuleController;
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
Route::put('user/password', [UserController::class, 'password']);
Route::put('user/mobile', [UserController::class, 'mobile']);
Route::put('user/email', [UserController::class, 'email']);
Route::apiResource('user', UserController::class);
//文件上传
Route::post('upload/local', [UploadController::class, 'local']);
//系统配置
Route::apiResource('system/config', SystemConfigController::class);
//套餐
Route::apiResource('package', PackageController::class);
//会员组
Route::apiResource('group', GroupController::class);
//站点管理
Route::apiResource('site', SiteController::class);
//模块
Route::apiResource('module', ModuleController::class)->only(['index']);
Route::get('module/installed', [ModuleController::class, 'installed']);
Route::post('module/{name}', [ModuleController::class, 'install']);
Route::delete('module/{module:name}', [ModuleController::class, 'uninstall']);
