<?php
Route::get('/', 'Module\DomainController@index')->middleware('site')->name('home');
//Route::get('home', 'Site\SiteController@index')->name('home')->middleware('auth');
//登录注册
Route::get('login', 'Member\LoginController@login')->name('login');
Route::post('login', 'Member\LoginController@store')->name('login');
Route::get('logout', 'Member\LoginController@logout')->name('logout')->middleware('auth');

Route::resource('register', 'Member\RegisterController')->middleware(['site']);
Route::get('reg', 'Member\RegisterController@index')->name('register');
Route::resource('findPassword', 'Member\FindPasswordController')->middleware('guest');
//后台登录
Route::get('admin', 'Site\SiteController@index')->name('admin')->middleware('auth');
//公共
Route::group(['prefix' => 'common', 'as' => 'common.'], function () {
    Route::any('upload', 'Common\UploadController@upload')->name('upload.make');
    Route::any('upload-lists', 'Common\UploadController@lists')->name('upload.lists');
    Route::any('user/search', 'Common\UserController@search')->name('user.search');
    Route::any('notification/code',
        'Common\NotificationController@code')->name('notification.code')->middleware('site');
});
//会员中心
Route::get('member', 'Member\HomeController')->middleware(['auth', 'site'])->name('member');
Route::group(['middleware' => ['auth', 'site'], 'prefix' => 'member', 'namespace' => 'Member', 'as' => 'member.'],
    function () {
        //资料修改
        Route::resource('info', 'InfoController');
        Route::resource('icon', 'IconController');
        Route::resource('mail', 'MailController');
        Route::resource('mobile', 'MobileController');
        Route::resource('change-password', 'ChangePasswordController');
    });
//系统
Route::group(['middleware' => ['system'], 'prefix' => 'system', 'as' => 'system.', 'namespace' => 'System'],
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
        Route::get('module_local', 'ModuleController@local')->name('module.local');
        Route::get('module_local/{name}', 'ModuleController@install')->name('module.install');
        //用户管理
        Route::resource('user', 'UserController');
        //锁定解锁用户
        Route::get('lock/{user}/{state}', 'UserController@lock')->name('user.lock');
        //应用
        Route::resource('app', 'AppController');
        //云帐号
        Route::resource('cloud', 'CloudController');
        //模块打包
        Route::resource('zip', 'ZipController');
    });
//系统更新
Route::group(['middleware' => ['system'], 'prefix' => 'cloud', 'as' => 'cloud.', 'namespace' => 'System',],
    function () {
        Route::get('update/check', 'UpdateController@check')->name('update.check');
        Route::get('update/download', 'UpdateController@downloadShow')->name('update.download');
        Route::post('update/download', 'UpdateController@download')->name('update.download');
        Route::get('update/move', 'UpdateController@moveShow')->name('update.move');
        Route::post('update/move', 'UpdateController@moveFile')->name('update.move');
        Route::get('update/finish', 'UpdateController@finish')->name('upload.finish');
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
    Route::resource('{site}/permission/user', 'PermissionController', ['as' => 'permission']);
    //更新站点权限
    Route::get('{site}/permission/cache', 'PermissionController@site')->name('permission.cache');
    //站点配置
    Route::resource('{site}/config', 'ConfigController');
    //微信公众号
    Route::resource('{site}/chat', 'ChatController');
});
//模块
Route::group(['middleware' => ['admin'], 'as' => 'module.', 'prefix' => 'module', 'namespace' => 'Module'],
    function () {
        Route::resource('module', 'ModuleController');
        //模块域名
        Route::resource('domain', 'DomainController');
        //模块配置
        Route::resource('config', 'ConfigController');
        //模块菜单
        Route::resource('{type}/menu', 'MenuController');
        //微信文本
        Route::resource('text', 'TextController');
        //图文消息
        Route::resource('cover', 'CoverController');
    });