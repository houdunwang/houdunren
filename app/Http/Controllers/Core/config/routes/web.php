<?php
//后台
Route::group(['namespace' => 'Core', 'middleware' => [], 'as' => 'core.', 'prefix' => 'core'], function () {
    //系统管理页面
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('cache/update', 'CacheController@update')->name('update.cache');

    //配置管理
    Route::get('config/{name}/edit', 'ConfigController@edit')->name('config.edit');
    Route::put('config/{name}', 'ConfigController@update')->name('config.update');
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
    Route::get('permission', 'PermissionController@index')->name('permission');
    Route::get('permission/update-cache', 'PermissionController@updateCache')->name('permission.update.cache');
    Route::get('permission/{role}', 'PermissionController@edit')->name('permission.role');
    Route::post('permission/{role}', 'PermissionController@update')->name('permission.role');
    Route::resource('module', 'ModuleController');
});