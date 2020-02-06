<?php

Route::post('register', 'User\PassportController@register');
Route::post('login', 'User\PassportController@login');

Route::group(['middleware' => 'auth:api', 'namespace' => 'Site', 'prefix' => 'site'], function () {
    Route::resource('site', 'SiteController')->except(['edit', 'create']);
    Route::resource('{site}/weChat', 'WeChatController')->except(['edit', 'create']);
    Route::get('{site}/access/{user}', 'AccessController@index');
    Route::put('{site}/access/{user}', 'AccessController@update');
});

Route::group(['middleware' => 'auth:api', 'namespace' => 'System', 'prefix' => 'system'], function () {
    Route::resource('package', 'PackageController')->except(['edit', 'create']);
    Route::resource('user', 'UserController')->except(['edit', 'create']);
    Route::post('user/lock', 'UserController@lock');
    Route::get('cache', 'CacheController@update');
});

Route::group(['middleware' => 'auth:api', 'namespace' => 'System', 'prefix' => 'system'], function () {
    Route::resource('group', 'GroupController')->except(['edit', 'create']);
    Route::resource('module', 'ModuleController')->except(['edit', 'create']);
});
