<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WechatBindController;
use App\Http\Controllers\WechatController;
use App\Http\Controllers\WechatLoginController;
use Illuminate\Http\Request;
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
    Route::post('removeAllData/{user}', 'removeAllData');
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
Route::get('config/base', [ConfigController::class, 'base']);
Route::get('config/all', [ConfigController::class, 'all']);
Route::put('config', [ConfigController::class, 'update']);
