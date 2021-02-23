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
use App\Api\ModuleConfigController;
use App\Models\ModuleConfig;

//登录注册与找回密码
Route::post('login', [AuthController::class, 'login']);
Route::post('site/{site}/register', [AuthController::class, 'register']);
Route::post('site/{site}/register/code', [AuthController::class, 'registerCode']);
Route::post('site/{site}/forget', [AuthController::class, 'forget']);
Route::post('site/{site}/forget/code', [AuthController::class, 'forgetCode']);
Route::get('logout', [AuthController::class, 'logout']);
//用户
Route::get('user/info', [UserController::class, 'info']);
Route::get('site/{site}/user/search/{keyword?}', [UserController::class, 'search']);
//用户资料修改
Route::put('site/{site}/user/mobile', [UserController::class, 'mobile']);
Route::put('site/{site}/user/email', [UserController::class, 'email']);
Route::put('user/password', [UserController::class, 'password']);
Route::apiResource('user', UserController::class);
//验证码
Route::post('site/{site}/code/mobile', [CodeController::class, 'mobile']);
Route::post('site/{site}/code/mobile/exist', [CodeController::class, 'existMobile']);
Route::post('site/{site}/code/mobile/noexist', [CodeController::class, 'noExistMobile']);
Route::post('site/{site}/code/email', [CodeController::class, 'email']);
Route::post('site/{site}/code/email/exist', [CodeController::class, 'existEmail']);
Route::post('site/{site}/code/email/noexist', [CodeController::class, 'noExistEmail']);
//系统配置
Route::get('system/config', [SystemConfigController::class, 'show']);
Route::put('system/config', [SystemConfigController::class, 'update']);
//套餐
Route::apiResource('package', PackageController::class);
//会员组
Route::apiResource('group', GroupController::class);
//模块
Route::get('module/site/{site}', [ModuleController::class, 'site']);
Route::get('module/site/{site}/user', [ModuleController::class, 'userSiteModule']);
Route::get('module/user', [ModuleController::class, 'user']);
Route::get('module', [ModuleController::class, 'index']);
Route::get('module/installed', [ModuleController::class, 'installed']);
Route::get('module/install/{name}', [ModuleController::class, 'install']);
Route::delete('module/uninstall/{module:name}', [ModuleController::class, 'uninstall']);
//模块配置
Route::get('module/config/site/{site}/module/{module}', [ModuleConfigController::class, 'show']);
Route::put('module/config/site/{site}/module/{module}', [ModuleConfigController::class, 'update']);
//站点
Route::get('site/current', [SiteController::class, 'current']);
Route::apiResource('site', SiteController::class);
//权限
Route::get('site/{site}/permission/sync', [PermissionController::class, 'sync']);
Route::put('site/{site}/role/{role}/permission', [PermissionController::class, 'update']);
//角色
Route::apiResource('site/{site}/role', RoleController::class);
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
Route::post('upload/local', [UploadController::class, 'local']);
Route::post('upload/site/{site}', [UploadController::class, 'site']);
//图形验证码
Route::get('captcha', [CaptchaController::class, 'make']);
