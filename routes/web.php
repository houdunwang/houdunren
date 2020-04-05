<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

// Route::group(['namespace' => 'Common', 'prefix' => 'common'], function () {
//   Route::get('captcha', 'CaptchaController@make')->name('common.captcha');
//   Route::post('upload/avatar', 'UploadController@avatar')->middleware('auth');
//   Route::post('upload/{site?}', 'UploadController@store')->middleware('auth');
// });
// Route::view('{any}', 'hd')->where('any', "login|register");
Route::view('{any}', 'hd')->where(
    'any',
    '^(login|logout|register|admin|site|system|member).*'
);

// Route::group(['namespace' => 'Member'], function () {
//     Route::get('login', 'AccountController@show')->name('login');
//     Route::post('login', 'AccountController@login')->name('login');
//     Route::get('logout', 'AccountController@logout')->name('logout');
//     Route::get('register', 'AccountController@register')->name('register');
//     Route::post('register', 'AccountController@store')->name('register');
// });

// Route::view('user{any}', 'account')->where('any', '.*');
// Route::view('member{any}', 'member/index')->where('any', '.*')->middleware(['front']);
// Route::view('site{any}', 'layouts/system')->where('any', '.*')->middleware('auth');
// Route::view('system{any}', 'layouts/system')->where('any', '.*')->middleware('auth');
// Route::view('admin', 'layouts/system')->where('any', '.*')->middleware('auth');

//前台
Route::group(['middleware' => ['front'], 'namespace' => 'Front'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');
    //没有匹配路由时最后执行，主要是提升模块路由优先级
    Route::fallback(function () {
        return app(HomeController::class)->index();
    });
});
