<?php
//网站首页
Route::get('/', 'Admin\HomeController@make')->name('home');
Route::get('home', 'Admin\RouteController@make')->name('home');

//登录/注册/退出
Route::get('register', 'Member\RegisterController@create')->name('register');
Route::post('register', 'Member\RegisterController@store')->name('register');
Route::post('register/code', 'Member\RegisterController@code')->name('register.send.code');
Route::get('login', 'Member\LoginController@login')->name('login');
Route::post('login', 'Member\LoginController@store')->name('login');
Route::get('logout', 'Member\LoginController@logout')->name('logout');
//找回密码
Route::get('password_reset', 'Member\ResetPasswordController@show')->name('password.reset');
Route::post('password_reset', 'Member\ResetPasswordController@update')->name('password.reset');
Route::post('password_reset_code', 'Member\ResetPasswordController@code')->name('password.reset.code');

//加载系统模块路由
collect(glob(base_path('app/Http/Controllers/*')))->each(function ($module) {
    $file = $module . '/config/routes/web.php';
    file_exists($file) && include $file;
});