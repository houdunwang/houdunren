<?php

Route::post('register', 'User\PassportController@register');
Route::post('login', 'User\PassportController@login');

Route::group(['middleware' => 'auth:api', 'namespace' => 'Site', 'prefix' => 'site'], function () {
    Route::resource('manage', 'ManageController')->except(['edit', 'create']);
    Route::resource('{site}/weChat', 'WeChatController')->except(['edit', 'create']);
});

Route::group(['middleware' => 'auth:api', 'namespace' => 'System', 'prefix' => 'system'], function () {
    Route::resource('package', 'PackageController')->except(['edit', 'create']);
    Route::resource('user', 'UserController')->except(['edit', 'create']);
    Route::post('user/lock', 'UserController@lock');
});

Route::group(['middleware' => 'auth:api', 'namespace' => 'System', 'prefix' => 'system'], function () {
    Route::resource('group', 'GroupController')->except(['edit', 'create']);
    Route::resource('module', 'ModuleController')->except(['edit', 'create']);
});
