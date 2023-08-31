<?php

use App\Http\Controllers\WechatBindController;
use App\Http\Controllers\WechatLoginController;
use Illuminate\Support\Facades\Route;

//微信客户端登录
Route::get('wechat/appLogin', [WechatLoginController::class, 'appLogin']);

//获取当前登录用户在微信app的openid，用于支付或在app中绑定微信使用
Route::get('wechat/openid', [WechatBindController::class, 'openid']);
Route::get('wechat/app/bind', [WechatBindController::class, 'wechatAppBind']);

Route::fallback(function () {
    return file_get_contents(base_path('dist/index.html'));
});

Route::get('a', function () {
    session(['a' => 'aaaaaaaaaaaa']);
    return session()->all();
});
