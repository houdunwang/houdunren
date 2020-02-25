<?php

//后台登录


Route::group(['namespace' => 'System', 'prefix' => 'system'], function () {
  Route::post('login', 'LoginController@login');
});

//前台登录
Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
  Route::post('register', 'LoginController@login');
  Route::post('login', 'RegisterController@login');
});

//前台用户
Route::group(['middleware' => 'auth:api', 'namespace' => 'User', 'prefix' => 'user'], function () {
  //获取个人资料
  Route::get('get', 'UserController@get');
});

//站点
Route::group(['middleware' => 'auth:api', 'namespace' => 'Site', 'prefix' => 'site'], function () {
  Route::resource('site', 'SiteController')->except(['edit', 'create']);

  Route::put('config/{site}', 'ConfigController@update');
  Route::get('config/{site}', 'ConfigController@show');
  Route::resource('{site}/weChat', 'WeChatController')->except(['edit', 'create']);
  //  Route::get('{site}/access/{user}', 'AccessController@index');
  //  Route::put('{site}/access/{user}', 'AccessController@update');
  Route::get('{site}/admin', 'AdminController@index');
  Route::post('{site}/admin', 'AdminController@add');
  Route::delete('{site}/admin', 'AdminController@remove');
  Route::post('{site}/admin/search', 'AdminController@search');

  Route::get('{site}/user', 'UserController@index');
  Route::get('{site}/user/{user}', 'UserController@get');

  Route::get('{site}/module', 'ModuleController@index');
});

//系统
Route::group(['middleware' => 'auth:api', 'namespace' => 'System', 'prefix' => 'system'], function () {
  Route::resource('package', 'PackageController')->except(['edit', 'create']);
  //  Route::resource('user', 'UserController')->except(['edit', 'create']);
  //  Route::post('user/lock', 'UserController@lock');
  Route::get('cache', 'CacheController@update');
  Route::resource('upload', 'SystemUploadController')->except(['edit', 'create', 'show', 'index']);
  Route::resource('config', 'SystemConfigController')->except(['edit', 'create']);
  Route::resource('group', 'GroupController')->except(['edit', 'create']);
});

//系统模块
Route::group(['middleware' => 'auth:api', 'namespace' => 'System', 'prefix' => 'system'], function () {
  Route::get('module', 'ModuleController@index');
  Route::post('module', 'ModuleController@install');
  Route::delete('module/{name}', 'ModuleController@uninstall');
  Route::get('module/installed', 'ModuleController@installed');
});

//模块
Route::group(['middleware' => ['auth:api', 'moduleAuth'], 'namespace' => 'Module', 'prefix' => 'module'], function () {
  Route::resource('{site}/module', 'ModuleController')->except(['edit', 'show']);
});
