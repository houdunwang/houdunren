<?php

use Illuminate\Support\Facades\Route;
//前台
Route::group(['middleware' => ['front', 'bindMobile'], 'namespace' => 'Home'], function () {
  Route::get('/', 'IndexController@home');
  Route::get('home', 'IndexController@home');
});

//公共
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

// Route::view('admin{any}', 'admin')->where('any', '.*')->middleware('auth');
// Route::view('site{any}', 'admin')->where('any', '.*')->middleware('auth');
// Route::view('system{any}', 'admin')->where('any', '.*')->middleware('auth');

Route::view('member{any}', 'member/index')->where('any', '.*')->middleware('auth');
Route::view('{any}', 'main')->where('any', '.*')->middleware('auth');
