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
Route::get('/', function (\App\Models\Module $module) {
    return App::call($module->getEntranceByDomain());
})->name('home');

//公共控制器
Route::group(['namespace' => 'Common', 'prefix' => 'common', 'as' => 'common.'], function () {
    //点赞
    Route::get('zan/make', 'ZanController@make')->name('zan.make');
    //收藏
    Route::get('favorite', 'FavoriteController@make')->name('favorite.make');
    Route::get('favorite/index', 'FavoriteController@index')->name('favorite.index');
    Route::resource('comment', 'CommentController');
    //上传处理
    Route::post('upload/upload', 'UploadController@upload')->name('upload.upload');
    Route::any('upload/lists', 'UploadController@lists')->name('upload.lists');
    //发送验证码
    Route::any('code/send', 'CodeController@send')->name('code.send');
});

//微信模块
Route::group(['namespace' => 'Chat', 'prefix' => 'chat', 'as' => 'chat.'], function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::any('/', 'HandleController@handle');
    Route::resource('base', 'ChatBaseController');
    Route::resource('news', 'ChatNewsController');
    Route::resource('button', 'ChatButtonController');
    Route::get('button/{button}/push', 'ChatButtonController@push')->name('button.push');
    Route::resource('default', 'ChatDefaultController');
});

//会员中心
Route::group(['namespace' => 'Member', 'prefix' => 'member', 'as' => 'member.'], function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::resource('user', 'UserController');
    Route::get('fans/{user}', 'UserController@fans')->name('fans');
    Route::get('follow/{user}', 'UserController@follow')->name('follow');
    Route::get('follower/{user}', 'UserController@follower')->name('follower');
    //消息中心
    Route::resource('notification', 'NotificationController');
});

//登录/注册/退出
Route::get('register', 'Member\RegisterController@create')->name('register');
Route::post('register', 'Member\RegisterController@store')->name('register');
Route::get('login', 'Member\LoginController@login')->name('login');
Route::post('login', 'Member\LoginController@store')->name('login');
Route::get('logout', 'Member\LoginController@logout')->name('logout');
Route::get('findPassword', 'Member\LoginController@findPassword')->name('findPassword');
Route::post('changePassword', 'Member\LoginController@changePassword')->name('changePassword');

Route::group(['namespace' => 'Content', 'prefix' => 'content', 'as' => 'content.'], function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::resource('model', 'ModelController');
    Route::resource('category', 'CategoryController');
    Route::resource('article', 'ArticleController');
    Route::get('select_category', 'ArticleController@selectCategory')->name('select_category');
    Route::get('config/edit', 'ConfigController@edit')->name('config.edit');
    Route::put('config/update', 'ConfigController@update')->name('config.update');
    Route::resource('template', 'TemplateController');
    Route::get('template/{template}', 'TemplateController@update')->name('template.update');
    Route::resource('slide', 'SlideController');
    //前台展示
    Route::get('c{category}.html', 'HomeController@lists')->name('list');
    Route::get('{article}.html', 'HomeController@article')->name('article');
});

//后台管理
Route::group(['namespace' => 'Admin', 'middleware' => [], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    //系统管理页面
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('cache/update','CacheController@update')->name('update.cache');
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
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('lesson/lists', 'LessonController@lists')->name('lesson.lists');
    Route::resource('lesson', 'LessonController');
    Route::resource('category', 'CategoryController');
    //贴子
    Route::resource('topic', 'TopicController');
    Route::get('topics_{category}.html', 'TopicController@lists')->name('topic_list');
    //会员中心贴子管理
    Route::get('topic_manage', 'TopicController@manage')->name('topic.manage');
    //视频
    Route::resource('video', 'VideoController');
    Route::get('search', 'SearchController@lists')->name('search');
    //动态管理
    Route::resource('dynamic', 'DynamicController');
    //模块配置
    Route::get('config/edit', 'ConfigController@edit')->name('config.edit');
    Route::put('config/update', 'ConfigController@update')->name('config.update');
    //会员中心
    Route::get('topic/{user}', 'UserController@topic')->name('user.topic');
});
