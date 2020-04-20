<?php

use Illuminate\Support\Facades\Route;

Route::view('login', 'hd')->name('login');
Route::view('{any}', 'hd')->where(
    'any',
    '^(account|register|login|admin|site|system|member).*'
);

//前台
Route::group(['middleware' => ['front'], 'namespace' => 'Front'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');
    //没有匹配路由时最后执行，主要是提升模块路由优先级
    // Route::fallback(function () {
    // return app(HomeController::class)->index();
    // });
});
