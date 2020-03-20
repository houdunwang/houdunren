<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;
use Modules\Edu\Entities\Video;

Route::group(['namespace' => 'Common', 'prefix' => 'common'], function () {
  Route::get('captcha', 'CaptchaController@make')->name('common.captcha');
  Route::post('upload/avatar', 'UploadController@avatar')->middleware('auth');
  Route::post('upload/{site?}', 'UploadController@store')->middleware('auth');
});

Route::group(['namespace' => 'Member'], function () {
  Route::get('login', 'LoginController@show')->name('login');
  Route::post('login', 'LoginController@login')->name('login');
  Route::get('logout', 'LoginController@logout')->name('logout');
  Route::get('register', 'LoginController@register')->name('register');
  Route::post('register', 'LoginController@store')->name('register');
  Route::resource('mobile', 'MobileController');
});

Route::view('member{any}', 'member/index')->where('any', '.*')->middleware(['auth', 'member']);
Route::view('site{any}', 'main')->where('any', '.*')->middleware('auth');
Route::view('system{any}', 'main')->where('any', '.*')->middleware('auth');
Route::view('admin', 'main')->where('any', '.*')->middleware('auth');

//前台
Route::group(['middleware' => ['front'], 'namespace' => 'Front'], function () {
  Route::get('/', 'HomeController@index');
  Route::get('home', 'HomeController@index');
  //没有匹配路由时最后执行，主要是提升模块路由优先级
  Route::fallback(function () {
    return app(HomeController::class)->index();
  });
});
