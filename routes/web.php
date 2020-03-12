<?php
//前台首页
Route::group(['namespace' => 'Home'], function () {
  Route::get('/', 'IndexController@home');
  Route::get('home', 'IndexController@home');
});

//公共业务
Route::group(['namespace' => 'Common', 'prefix' => 'common'], function () {
  //验证码
  Route::get('captcha', 'CaptchaController@make')->name('common.captcha');
});

//管理员
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
  Route::get('login', 'LoginController@show')->name('admin.login');
  Route::post('login', 'LoginController@login')->name('admin.login');
  Route::get('logout', 'LoginController@logout')->name('admin.logout');
});

//系统应用
Route::group(['namespace' => 'System', 'prefix' => 'system'], function () {
  //系统应用上传
  Route::post('upload', 'UploadController@store');
  Route::get('/system{any}', function () {
    return view('admin');
  })->where('any', '.*')->middleware('system');
});

//站点应用
Route::get('/site{any}', function () {
  return view('admin');
})->where('any', '.*')->middleware('auth');

//模块应用
Route::group(['middleware' => 'auth', 'namespace' => 'Module', 'prefix' => 'module'], function () {
  Route::post('upload', 'UploadController@store');
});

//会员中心
Route::group(['namespace' => 'Member'], function () {
  //用户登录注册
  Route::get('login', 'LoginController@show')->name('login');
  Route::post('login', 'LoginController@login')->name('login');
  Route::get('logout', 'LoginController@logout')->name('logout');

  Route::get('/member{any}', function () {
    return view('member');
  })->where('any', '.*')->middleware('auth');
});
