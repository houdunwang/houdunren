<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

//站点管理
Route::group(['middleware' => ['site'], 'prefix' => 'site', 'as' => 'site.', 'namespace' => 'Site'],
    function () {
        //站点管理
        Route::resource('site', 'SiteController');
        //模型会员组
        Route::resource('{site}/access', 'AccessController');
        //操作员
        Route::resource('{site}/user', 'UserController');
        Route::get('{site}/user_search', 'UserController@search')->name('user.search');
        //权限
        Route::resource('{site}/permission/user', 'PermissionController', ['as' => 'permission']);
        //更新站点权限
        Route::get('{site}/permission/cache', 'PermissionController@site')->name('permission.cache');
        //站点配置
        Route::resource('{site}/config', 'ConfigController');
        Route::post('{site}/send_test_mail', 'ConfigController@sendTestMail')->name('send.test.mail');
        Route::post('{site}/send_test_mobile', 'ConfigController@sendTestMobile')->name('send.test.mobile');
        //微信公众号
        Route::resource('{site}/chat', 'ChatController');
        //上传处理
        Route::any('{site}/upload', 'UploaderController@make')->name('upload.make');
        Route::any('{site}/upload/lists', 'UploaderController@lists')->name('upload.lists');
    });