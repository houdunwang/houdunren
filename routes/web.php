<?php

use Illuminate\Support\Facades\Route;
use App\Models\Module;
use App\Models\Site;

//模块后台
Route::get("module/admin/{site}/{module}", function (Site $site, Module $module) {
    session(['sid' => $site['id'], 'mid' => $module['id']]);
    return redirect("/admin");
})->middleware('auth:sanctum');
//后台登录
Route::get('system', function () {
    if (Auth::check()) return redirect('/site/site/index');
    return view('app');
});
//登录注册
Route::get('{app}/{path?}', fn () => view('app'))->where('app', 'login|register|forget')->middleware(['front', 'guest']);
//会员中心
Route::get('member/{path?}', fn () => view('app'))->where('path', '.*')->middleware(['auth:sanctum', 'front']);
//站点管理
Route::get('site/{path?}', fn () => view('app'))->where('path', '.*')->middleware(['auth:sanctum']);
//系统管理
Route::get('system/{path?}', fn () => view('app'))->where('path', '.*')->middleware(['auth:sanctum', 'system']);




//模块主页
Route::get('/', function () {
    $name = module()['name'];
    $class  = "Modules\\{$name}\Http\Controllers\Front\HomeController";
    return app($class)->index();
})->middleware(['front']);
//模块前台
Route::fallback(function () {
    $name = strtolower(module()['name']);
    return view("{$name}::front");
})->middleware(['front']);
//模块后台
Route::any('admin/{path?}', function () {
    $name = strtolower(module()['name']);
    return view("{$name}::admin");
})->where('path', '.*')->middleware(['admin']);
