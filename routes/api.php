<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AlipayController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FavourController;
use App\Http\Controllers\ModuleConfigController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WechatBindController;
use App\Http\Controllers\WechatController;
use App\Http\Controllers\WechatLoginController;
use App\Http\Controllers\WepayController;
use App\Models\ModuleConfig;
use Illuminate\Support\Facades\Route;

//登录注册
Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('forgot-password', 'forgotPassword');
});

//发送验证码
Route::controller(CodeController::class)->prefix('code')->group(function () {
    Route::post('exists', 'exists');
    Route::post('no-exists', 'noExists');
});

//用户相关
Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('current', 'current');
    Route::put('update', 'update');
    Route::put('password', 'password');
    Route::put('email', 'email');
    Route::put('mobile', 'mobile');
    Route::delete('delete', 'delete');
    Route::delete('remove_avatar/{user}', 'removeAvatar');
    Route::post('lock_user/{user}', 'lockUser');
    Route::get('info/{user}', 'info');
});
Route::apiResource('user', UserController::class);

//上传处理
Route::controller(UploadController::class)->prefix("upload")->group(function () {
    Route::post('image', 'image');
    Route::post('avatar', 'avatar');
});

//微信公众号通知
Route::any('wechat', [WechatController::class, 'handle']);

//微信登录
Route::post('wechat/sancLogin/{ticket}', [WechatLoginController::class, 'sancLogin']);
Route::post('wechat/scanloginQr', [WechatLoginController::class, 'scanloginQr']);
Route::get('wechat/scanLoginQrImage/{ticket}', [WechatLoginController::class, 'scanLoginQrImage']);

//微信绑定
Route::post('wechat/bind/{ticket?}', [WechatBindController::class, 'bind']);
Route::post('wechat/unbind/{ticket?}', [WechatBindController::class, 'unbind']);

//配置
Route::get('config/all', [ConfigController::class, 'all']);
Route::put('config', [ConfigController::class, 'update']);

//收藏资源
Route::controller(FavoriteController::class)->prefix('favorite')->group(function () {
    Route::get('userFavoriteList/{module}/{model}/{user}', 'getUserFavoriteList');
    Route::post('{module}/{model}/{id}', 'toggleFavorite');
    Route::get('{module}/{model}/{id}', 'modelFavoriteInfo');
});

//点赞操作
Route::controller(FavourController::class)->prefix('favour')->group(function () {
    Route::post('{module}/{model}/{id}', 'make');
    Route::get('{module}/{model}/{id}', 'show');
});

//评论
Route::apiResource('comment', CommentController::class);

//全站动态
Route::apiResource('activity', ActivityController::class);

//站内通知
Route::apiResource('notification', NotificationController::class);

//支付宝
Route::controller(AlipayController::class)->prefix("alipay")->group(function () {
    Route::get('pay/{order}', 'pay');
    Route::get('return', 'returnUrl');
    Route::any('notify', 'notifyUrl');
});

//微信支付
Route::controller(WepayController::class)->prefix("wepay")->group(function () {
    Route::post('pay/{order}', 'pay');
    Route::get('app_pay', 'appPay');
    Route::post('app/{order}', 'app');
    Route::any('notify', 'notifyUrl');
});

Route::get('module/install/{name}', [ModuleController::class, 'install']);
Route::delete('module/unInstall/{module:name}', [ModuleController::class, 'unInstall']);
Route::apiResource('module', ModuleController::class);

//模块配置
Route::get('module_config/all/{name}', [ModuleConfigController::class, 'all']);
Route::get('module_config/common/{name}', [ModuleConfigController::class, 'common']);
Route::put('module_config/{name}', [ModuleConfigController::class, 'update']);
