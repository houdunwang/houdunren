<?php
//主页
Route::get('/', 'Site\SiteController@index');
Route::get('home', 'Site\SiteController@index')->name('home');
//登录退出
Route::get('login', 'Member\LoginController@index')->name('login');
Route::get('logout', 'Member\LoginController@logout')->name('logout');
//后台登录
Route::get('admin', 'Site\SiteController@index');
//公共
Route::group(['prefix' => 'common', 'as' => 'common.'], function () {
    Route::any('upload', 'Common\UploadController@upload')->name('upload.make');
    Route::any('upload-lists', 'Common\UploadController@lists')->name('upload.lists');
    Route::any('user/search', 'Common\UserController@search')->name('user.search');

});
//用户
Route::group(['middleware' => ['auth'], 'prefix' => 'member', 'namespace' => 'Member', 'as' => 'member.'], function () {
    //资料修改
    Route::resource('user', 'UserController');
});
//系统
Route::group(['middleware' => ['auth', 'system'], 'prefix' => 'system', 'as' => 'system.', 'namespace' => 'System'],
    function () {
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
        Route::get('moduleRefresh/{module}', 'ModuleController@refresh')->name('module.refresh');
        //用户管理
        Route::resource('user', 'UserController');
        //锁定解锁用户
        Route::get('lock/{user}/{state}', 'UserController@lock')->name('user.lock');
    });
//站点
Route::group(['middleware' => ['auth'], 'prefix' => 'site', 'as' => 'site.', 'namespace' => 'Site'], function () {
    //站点管理
    Route::resource('site', 'SiteController');
    //模型会员组
    Route::resource('{site}/access', 'AccessController');
    //操作员
    Route::resource('{site}/user', 'UserController');
    //权限
    Route::resource('{site}/permission/user','PermissionController',['as'=>'permission']);
    //更新站点权限
    Route::get('{site}/permission/cache', 'PermissionController@site')->name('permission.cache');
    //站点配置
    Route::resource('{site}/config', 'ConfigController');
    //微信公众号
    Route::resource('{site}/wechat', 'WeChatController');
});
//模块
Route::group(['middleware' => ['auth', 'module'], 'as' => 'module.', 'prefix' => 'module', 'namespace' => 'Module'],
    function () {
        //模块域名
        Route::resource('domain', 'DomainController');
        //模块配置
        Route::resource('config', 'ConfigController');
    });