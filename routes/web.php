<?php

use Illuminate\Support\Facades\Route;
//前台首页
Route::group(['middleware' => ['front', 'bindMobile'], 'namespace' => 'Home'], function () {
  Route::get('/', 'IndexController@home');
  Route::get('home', 'IndexController@home');
});

Route::group(['namespace' => 'Common', 'prefix' => 'common'], function () {
  Route::get('captcha', 'CaptchaController@make')->name('common.captcha');
  Route::post('upload/{site?}', 'UploadController@store');
});

Route::group(['namespace' => 'Member', 'as' => 'member.'], function () {
  Route::get('login', 'LoginController@show')->name('login');
  Route::post('login', 'LoginController@login')->name('login');
  Route::get('logout', 'LoginController@logout')->name('logout');
  Route::get('register', 'LoginController@register')->name('register');
  Route::post('register', 'LoginController@store')->name('register');
  Route::resource('mobile', 'MobileController');
});

Route::group(['namespace' => 'System', 'as' => 'system.', 'prefix' => 'system'], function () {
  Route::post('login', 'LoginController@login')->name('login');
  Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::redirect('admin', '/site');
Route::view('site{any}', 'admin')->where('any', '.*')->middleware('auth');
Route::view('system{any}', 'admin')->where('any', '.*')->middleware('auth');
Route::view('member{any}', 'member')->where('any', '.*')->middleware('auth');
