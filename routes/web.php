<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

//网站首页
Route::get('/', 'Edu\HomeController@index')->name('home');
Route::get('/home', 'Edu\HomeController@index')->name('home');

//公共控制器
Route::group(['namespace' => 'Common', 'prefix' => 'common', 'as' => 'common.'], function () {
    Route::get('zan/make', 'ZanController@make')->name('zan.make');
    Route::get('favorite', 'FavoriteController@make')->name('favorite.make');
    Route::get('favorite/index', 'FavoriteController@index')->name('favorite.index');
    Route::resource('comment', 'CommentController');
    Route::resource('notification', 'NotificationController');
    //上传处理
    Route::post('upload/upload', 'UploadController@upload')->name('upload.upload');
    Route::any('upload/lists', 'UploadController@lists')->name('upload.lists');
    //发送验证码
    Route::any('code/send', 'CodeController@send')->name('code.send');
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

//文章系统
Route::group(['namespace' => 'Article', 'prefix' => 'article', 'middleware' => []], function () {
    Route::get('home', 'HomeController@index');
    Route::resource('category', 'CategoryController');
    Route::resource('content', 'ContentController');
});

//后台管理
Route::group(['namespace' => 'Admin', 'middleware' => [], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    //配置管理
    Route::get('config/{name}/edit', 'ConfigController@edit')->name('config.edit');
    Route::put('config/{name}', 'ConfigController@update')->name('config.update');
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
    Route::get('permission', 'PermissionController@index')->name('permission');
    Route::get('permission/update-cache', 'PermissionController@updateCache')->name('permission.update.cache');
    Route::get('permission/{role}', 'PermissionController@edit')->name('permission.role');
    Route::post('permission/{role}', 'PermissionController@update')->name('permission.role');
    Route::resource('module', 'ModuleController');
});

//在线教育
Route::group(['namespace' => 'Edu', 'prefix' => 'edu', 'as' => 'edu.'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('lesson/lists', 'LessonController@lists')->name('lesson.lists');
    Route::resource('lesson', 'LessonController');
    Route::resource('category', 'CategoryController');
    Route::resource('topic', 'TopicController');
    Route::resource('article', 'ArticleController');
    Route::resource('video', 'VideoController');
    Route::get('search', 'SearchController@lists')->name('search');
});

