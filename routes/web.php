<?php

use Illuminate\Support\Facades\Route;

//网站主页
Route::get('/', function () {
    $name = module()['name'];
    $class  = "Modules\\{$name}\Http\Controllers\HomeController";
    return app($class)->index();
})->middleware(['module']);

Route::get('member/{path?}', function () {
    return view('app');
})->where('path', '(.*)')->middleware(['module']);

//后备路由
Route::fallback(function () {
    return view('app');
});
