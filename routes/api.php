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

//验证码
Route::get('captcha', [CaptchaController::class, 'create']);
//登录注册
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('register/code', [AuthController::class, 'registerCode']);
Route::post('forget', [AuthController::class, 'forget']);
Route::post('forget/code', [AuthController::class, 'forgetCode']);
//验证码
Route::post('code/send', [CodeController::class, 'send']);
//用户相关
Route::get('user/info', [UserController::class, 'info']);
Route::put('user/password', [UserController::class, 'password']);
Route::put('user/mobile', [UserController::class, 'mobile']);
Route::put('user/email', [UserController::class, 'email']);
Route::post('user/code/mobile', [UserController::class, 'mobileCode']);
Route::post('user/code/email', [UserController::class, 'emailCode']);
Route::get('user/module/{user}', [UserController::class, 'module']);
Route::apiResource('user', UserController::class);
//上传
Route::post('upload/local', [UploadController::class, 'local']);
//系统配置
Route::apiResource('system/config', SystemConfigController::class);
//套餐
Route::apiResource('package', PackageController::class);
//会员组
Route::apiResource('group', GroupController::class);;
//站点
Route::post('site/sms/{site}', [SiteController::class, 'sms']);
Route::get('site/module/{site}', [SiteController::class, 'module']);
Route::apiResource('site', SiteController::class);
//模块
Route::apiResource('module', ModuleController::class);
//角色
Route::apiResource('site.role', RoleController::class);
//权限
Route::get('permission/{site}/sync', [PermissionController::class, 'sync']);
Route::put('permission/{site}/{role}', [PermissionController::class, 'update']);
//管理员
Route::put('site/{site}/admin/role/{admin}', [AdminController::class, 'setRole']);
Route::apiResource('site.admin', AdminController::class);
//站点公众号
Route::apiResource('site.wechat', WeChatController::class);
//公众号默认消息
Route::put("site/{site}/wechat/{wechat}/message", [WeChatDefaultController::class, 'update']);
//微信菜单
Route::put('site/{site}/wechat/{wechat}/menu', [WechatMenuController::class, 'update']);
Route::post('site/{site}/wechat/{wechat}/menu', [WechatMenuController::class, 'push']);
//公众号粉丝
Route::get('site/{site}/wechat/{wechat}/user', [WeChatUserController::class, 'sync']);
