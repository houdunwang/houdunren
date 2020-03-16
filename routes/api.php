<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api'], 'namespace' => 'Common', 'prefix' => 'common'], function () {
  Route::post('code', 'CodeController@send');
});
//系统
Route::group(['middleware' => 'auth:api', 'namespace' => 'System', 'prefix' => 'system'], function () {
  //套餐管理
  Route::resource('package', 'PackageController')->except(['edit', 'create']);
  //系统配置
  Route::resource('config', 'ConfigController')->except(['edit', 'create']);
  //会员组
  Route::resource('group', 'GroupController')->except(['edit', 'create']);
  //缓存控制
  Route::get('cache', 'CacheController@update');
  //模块管理
  Route::get('module', 'ModuleController@index');
  Route::post('module', 'ModuleController@install');
  Route::delete('module/{name}', 'ModuleController@uninstall');
  Route::get('module/installed', 'ModuleController@installed');
  //管理员
  Route::get('user', 'UserController@get');
});

//站点
Route::group(['middleware' => 'auth:api', 'namespace' => 'Site', 'prefix' => 'site'], function () {
  Route::resource('site', 'SiteController')->except(['edit', 'create']);
  //站点配置
  Route::put('config/{site}', 'ConfigController@update');
  Route::get('config/{site}', 'ConfigController@show');
  Route::post('config/sms/{site}', 'ConfigController@sms');
  Route::post('config/email/{site}', 'ConfigController@email');
  //公众号
  Route::resource('{site}/weChat', 'WeChatController')->except(['edit', 'create']);
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
  //站点权限
  Route::get('{site}/access', 'AccessController@site');
  Route::get('{site}/access/{user}', 'AccessController@userPermission');
  Route::put('{site}/access/{user}', 'AccessController@update');
  //更新站点缓存
  Route::put('{site}/cache', 'CacheController@update');
});

//会员中心
Route::post('login', 'Member\LoginController@apiLogin');
Route::group(['middleware' => 'auth:api', 'namespace' => 'Member', 'prefix' => 'member'], function () {
  Route::get('get', 'UserController@get');
  Route::put('user', 'UserController@update');
  Route::put('password', 'UserController@password');
  Route::put('phone', 'UserController@phone');
  Route::put('email', 'UserController@email');
});
