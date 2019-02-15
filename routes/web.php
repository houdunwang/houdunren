<?php
Route::get('/', function () {
    return view('welcome');
});
//后台管理
Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin', 'AdminController');
    Route::resource('site', 'SiteController');
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
//用户管理
Route::group(['middleware' => ['auth']], function () {
    //个人中心
    Route::resource('user', 'UserController');
    //后台用户管理
    Route::resource('user', 'UserController');
    //站点管理
    Route::resource('site', 'SiteController');
    //系统设置
    Route::resource('setting', 'SettingController')->middleware('SuperAdmin');
    //会员组
    Route::resource('group', 'GroupController')->middleware('SuperAdmin');
    //套餐
    Route::resource('package', 'PackageController')->middleware('SuperAdmin');
});
