<?php

use App\Http\Controllers\PayNotifyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WeChatLoginController;
use App\Http\Controllers\WeChatBindController;

//支付通知
Route::group(['prefix' => 'pay/{module}', 'middleware' => ['module']], function () {
    Route::any('alipay/return', [PayNotifyController::class, 'alipayReturn'])->name('pay.alipay.return');
    Route::any('alipay/notify', [PayNotifyController::class, 'alipayNotify'])->name('pay.alipay.notify');
});

//微信登录
Route::group(['prefix' => 'wechat'], function () {
    Route::get('login', [WeChatLoginController::class, 'login']);
    Route::get('login/callback', [WeChatLoginController::class, 'loginCallback'])->name('wechat.login.callback');
    //绑定微信
    Route::get('bind', [WeChatBindController::class, 'bind']);
    Route::get('bind/callback', [WeChatBindController::class, 'bindCallback'])->name('wechat.bind.callback');
});

//退出登录
Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});

//网站主页
Route::get('/', function () {
    $name = module()['name'];
    $class  = "Modules\\{$name}\Http\Controllers\HomeController";
    return app($class)->index();
})->middleware(['module']);

//会员中心
Route::get('{app}/{path?}', function () {
    return view('app');
})->where('app', "(member|login|register|forget)")->where('path', '(.*?)')->middleware(['module']);

//后备路由
Route::fallback(function () {
    return view('app');
});
