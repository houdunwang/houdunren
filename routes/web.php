<?php
//预览邮件
Route::get('/mailable', function () {
    return new App\Mail\RegisterMail('2920');
});

//网站首页
Route::get('/', 'Video\HomeController@index')->name('home');
Route::get('/home', 'Video\HomeController@index')->name('home');

//登录退出
Route::get('login', 'LoginController@login')->name('login');
Route::post('login', 'LoginController@store')->name('login');
Route::get('logout', 'LoginController@logout')->name('logout');
Route::get('findPassword', 'LoginController@findPassword')->name('findPassword');
Route::post('changePassword', 'LoginController@changePassword')->name('changePassword');

//用户管理
Route::resource('user', 'UserController');

//工具控制器
Route::group(['prefix' => 'util', 'as' => 'util.', 'namespace' => 'Util'], function () {
    Route::post('upload/upload', 'UploadController@upload')->name('upload.upload');
    Route::any('upload/lists', 'UploadController@lists')->name('upload.lists');
    //发送验证码
    Route::any('code/send', 'CodeController@send')->name('code.send');
});

//文章系统
Route::group(['namespace' => 'Article', 'prefix' => 'article', 'middleware' => 'user.token'], function () {
    Route::get('home', 'HomeController@index');
});

//后台管理
Route::group(['middleware' => ['auth.admin'], 'as' => 'admin.', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    //配置管理
    Route::get('config/{name}/edit', 'ConfigController@edit')->name('config.edit');
    Route::put('config/{name}', 'ConfigController@update')->name('config.update');
});

