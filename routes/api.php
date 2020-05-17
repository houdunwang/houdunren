<?php

use Illuminate\Support\Facades\Route;

//公共服务
Route::group(['namespace' => 'Common', 'prefix' => 'common'], function () {
    Route::post('code/send', 'CodeController@send')->middleware(['front', 'throttle:10,2']);
    Route::post('upload/system', 'UploadController@system')->middleware('auth:sanctum');
    Route::post('upload/site', 'UploadController@site')->middleware(['front', 'auth:sanctum']);
    Route::get('captcha/text', 'CaptchaController@make');
    Route::get('captcha/image', 'CaptchaController@image');
});

//登录注册
Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
    //登录注册
    Route::post('login', 'UserController@login');
    Route::get('logout', 'UserController@logout');
    Route::post('register', 'UserController@register')->middleware('front');
    Route::get('get', 'UserController@get');
    Route::post('has', 'UserController@has')->middleware('front');
    Route::post('findPassword', 'UserController@findPassword')->middleware('front');
});

//会员中心
Route::group(['middleware' => ['auth:sanctum', 'front'], 'namespace' => 'Member', 'prefix' => 'member'], function () {
    //修改资料
    Route::get('get', 'UserController@get');
    Route::put('user', 'UserController@update');
    Route::put('password', 'UserController@password');
    Route::put('mobile', 'UserController@mobile');
    Route::put('email', 'UserController@email');
    Route::get('access', 'AccessController@get');
});

//系统服务
Route::group(['middleware' => ['auth:sanctum'], 'namespace' => 'System', 'prefix' => 'system'], function () {
    //套餐管理
    Route::apiResource('package', 'PackageController');
    //系统配置
    Route::apiResource('config', 'ConfigController');
    //会员组
    Route::apiResource('group', 'GroupController');
    //缓存控制
    Route::get('cache', 'CacheController@update');
    //模块管理
    Route::get('module', 'ModuleController@index');
    Route::post('module', 'ModuleController@install');
    Route::delete('module/{name}', 'ModuleController@uninstall');
    Route::get('module/installed', 'ModuleController@installed');
    //我的资料
    Route::apiResource('user', 'UserController');
    //更新系统
    Route::get('update', 'UpdateController@make');
});

//站点服务
Route::group(['middleware' => 'auth:sanctum', 'namespace' => 'Site', 'prefix' => 'site'], function () {
    Route::apiResource('site', 'SiteController');
    //站点配置
    Route::put('config/{site}', 'ConfigController@update');
    Route::get('config/{site}', 'ConfigController@show');
    Route::post('config/sms/{site}', 'ConfigController@sms');
    Route::post('config/email/{site}', 'ConfigController@email');
    //公众号
    Route::apiResource('{site}/weChat', 'WeChatController');
    //操作员
    Route::get('{site}/admin', 'AdminController@index');
    Route::post('{site}/admin', 'AdminController@add');
    Route::delete('{site}/admin', 'AdminController@remove');
    Route::get('{site}/admin/search', 'AdminController@search');
    //站点用户
    Route::get('{site}/user', 'UserController@index');
    Route::get('{site}/user/{user}', 'UserController@get');
    //站点所有模块
    Route::get('{site}/module/site', 'ModuleController@site');
    //用户可使用的模块
    Route::get('{site}/module/user', 'ModuleController@user');
    //设置默认模块
    Route::get('{site}/module/{mid}', 'ModuleController@setDefault');
    //站点权限
    Route::get('{site}/access', 'AccessController@site');
    Route::get('{site}/access/{user}', 'AccessController@userPermission');
    Route::put('{site}/access/{user}', 'AccessController@updateUserAccess');
    //更新站点缓存
    Route::put('{site}/cache', 'CacheController@update');
});

//前台服务
Route::group(['middleware' => ['front'], 'namespace' => 'Front', 'prefix' => 'front'], function () {
    Route::get('menu/member/{module}', 'MenuController@member');
    Route::get('menu/center/{module}', 'MenuController@center');
    Route::get('site', 'SiteController@get');
    Route::get('module', 'ModuleController@get');
});

//后台模块服务
Route::group(['middleware' => ['auth:sanctum', 'site'], 'namespace' => 'Module', 'prefix' => 'module'], function () {
    Route::get('{site}/site', 'SiteController@get');
    Route::get('{site}/menu/{name}', 'MenuController@admin');
    Route::get('{site}/{name}', 'ModuleController@get');
});
