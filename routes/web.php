<?php

use App\Http\Controllers\WechatLoginController;
use App\Services\ModuleService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

//微信客户端登录
Route::get('wechat/appLogin', [WechatLoginController::class, 'appLogin']);

Route::fallback(function () {
    if (preg_match('/^(admin|auth|member|error)/', Request::path())) {
        return file_get_contents(base_path('vue/dist/index.html'));
    }

    if ($module = app(ModuleService::class)->getModuleByDomain()) {
        return file_get_contents(base_path('Modules/' . $module->name . '/Web/dist/index.html'));
    }

    return redirect('/admin');
});
