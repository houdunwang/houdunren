<?php

use Illuminate\Support\Facades\Route;
use App\Models\Module;
use App\Models\Site;

//登录注册
Route::get('{app}/{path?}', function () {
    return  view('app');
})->where('app', 'login|register|forget')->middleware(['front', 'guest']);
//后台登录
Route::get('admin', function () {
    return  view('app');
});
//会员中心
Route::get('member/{path?}', function () {
    return  view('app');
})->where('path', '.*')->middleware(['auth:sanctum', 'front']);;
//站点管理
Route::get('site/{path?}', function () {
    return  view('app');
})->where('path', '.*')->middleware(['auth:sanctum']);
//系统管理
Route::get('system/{path?}', function () {
    return  view('app');
})->where('path', '.*')->middleware(['auth:sanctum', 'system']);

//模块后台缓存站点
Route::get("module/admin/{site}/{module}", function (Site $site, Module $module) {
    session(['sid' => $site['id'], 'mid' => $module['id']]);
    return redirect("/{$module['name']}/admin");
})->middleware('auth:sanctum');

//网站主页
Route::get('/', function () {
    $name = module()['name'];
    $class  = "Modules\\{$name}\Http\Controllers\HomeController";
    return app($class)->index();
})->middleware(['front']);
