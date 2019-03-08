<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
//登录注册找回密码
Route::group(['middleware' => 'front', 'namespace' => 'Member'], function () {
    Route::get('login', 'LoginController@login')->name('login');
    Route::post('login', 'LoginController@store')->name('login');
    Route::resource('register', 'RegisterController');
    Route::get('reg', 'RegisterController@index')->name('register');
    Route::get('logout', 'LoginController@logout')->name('logout')->middleware('auth');
    Route::resource('findPassword', 'FindPasswordController')->middleware('guest');
    //发送验证码
    Route::post('member/send/code', 'NotifyController@code')->name('member.send.code');
});
//用户粉丝
Route::group(['middleware' => ['member'], 'prefix' => "member", 'as' => 'member.', 'namespace' => 'Member'],
    function () {
        Route::any('notify/code', 'NotifyController@code')->name('notify.code');
        //粉丝关注
        Route::get('follow/make/{user}', 'FollowController@make')->name('follow.make');
        //点赞
        Route::get('favour/make/{model}/{id}', 'FavourController@make')->name('favour.make');
        //收藏
        Route::get('favorite/make/{model}/{id}', 'FavoriteController@make')->name('favorite.make');
        //上传处理
        Route::any('upload', 'UploaderController@make')->name('upload.make');
        Route::any('upload/lists', 'UploaderController@lists')->name('upload.lists');
    });
//会员中心
Route::get('member', 'Member\HomeController')->middleware(['member'])->name('member');
Route::group(['middleware' => ['member'], 'prefix' => 'member', 'namespace' => 'Member', 'as' => 'member.'],
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