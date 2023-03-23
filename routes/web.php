<?php

use App\Http\Controllers\WechatLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::fallback(function () {
    $url = parse_url(URL::current());
    if (isset($url['path']) && preg_match('/^(hd|auth|detail|login|register|forgot_password)/', trim($url['path'], '/'))) {
        return file_get_contents(base_path('vue/dist/index.html'));
    }
    return file_get_contents(base_path('Modules/Edu/Web/dist/index.html'));
});

//微信客户端登录
Route::get('wechat/appLogin', [WechatLoginController::class, 'appLogin']);
