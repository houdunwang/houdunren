<?php
//主页
Route::group(['namespace' => 'Home'], function () {
  Route::get('/', 'IndexController@home');
  Route::get('home', 'IndexController@home');
});

//公共业务
Route::group(['prefix' => 'common', 'namespace' => 'Common'], function () {
  Route::post('upload', 'UploadController@store');
  Route::get('captcha', 'CaptchaController@make')->name('common.captcha');
});

//会员中心
Route::group(['namespace' => 'Member', 'prefix' => 'member'], function () {
  Route::get('login', 'LoginController@show')->name('member.login');
  Route::post('login', 'LoginController@login')->name('member.login');
  Route::get('logout', 'LoginController@logout')->name('member.logout');
});

//系统应用
Route::group(['namespace' => 'System', 'prefix' => 'admin'], function () {
  //登录系统
  Route::get('login', 'LoginController@show')->name('system.login');
  Route::post('login', 'LoginController@login')->name('system.login');
  Route::get('logout', 'LoginController@logout')->name('system.logout');
  //系统应用上传
  Route::post('upload', 'UploadController@store');
});

//模块应用
Route::group(['middleware' => 'auth', 'namespace' => 'Module', 'prefix' => 'module'], function () {
  Route::post('upload', 'UploadController@store');
});

//系统后台管理
Route::get('/admin{any}', function () {
  return view('admin');
})->where('any', '.*');

//系统后台管理
Route::get('/member{any}', function () {
  return view('member');
})->where('any', '.*')->middleware('module');
