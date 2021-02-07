<?php

use Illuminate\Support\Facades\Route;

//模块前台
Route::get('/', function () {
    $name = module()['name'];
    $class  = "Modules\\{$name}\Http\Controllers\Front\HomeController";
    return app($class)->index(site(), module());
})->middleware(['module']);

//登录注册
Route::get('{app}/{path?}', function () {
    return view('app');
})->where('app', 'login|register|forget|member')->where('path', '.*')->middleware('module');

//系统业务
Route::fallback(function () {
    return view('app');
});
