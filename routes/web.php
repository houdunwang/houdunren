<?php

use Illuminate\Support\Facades\Route;
use App\Models\Module;
use App\Models\Site;

//模块前台
Route::get('/', function () {
    $name = module()['name'];
    $class  = "Modules\\{$name}\Http\Controllers\Front\HomeController";
    return app($class)->index();
})->middleware(['module']);

//模块后台
Route::get("admin/{site}/{module}", function (Site $site, Module $module) {
    session(['sid' => $site['id'], 'mid' => $module['id']]);
    return redirect("/{$module['name']}/admin");
})->middleware('auth:sanctum');

//登录注册
Route::get('{app}/{path?}', function () {
    return view('app', ['site' => site(), 'module' => module()]);
})->where('app', 'login|register|forget|member')->where('path', '.*')->middleware('module');

//系统业务
Route::fallback(function () {
    return view('app');
});
