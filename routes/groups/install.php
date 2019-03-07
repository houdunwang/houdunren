<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

//系统安装
Route::group(['as' => 'install.', 'prefix' => 'install'], function () {
    Route::get('/', 'InstallController@index')->name('home');
    Route::get('database', 'InstallController@database')->name('database');
    Route::post('connect', 'InstallController@connect')->name('connect');
    Route::get('migrate', 'InstallController@migrate')->name('migrate');
    Route::get('create', 'InstallController@create')->name('create');
    Route::get('complete', 'InstallController@complete')->name('complete');
});