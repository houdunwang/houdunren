<?php
//网站首页
Route::get('/', 'Video\HomeController@index')->name('home');
Route::get('/home', 'Video\HomeController@index')->name('home');

//用户登录注册
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('login', 'UserController@login')->name('login');
    Route::post('login', 'UserController@store')->name('login');
    Route::get('register', 'UserController@register')->name('register');
    Route::post('register', 'UserController@create')->name('register');
    Route::get('logout', 'UserController@logout')->name('logout');
});

//工具控制器
Route::group(['prefix' => 'util', 'as' => 'util.', 'namespace' => 'Util'], function () {
    Route::post('upload/upload', 'UploadController@upload')->name('upload.upload');
    Route::any('upload/lists', 'UploadController@lists')->name('upload.lists');
    //发送验证码
    Route::post('send', 'CodeController@send')->name('code.send');
});

//文章系统
Route::group(['namespace' => 'Article', 'prefix' => 'article', 'middleware' => 'user.token'], function () {
    Route::get('home', 'HomeController@index');
});

//后台管理
Route::group(['middleware' => [], 'as' => 'admin.', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    //配置管理
    Route::get('config/{name}/edit', 'ConfigController@edit')->name('config.edit');
    Route::put('config/{name}', 'ConfigController@update')->name('config.update');
});

