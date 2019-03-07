<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
//登录注册找回密码
Route::get('login', 'Member\LoginController@login')->name('login');
Route::post('login', 'Member\LoginController@store')->name('login');
Route::get('logout', 'Member\LoginController@logout')->name('logout')->middleware('auth');
Route::resource('register', 'Member\RegisterController');
Route::get('reg', 'Member\RegisterController@index')->name('register');
Route::resource('findPassword', 'Member\FindPasswordController')->middleware('guest');

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
        Route::resource('notify', 'NotifyController');
        Route::get('notify-all', 'NotifyController@all')->name('notify.all');
    });