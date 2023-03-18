<?php

use App\Http\Controllers\WechatLoginController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return file_get_contents(base_path('./vue/dist/index.html'));
});

//微信客户端登录
Route::get('wechat/appLogin', [WechatLoginController::class, 'appLogin']);
