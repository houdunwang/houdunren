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

//登录注册与找回密码
Route::post('login', [AuthController::class, 'login']);
Route::post('site/{site}/register', [AuthController::class, 'register']);
Route::post('site/{site}/register/code', [AuthController::class, 'registerCode']);
Route::post('site/{site}/forget', [AuthController::class, 'forget']);
Route::post('site/{site}/forget/code', [AuthController::class, 'forgetCode']);
Route::get('logout', [AuthController::class, 'logout']);
//用户
Route::get('user/info', [UserController::class, 'info'])->middleware(['auth:sanctum']);
Route::get('site/{site}/user/search/{keyword?}', [UserController::class, 'search']);
//用户资料修改
Route::put('site/{site}/user/mobile', [UserController::class, 'mobile']);
Route::put('site/{site}/user/email', [UserController::class, 'email']);
Route::put('user/password', [UserController::class, 'password']);
Route::apiResource('user', UserController::class);
//验证码
Route::post('site/{site}/code/mobile', [CodeController::class, 'mobile'])->middleware(['auth:sanctum', 'site']);
Route::post('site/{site}/code/email', [CodeController::class, 'email'])->middleware(['auth:sanctum', 'site']);
Route::post('site/{site}/code/mobile/noexist', [CodeController::class, 'noExistMobile'])->middleware(['site']);
Route::post('site/{site}/code/email/noexist', [CodeController::class, 'emailNoExist'])->middleware(['site']);
//系统配置
Route::get('system/config', [SystemConfigController::class, 'show']);
Route::put('system/config', [SystemConfigController::class, 'update']);
//套餐
Route::apiResource('package', PackageController::class)->middleware(['system']);
//会员组
Route::apiResource('group', GroupController::class)->middleware(['system']);
//模块
Route::get('module/site/{site}', [ModuleController::class, 'site'])->middleware(['auth:sanctum', 'site']);
Route::get('module/site/{site}/user', [ModuleController::class, 'userSiteModule']);
Route::get('module/user', [ModuleController::class, 'user']);
Route::get('module', [ModuleController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('module/installed', [ModuleController::class, 'installed'])->middleware(['auth:sanctum']);
Route::get('module/install/{name}', [ModuleController::class, 'install'])->middleware(['auth:sanctum', 'system']);
Route::delete('module/uninstall/{module:name}', [ModuleController::class, 'uninstall'])->middleware(['auth:sanctum', 'system']);
//模块配置
Route::post('site/{site}/module/{module}/config', [ConfigController::class, 'module']);
//站点
Route::apiResource('site', SiteController::class);
//权限
Route::get('site/{site}/permission/sync', [PermissionController::class, 'sync']);
Route::put('site/{site}/role/{role}/permission', [PermissionController::class, 'update']);
//角色
Route::apiResource('site/{site}/role', RoleController::class)->middleware(['auth:sanctum']);
//管理员
Route::put('site/{site}/admin/{admin}/role', [AdminController::class, 'setRole']);
Route::put('site/{site}/admin/{admin}', [AdminController::class, 'update']);
Route::apiResource('site/{site}/admin', AdminController::class);
//站点公众号
Route::apiResource('site/{site}/wechat', WeChatController::class);
//公众号默认消息
Route::put("site/{site}/wechat/{wechat}/default/message", [WeChatDefaultController::class, 'update']);
//微信菜单
Route::put('site/{site}/wechat/{wechat}/menu', [WechatMenuController::class, 'update']);
Route::get('site/{site}/wechat/{wechat}/menu/push', [WechatMenuController::class, 'push']);
//公众号粉丝
Route::get('site/{site}/wechat/{wechat}/user', [WeChatUserController::class, 'index']);
Route::get('site/{site}/wechat/{wechat}/user/sync', [WeChatUserController::class, 'sync']);
//上传
Route::post('upload/local', [UploadController::class, 'local'])->middleware(['auth:sanctum']);
Route::post('upload/site/{site}', [UploadController::class, 'site'])->middleware(['auth:sanctum', 'site']);;
//图形验证码
Route::get('captcha', [CaptchaController::class, 'make']);
