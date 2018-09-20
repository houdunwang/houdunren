<?php
//网站首页
Route::get('/', 'Edu\HomeController@index')->name('home');
Route::get('/home', 'Edu\HomeController@index')->name('home');

//公共控制器
Route::group(['prefix' => 'common', 'as' => 'common.', 'namespace' => 'Common'], function () {
    Route::get('zan/make', 'ZanController@make')->name('zan.make');
    Route::get('favorite', 'FavoriteController@make')->name('favorite.make');
    Route::get('favorite/index', 'FavoriteController@index')->name('favorite.index');
    Route::resource('comment', 'CommentController');
    Route::resource('notification', 'NotificationController');
});

//会员中心
Route::group(['namespace' => 'User', 'prefix' => 'member', 'as' => 'member.'], function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::resource('user', 'UserController');
    Route::get('fans/{user}', 'UserController@fans')->name('fans');
    Route::get('follow/{user}', 'UserController@follow')->name('follow');
    Route::get('follower/{user}', 'UserController@follower')->name('follower');
});

//登录/注册/退出
Route::get('register', 'User\RegisterController@create')->name('register');
Route::post('register', 'User\RegisterController@store')->name('register');
Route::get('login', 'User\LoginController@login')->name('login');
Route::post('login', 'User\LoginController@store')->name('login');
Route::get('logout', 'User\LoginController@logout')->name('logout');
Route::get('findPassword', 'User\LoginController@findPassword')->name('findPassword');
Route::post('changePassword', 'User\LoginController@changePassword')->name('changePassword');

//工具控制器
Route::group(['prefix' => 'util', 'as' => 'util.', 'namespace' => 'Util'], function () {
    Route::post('upload/upload', 'UploadController@upload')->name('upload.upload');
    Route::any('upload/lists', 'UploadController@lists')->name('upload.lists');
    //发送验证码
    Route::any('code/send', 'CodeController@send')->name('code.send');
});

//文章系统
Route::group(['namespace' => 'Article', 'prefix' => 'article', 'middleware' => []], function () {
    Route::get('home', 'HomeController@index');
    Route::resource('category', 'CategoryController');
    Route::resource('content', 'ContentController');
});

//后台管理
Route::group(['middleware' => ['auth.admin'], 'as' => 'admin.', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    //配置管理
    Route::get('config/{name}/edit', 'ConfigController@edit')->name('config.edit');
    Route::put('config/{name}', 'ConfigController@update')->name('config.update');
});

//在线教育
Route::group(['prefix' => 'edu', 'namespace' => 'Edu', 'as' => 'edu.'], function () {
    Route::get('/','HomeController@index')->name('home');
    Route::get('lesson/lists', 'LessonController@lists')->name('lesson.lists');
    Route::resource('lesson', 'LessonController');
    Route::resource('category', 'CategoryController');
    Route::resource('topic', 'TopicController');
    Route::resource('article', 'ArticleController');
});

