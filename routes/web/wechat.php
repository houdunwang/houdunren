<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WeChat\ProcessorController;
use App\Http\Controllers\WeChat\WeChatController;
use App\Http\Controllers\WeChat\DefaultController;
use App\Http\Controllers\WeChat\MenuController;
use App\Http\Controllers\WeChat\UserController;
use App\Http\Controllers\WeChat\RuleController;

//微信服务器通信接口
Route::any('wechat/api/{model}', [ProcessorController::class, 'handle'])->name('wechat.api')->middleware('front');

//站点微信公众号配置
Route::group(['prefix' => 'wechat', 'as' => 'wechat.', 'middleware' => ['auth', 'site']], function () {
    Route::resource('site.wechat',  WeChatController::class)->shallow();
    Route::get('default/{wechat}', [DefaultController::class, 'edit'])->name('default.edit');
    Route::put('default/{wechat}', [DefaultController::class, 'update'])->name('default.update');
    //微信菜单
    Route::get('menu/{wechat}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('menu/{wechat}', [MenuController::class, 'update'])->name('menu.update');
    Route::get('menu/push/{wechat}', [MenuController::class, 'push'])->name('menu.push');
    //粉丝同步
    Route::get('user/sync/{wechat}', [UserController::class, 'sync'])->name('user.sync');
    //微信登录
    Route::get('login/wechat', [WeChatController::class, 'redirectToProvider'])->name('login.wechat');
    Route::get('login/wechat/callback', [WeChatController::class, 'handleProviderCallback'])->name('login.wechat.callback');
});

//微信模块应用
Route::group(['prefix' => 'wechat/module', 'as' => 'wechat.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('rule/wechat', [RuleController::class, 'wechat']);
    Route::resource('rule',  RuleController::class)->only(['show', 'destroy']);
    Route::post('rule/check-keyword', [RuleController::class, 'checkKeyword'])->name('rule.keyword.check');
    Route::post('user/search/{wechat}', [UserController::class, 'search'])->name('user.search');
});
