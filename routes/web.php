<?php
//主页
Route::group(['namespace' => 'Web\Home'], function () {
  Route::get('/', 'IndexController@home');
  Route::get('home', 'IndexController@home');
});

//后台登录
Route::group(['namespace' => 'Web\Admin'], function () {
  Route::get('admin/login', 'LoginController@show');
  Route::post('admin/login', 'LoginController@login')->name('admin.login');
  Route::get('admin/logout', 'LoginController@logout')->name('admin.logout');
});

//前端
Route::get('/admin{any}', function () {
  if (!auth()->check()) {
    return redirect(route('admin.login'));
  }
  return view('admin.home');
})->where('any', '.*');
