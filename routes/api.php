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
Route::apiResource('user', UserController::class);
//文件上传
Route::post('upload/local', [UploadController::class, 'local']);
//系统配置
Route::apiResource('system/config', SystemConfigController::class);
//套餐
Route::apiResource('package', PackageController::class);
//会员组
Route::apiResource('group', GroupController::class);;
//站点管理
Route::get('site/bydomain', [SiteController::class, 'getByDomain']);
Route::apiResource('site', SiteController::class);
//模块
Route::get('module/installed', [ModuleController::class, 'installed']);
Route::post('module/{name}', [ModuleController::class, 'install']);
Route::delete('module/{module:name}', [ModuleController::class, 'uninstall']);
Route::apiResource('module', ModuleController::class)->only(['index']);
Route::get('module/user/{user}', [ModuleController::class, 'user']);
//站点模块
Route::get('module/site/{site}', [ModuleController::class, 'site']);
//站点配置
Route::post('config/sms/{site}', [SiteConfigController::class, 'sms']);
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
//公众号默认消息
Route::put("{site}/wechat_default/{wechat}", [WeChatDefaultController::class, 'update']);
//微信菜单
Route::put('{site}/wechat_menu/{wechat}', [WechatMenuController::class, 'update']);
Route::put('{site}/wechat_menu/{wechat}/push', [WechatMenuController::class, 'push']);
//公众号粉丝
Route::get('{site}/wechat_user/{wechat}/sync', [WeChatUserController::class, 'sync']);
