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
use App\Api\SiteConfigController;
use App\Api\RoleController;
use App\Api\PermissionController;
use App\Api\AdminController;
use App\Api\WeChatController;

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
//站点模块
Route::get('site/modules/{site}', [SiteController::class, 'modules']);
//站点管理
Route::apiResource('site', SiteController::class);
//模块
Route::apiResource('module', ModuleController::class)->only(['index']);
Route::get('module/installed', [ModuleController::class, 'installed']);
Route::post('module/{name}', [ModuleController::class, 'install']);
Route::delete('module/{module:name}', [ModuleController::class, 'uninstall']);
//站点配置
Route::apiResource('config/site', SiteConfigController::class)->only(['show', 'update']);
//站点角色
Route::apiResource('{site}/role', RoleController::class);
//权限管理
Route::get('{site}/permission/sync', [PermissionController::class, 'syncSitePermissions']);
Route::put('{site}/permission/{role}', [PermissionController::class, 'update']);
//管理员
Route::put('{site}/admin_role/{admin}', [AdminController::class, 'setRole']);
Route::apiResource('{site}/admin', AdminController::class);
//站点公众号
Route::apiResource('{site}/wechat', WeChatController::class);
