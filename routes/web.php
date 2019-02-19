<?php
Route::get('/', function () {
    return redirect()->route('admin.index');
});
Route::get('home', function () {
    return redirect()->route('admin.index');
})->name('home');

//登录退出
Route::resource('login', 'LoginController');
Route::get('login', 'LoginController@index')->name('login');
Route::get('logout', 'LoginController@logout')->name('logout');
//公共
Route::group(['prefix' => 'common', 'as' => 'common.'], function () {
    Route::any('upload', 'Common\UploadController@upload')->name('upload.make');
    Route::any('upload-lists', 'Common\UploadController@lists')->name('upload.lists');
    Route::any('user/search', 'Common\UserController@search')->name('user.search');
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
    //设置操作员
    Route::get('site/user/{site}', 'SiteController@users')->name('site.user');
    Route::get('site/operator/{site}', 'SiteController@operator')->name('site.operator.set');
    //操作员权限
    Route::get('site/permission/{site}/{user}', 'PermissionController@edit')->name('site.permission');
    Route::put('site/permission/{site}/{user}', 'PermissionController@store')->name('site.permission');
    //更新站点权限
    Route::get('site-permission-cache/{site}', 'PermissionController@site')->name('site.permission.cache');
    //模块域名
    Route::resource('domain', 'DomainController');
    //模块配置
    Route::resource('module-config', 'ModuleConfigController');
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

//模块管理
Route::group(['middleware' => ['SuperAdmin']], function () {
    //模块管理
    Route::resource('module', 'ModuleController');
    Route::get('module-refresh/{module}', 'ModuleController@refresh')->name('module.refresh');
});
