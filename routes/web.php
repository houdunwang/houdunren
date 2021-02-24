<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('a', function () {
    dd(\Auth::user());
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

//后备路由
Route::fallback(function () {
    return view('app');
});
