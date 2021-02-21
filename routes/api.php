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
use App\Api\RoleController;
use App\Api\PermissionController;
use App\Api\AdminController;
use App\Api\WeChatController;
use App\Api\WeChatDefaultController;
use App\Api\WechatMenuController;
use App\Api\WeChatUserController;
use App\Api\CodeController;
use App\Api\ConfigController;

//系统
Route::get('system/config', [SystemConfigController::class, 'show']);
Route::put('system/config', [SystemConfigController::class, 'update'])->middleware(['system']);
//套餐
Route::apiResource('package', PackageController::class)->middleware(['system']);
//会员组
Route::apiResource('group', GroupController::class)->middleware(['system']);
//模块
Route::get('module/site/{site}', [ModuleController::class, 'site']);
Route::get('module/user', [ModuleController::class, 'user']);
Route::get('module/site/{site}/user/{user}', [ModuleController::class, 'siteUserModule']);
Route::apiResource('module', ModuleController::class)->middleware(['system']);
//上传
Route::post('upload/local', [UploadController::class, 'local'])->middleware(['auth:sanctum']);
Route::post('site/{site}/upload', [UploadController::class, 'site'])->middleware(['auth:sanctum']);;
//站点
Route::post('site/{site}/sms', [SiteController::class, 'sms']);
Route::post('site/{site}/email', [SiteController::class, 'email']);
Route::apiResource('site', SiteController::class);
//权限
Route::get('site/{site}/permission/sync', [PermissionController::class, 'sync']);
Route::put('site/{site}/role/{role}/permission', [PermissionController::class, 'update']);
//角色
Route::apiResource('site/{site}/role', RoleController::class);
//管理员
Route::put('site/{site}/admin/{admin}/role', [AdminController::class, 'setRole']);
Route::apiResource('site/{site}/admin', AdminController::class);
//站点公众号
Route::apiResource('site/{site}/wechat', WeChatController::class);
//公众号默认消息
Route::put("site/{site}/wechat/{wechat}/default/message", [WeChatDefaultController::class, 'update']);
//微信菜单
Route::put('site/{site}/wechat/{wechat}/menu', [WechatMenuController::class, 'update']);
Route::post('site/{site}/wechat/{wechat}/menu', [WechatMenuController::class, 'push']);
//公众号粉丝
Route::get('site/{site}/wechat/{wechat}/user/sync', [WeChatUserController::class, 'sync']);
//模块配置
Route::post('site/{site}/module/{module}/config', [ConfigController::class, 'module']);
//图形验证码
Route::get('captcha', [CaptchaController::class, 'make']);
//验证码
Route::post('site/{site}/code/mobile', [CodeController::class, 'mobile'])->middleware(['auth:sanctum', 'module', 'throttle:codeSend']);
Route::post('site/{site}/code/email', [CodeController::class, 'email'])->middleware(['auth:sanctum', 'module', 'throttle:codeSend']);
//用户
Route::get('user/info', [UserController::class, 'info'])->middleware(['auth:sanctum']);
Route::put('user/password', [UserController::class, 'password']);
Route::put('user/{user}', [UserController::class, 'update']);
Route::get('site/{site}/user/search', [UserController::class, 'search']);
Route::get('user', [UserController::class, 'my']);
//登录注册与找回密码
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class, 'register']);
Route::post('register/code', [AuthController::class, 'registerCode']);
Route::post('forget', [AuthController::class, 'forget']);
Route::post('forget/code', [AuthController::class, 'forgetCode']);
//用户相关
Route::put('user/password', [UserController::class, 'password']);
Route::put('user/mobile', [UserController::class, 'mobile']);
Route::put('user/email', [UserController::class, 'email']);
Route::post('user/code/mobile', [UserController::class, 'mobileCode']);
Route::post('user/code/email', [UserController::class, 'emailCode']);
Route::apiResource('user', UserController::class);
//上传
Route::post('upload', [UploadController::class, 'site']);
