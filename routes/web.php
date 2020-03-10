<?php
//主页
Route::group(['namespace' => 'Home'], function () {
  Route::get('/', 'IndexController@home');
  Route::get('home', 'IndexController@home');
});

//后台登录
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
  Route::get('login', 'LoginController@show');
  Route::post('login', 'LoginController@login')->name('admin.login');
  Route::get('logout', 'LoginController@logout')->name('admin.logout');
});

//系统应用
Route::group(['middleware' => 'auth', 'namespace' => 'System', 'prefix' => 'system'], function () {
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
})->where('any', '.*');
