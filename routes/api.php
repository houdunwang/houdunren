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
Route::group(['prefix' => 'system', 'middleware' => ['auth:sanctum', 'system']], function () {
    //系统配置
    Route::apiResource('config', SystemConfigController::class);
    //套餐
    Route::apiResource('package', PackageController::class);
    //会员组
    Route::apiResource('group', GroupController::class);
    //模块
    Route::apiResource('module', ModuleController::class);
});

//站点
Route::group(['prefix' => 'site', 'middleware' => ['auth:sanctum', 'site']], function () {
    //站点
    Route::post('{site}/sms', [SiteController::class, 'sms']);
    Route::apiResource('site', SiteController::class);
    //用户搜索
    Route::get('{site}/user', [UserController::class, 'search']);
    //模块
    Route::get('{site}/modules', [ModuleController::class, 'site']);
    Route::get('{site}/user/modules', [ModuleController::class, 'site']);
    //角色
    Route::apiResource('{site}/role', RoleController::class);
    //权限
    Route::get('permission/{site}/sync', [PermissionController::class, 'sync']);
    Route::put('permission/{site}/{role}', [PermissionController::class, 'update']);
    //管理员
    Route::put('{site}/admin/role/{admin}', [AdminController::class, 'setRole']);
    Route::apiResource('{site}/admin', AdminController::class);
    //站点公众号
    Route::apiResource('{site}/wechat', WeChatController::class);
    //公众号默认消息
    Route::put("{site}/wechat/{wechat}/message", [WeChatDefaultController::class, 'update']);
    //微信菜单
    Route::put('{site}/wechat/{wechat}/menu', [WechatMenuController::class, 'update']);
    Route::post('{site}/wechat/{wechat}/menu', [WechatMenuController::class, 'push']);
    //公众号粉丝
    Route::get('{site}/wechat/{wechat}/user', [WeChatUserController::class, 'sync']);
});

//会员中心
Route::group(['prefix' => 'member', 'middleware' => ['auth:sanctum', 'front']], function () {
    //模块
    Route::get('modules', [ModuleController::class, 'group']);
    //用户相关
    Route::put('user/password', [UserController::class, 'password']);
    Route::put('user/mobile', [UserController::class, 'mobile']);
    Route::put('user/email', [UserController::class, 'email']);
    Route::post('user/code/mobile', [UserController::class, 'mobileCode']);
    Route::post('user/code/email', [UserController::class, 'emailCode']);
    Route::apiResource('user', UserController::class);
    //上传
    Route::post('upload', [UploadController::class, 'site']);
});

//模块后台
Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'admin']], function () {
    //配置
    Route::post('config/module', [ConfigController::class, 'module']);
    //上传
    Route::post('upload', [UploadController::class, 'site']);
});

//前台
Route::group(['prefix' => 'front', 'middleware' => ['front']], function () {
    //上传
    Route::post('upload', [UploadController::class, 'site']);
    //验证码
    Route::post('code/send', [CodeController::class, 'send'])->middleware(['throttle:codeSend']);
    //图形验证码
    Route::get('captcha', [CaptchaController::class, 'create']);
    //登录注册
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('register/code', [AuthController::class, 'registerCode']);
    Route::post('forget', [AuthController::class, 'forget']);
    Route::post('forget/code', [AuthController::class, 'forgetCode']);
});
