<?php
//后台登录
Route::get('admin', 'System\LoginController@login')->name('system.login.show');
Route::post('system/login', 'System\LoginController@store')->name('system.login');
Route::get('system/logout', 'System\LoginController@logout')->name('system.logout');
//站点列表
Route::group(['middleware' => ['auth'], 'prefix' => 'system', 'as' => 'system.', 'namespace' => 'System'],
    function () {
        Route::resource('site', 'SiteController');
    });
//系统管理
Route::group(['middleware' => ['system'], 'prefix' => 'system', 'as' => 'system.', 'namespace' => 'System'],
    function () {
        //上传处理
        Route::any('upload', 'UploaderController@make')->name('upload.make');
        Route::any('upload-lists', 'UploaderController@lists')->name('upload.lists');
        //系统设置
        Route::resource('setting', 'SettingController');
        //更新全站缓存
        Route::get('update-cache', 'SettingController@updateCache')->name('update-cache');
        //会员组
        Route::resource('group', 'GroupController');
        //套餐
        Route::resource('package', 'PackageController');
        //模块管理
        Route::resource('module', 'ModuleController');
        Route::get('refresh/module/{module}', 'ModuleController@refresh')->name('module.refresh');
        Route::get('local/module', 'ModuleController@local')->name('module.local');
        Route::get('install/module/{name}', 'ModuleController@install')->name('module.install');
        //用户管理
        Route::resource('user', 'UserController');
        //锁定解锁用户
        Route::get('lock/{user}/{state}', 'UserController@lock')->name('user.lock');
        //云帐号
        Route::resource('cloud', 'CloudController');
        //模块打包
        Route::get('zip/{name}', 'ZipController@module')->name('zip.module');
    });

//更新管理
Route::group(['middleware' => ['system'], 'prefix' => 'update', 'as' => 'update.', 'namespace' => 'Update',],
    function () {
        //系统更新
        Route::get('system/check', 'SystemController@check')->name('system.check');
        Route::get('system/download', 'SystemController@downloadShow')->name('system.download');
        Route::post('system/download', 'SystemController@download')->name('system.download');
        Route::get('system/move', 'SystemController@move')->name('system.move');
        Route::post('system/move', 'SystemController@moveFile')->name('system.move');
        Route::get('system/finish', 'SystemController@finish')->name('system.finish');
        //模块更新
        Route::get('module', 'ModuleController@index')->name('module.index');
        Route::get('module/{name}/show', 'ModuleController@show')->name('module.show');
        Route::get('module/{name}/update', 'ModuleController@update')->name('module.update');
        Route::get('module/{name}/download', 'ModuleController@download')->name('module.download');
    });

//系统安装
Route::group(['as' => 'install.', 'prefix' => 'install'], function () {
    Route::get('/', 'InstallController@index')->name('home');
    Route::get('database', 'InstallController@database')->name('database');
    Route::post('connect', 'InstallController@connect')->name('connect');
    Route::get('migrate', 'InstallController@migrate')->name('migrate');
    Route::get('create', 'InstallController@create')->name('create');
    Route::get('complete', 'InstallController@complete')->name('complete');
});