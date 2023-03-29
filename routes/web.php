<?php

use App\Http\Controllers\WechatLoginController;
use App\Services\ModuleService;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    $url = parse_url(URL::current());
    if (preg_match('/^(admin|auth|member|error)/', trim($url['path'] ?? '', '/'))) {
        return file_get_contents(base_path('vue/dist/index.html'));
    }

    if ($module = app(ModuleService::class)->getModuleByDomain()) {
        return file_get_contents(base_path('Modules/' . $module->name . '/Web/dist/index.html'));
    }
});

//微信客户端登录
Route::get('wechat/appLogin', [WechatLoginController::class, 'appLogin']);
