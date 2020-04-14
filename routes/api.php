<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Common', 'prefix' => 'common'], function () {
    Route::post('code', 'CodeController@send')->middleware('auth:sanctum');
    Route::post('upload/system', 'UploadController@system')->middleware('auth:sanctum');
    Route::post('upload/site/{site}', 'UploadController@site')->middleware('auth:sanctum');
    Route::get('captcha', 'CaptchaController@make')->middleware('auth:sanctum');
    Route::get('captcha-image', 'CaptchaController@image');
});

//系统
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
});

//站点
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
    Route::post('{site}/admin/search', 'AdminController@search');
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

//登录注册
Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
    //登录注册
    Route::post('login', 'UserController@login');
    Route::get('logout', 'UserController@logout');
    Route::post('register', 'UserController@register');
    Route::get('get', 'UserController@get');
});

//会员中心
Route::group(['middleware' => ['auth:sanctum'], 'namespace' => 'Member', 'prefix' => 'member'], function () {
    //修改资料
    Route::get('get', 'UserController@get');
    Route::put('user', 'UserController@update');
    Route::put('password', 'UserController@password');
    Route::put('phone', 'UserController@phone');
    Route::put('email', 'UserController@email');
});
