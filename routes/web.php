<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('home', function () {
    return redirect('/');
});

//登录退出
Route::resource('login', 'LoginController');
Route::get('login', 'LoginController@index')->name('login');
Route::get('logout', 'LoginController@logout')->name('logout');
//公共
Route::group(['middleware' => [], 'prefix' => 'common', 'as' => 'common.'], function () {
    Route::any('upload', 'Common\UploadController@upload')->name('upload.make');
    Route::any('upload-lists', 'Common\UploadController@lists')->name('upload.lists');
});
//用户
Route::group(['middleware' => ['auth']], function () {
    //后台管理
    Route::resource('admin', 'AdminController');
    //个人中心
    Route::resource('member', 'MemberController');
    //后台用户管理
    Route::resource('user', 'UserController');
    //锁定解锁用户
    Route::get('user-lock/{user}/{state}', 'UserController@lock')->name('user.lock');
    //后台用户管理
    Route::resource('user', 'UserController');
});
//站点
Route::group(['middleware' => ['auth']], function () {
    //站点管理
    Route::resource('site', 'SiteController');
    Route::get('site/access/{site}', 'SiteController@access')->name('site.access');
    Route::get('site/user/{site}','SiteController@users')->name('site.user');
});
//系统设置
Route::group(['middleware' => ['SuperAdmin']], function () {
    //系统设置
    Route::resource('setting', 'SettingController');
    //更新全站缓存
    Route::get('update-cache', 'SettingController@updateCache')->name('update-cache');
    //会员组
    Route::resource('group', 'GroupController');
    //套餐
    Route::resource('package', 'PackageController');
});
//模块
Route::group(['middleware' => ['SuperAdmin']], function () {
    //模块管理
    Route::resource('module', 'ModuleController');
    Route::get('module-refresh/{module}', 'ModuleController@refresh')->name('module.refresh');
});
