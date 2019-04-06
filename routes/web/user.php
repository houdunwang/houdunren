<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
//个人中心
Route::group(['middleware' => 'front', 'prefix' => 'user', 'namespace' => 'User', 'as' => "user."], function () {
    Route::get('/{user}', 'HomeController@follower')->name('home');
    Route::get('/{user}/follower', 'HomeController@follower')->name('follower');
    Route::get('/{user}/fans', 'HomeController@fans')->name('fans');
});