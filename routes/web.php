<?php

use Illuminate\Support\Facades\Route;
use App\Models\Module;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;

//模块前台
Route::get('/', function () {
    $name = module()['name'];
    $class  = "Modules\\{$name}\Http\Controllers\Front\HomeController";
    return app($class)->index();
})->middleware(['front']);

//模块后台
Route::get("admin/{site}/{module}", function (Site $site, Module $module) {
    session(['sid' => $site['id'], 'mid' => $module['id']]);
    return redirect("/{$module['name']}/admin");
})->middleware('auth:sanctum');

//登录注册
Route::get('{app}/{path?}', fn () => view('app'))->where('app', 'login|register|forget')->middleware(['front', 'guest']);
//后台登录
Route::get('admin', function () {
    if (Auth::check()) {
        return redirect('/site/site/index');
    }
    return view('app');
});
//会员中心
Route::get('member/{path?}', fn () => view('app'))->where('path', '.*')->middleware(['auth:sanctum', 'front']);
//系统管理
Route::get('system/{path?}', fn () => view('app'))->where('path', '.*')->middleware(['auth:sanctum', 'system']);
//后备路由
Route::fallback(fn () => view('app'));
